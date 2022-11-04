<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
       $Products = products::all();
        return view('products.index',['products' => $Products]);
    }
     public function create()
    {
        return view('products.create', [
            'categories' => category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'=> 'required',
            'harga'=> 'required',
            'deskripsi'=> 'required',
            'gambar'=> 'required',
            'discount'=> 'required',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path ($folderTujuan), $namaFile);
            $input['gambar'] =$namaFile;

            }
            products::create($input);
            return redirect(route('products.index'));
        }
        public function delete($id)
        {
            $products  = products::findOrFail ($id);
            @unlink(public_path('upload/' . $products->gambar));
            $products->delete();
            return redirect(route('products.index'));
        }
        public function edit($id)
    {
        $product = products::findOrFail($id);
        return view('products.edit', ['product' => $product,
        'categories' => Category::all()
    ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
        ]);
        $input = $request->all();
        $product = products::find($id);
        if ($request->hasFile('gambar')) {
            @unlink(public_path('uploads/' . $product->gambar));
            $file = $request->file('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path ($folderTujuan), $namaFile);
            $input['gambar'] =$namaFile;
        }
        $product->update ($input);
        return redirect(route('products.index'));
    }
}


