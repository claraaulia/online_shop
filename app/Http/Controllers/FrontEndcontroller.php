<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\products;
use App\Policies\CategoryPolicy;
use Illuminate\Http\Request;

class FrontEndcontroller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $recentproducts = products::orderby('created_at' , 'desc')->take(8)->get();
        return view('welcome',[
            'categories'=> $categories,
            'recentProducts' => $recentproducts
        ]);
    }

}
