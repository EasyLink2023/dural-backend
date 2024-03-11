<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, $id=null) {
        if($id) {
            $data['category'] = Category::whereId($id)->first();
        }
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
    public function update(Request $request) {
        $request->validate([
            'cat_id'=>'required',
            'cat_name'=>'required',
            'page_url'=>'required'
        ]);
        $data = Category::find($request->cat_id);
        if($request->has('cat_name')) {
            $data->cat_name = $request->cat_name;
        }
        if($request->has('page_url')) {
            $data->page_url = $request->page_url;
        }
        $data->save();
        return redirect(route('category.index'))->with('success', 'Category Updated Successfully');
    }

    public function destroy($id) {
        $delete_product = Category::find($id);
        $delete = $delete_product->delete();
        return redirect()->back()->with('delete-success', 'Category deleted Successfully');
    }
}
