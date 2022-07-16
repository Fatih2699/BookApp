<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
        return view('upload-file');
    }

    public function store(){
        if (request()->has('mycsv')) {

            $data = array_map('str_getcsv', file(request()->mycsv));
            $header=$data[0];
            unset($data[0]);
            //Chunking File
            $chunks=array_chunk($data,1000);
            //dd(($chunks[0]));
            //convert 1000 records into a new csv file

            foreach($chunks as $key=>$chunk){
                $name="/tmp{key}.csv";
                $path=resource_path('temp');
                file_put_contents($path . $name , $chunk);
            }

            foreach($data as $value){
                $salesData=(array_combine($header,$value));
                Sales::create($salesData);
            }
             return "Done";
        }
    }
}
