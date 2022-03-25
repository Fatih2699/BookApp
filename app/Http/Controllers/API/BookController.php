<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */

    public function book(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_name' => 'required',
            'description' => 'required',
            'author' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }
        $input = $request->except('published_date');
        if ($request->hasFile('UploadedFile')) {
            $path = $request->file('UploadedFile')->store('books');
            $input['image_url'] = $path;
        }
        $input['published_date'] = Carbon::createFromFormat('d/m/Y', $request->published_date)->format('Y-m-d');
        $book = Book::create($input);
        $success['success'] = true;
        return $this->sendResponse($success, 'Book is succesfully saved.');
    }
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $input = $request->except('published_date');
        if ($request->published_date) {
            $input['published_date'] = Carbon::createFromFormat('d/m/Y', $request->published_date)->format('Y-m-d');
        }
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('books');
            $input['image_url'] = $path;
        }
        // if ($request->hasFile('UploadedFile')) {
        //     $path = $request->file('UploadedFile')->store('books');
        //     $input['image_url'] = $path;
        // }
        $result = $book->update($input);
        if ($result) {
            $success['success'] = true;
            return $this->sendResponse($success, 'Book is updated.');
        } else {
            $success['success'] = false;
            return $this->sendResponse($success, 'Book is not updated.');
        }
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $result = $book->delete();
        if ($result) {
            $success['success'] = true;
            return $this->sendResponse($success, 'Book is succesfully deleted.');
        } else {
            $success['success'] = false;
            return $this->sendResponse($success, 'Book is not deleted.');
        }
    }

    public function imagebook()
    {
        $result = Book::all();
        foreach ($result as $book) {
            $book->image_url = $book->url;
        }
        return $result;
    }
    public function booklist()
    {
        $book = Book::orderByDesc('created_at')->get();
        return response($book);
    }

    public function detail($id)
    {
        $book = Book::findorFail($id);
        return $book;
    }
}
