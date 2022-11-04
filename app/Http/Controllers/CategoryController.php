<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Suporrt\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
       $categories = Category::all();
       return view('category.index' , [
        'categories'=>$categories
       ]);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store (Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);
        $input =$request->all();

        if($request->hasFile('gambar')) {
            $file = $request->File('gambar');
            $folderTujuan = 'uploads/';
            $namaFile = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path($folderTujuan), $namaFile);
            $input['gambar'] = $namaFile;
        }

        Category::create($input);
        return redirect(route('category.index'));
    }
    public function delete ($id)
    {
       $category = category::find($id);
       $category->delete();
       return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);

 return view('category.edit', ['category' => $category]);

    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
    ]);
    $input = $request->all();
    if($request->hasFile('gambar')) {
        $file = $request->File('gambar');
        $folderTujuan = 'uploads/';
        $namaFile = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path($folderTujuan), $namaFile);
        $input['gambar'] = $namaFile;

    }
    Category::create($input);
    return redirect(route('category.index'));
    }
}


