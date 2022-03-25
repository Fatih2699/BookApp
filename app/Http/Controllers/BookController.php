<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function bookApi(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'book_name' => 'required',
                'description' => 'required',
                'author' => 'required',
                'page_number' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error', $validator->errors());
                return back();
            }
            $input = $request->except('published_date');
            if ($request->hasFile('UploadedFile')) {
                $path = $request->file('UploadedFile')->store('books');
                $input['image_url'] = $path;
            }
            $input['published_date'] = Carbon::createFromFormat('d/m/Y', $request->published_date)->format('Y-m-d');
            $book = Book::create($input);
            if ($book) {
                return redirect()->route('booklist');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $book = Book::findorFail($id);
        return view('updatebook', ['book' => $book]);
    }

    public function booklist()
    {
        $book = Book::orderByDesc('created_at')->get();
        //$book = Book::where('user_id',auth()->user()->id)->orderByDesc('created_at')->get();
        return view('booklist', ['book' => $book]);
    }

    public function edit(Book $book)
    {
        return view('addbook', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        session()->flash('status', 'Kitap Silindi');
        return redirect()->route('booklist');
    }
    public function update($id, Request $request)
    {
        $book = Book::find($id);
        $input = $request->except('published_date');
        if ($request->published_date) {
            $input['published_date'] = Carbon::createFromFormat('m/d/Y', $request->published_date)->format('Y-m-d');
        }
        $result = $book->update($input);
        session()->flash('status', 'Kitap Güncellendi');
        return redirect()->route('booklist');
    }
}
