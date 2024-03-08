<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('category.index',$data);
    }
    public function store(Request $request) {
        $request->validate([
            'cat_name'=>'required',
            'page_url'=>'required'
        ]);
        $data = Category::create($request->all());
        return redirect()->back()->with('success', 'Category Created Successfully');
    }

    public function destroy($id) {
        $delete_product = Category::find($id);
        $delete = $delete_product->delete();
        return redirect()->back()->with('delete-success', 'Category deleted Successfully');
    }
}
