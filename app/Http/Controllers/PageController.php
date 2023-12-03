<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function show_view()
    {
        return view('upload');
    }
    public function save_file(Request $request)
    {
        $file = $request->file;
        $filename = time().'.pdf';
        Storage::putFileAs('/assets',$request->file,$filename);
        Product::create([
            'name'=>$request['name'],
            'description'=>$request['description'],
            'file'=>$filename
        ]);
        return redirect('/upload');
    }
}
