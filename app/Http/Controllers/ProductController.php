<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        $data['products'] = Product::orderBy('id','desc')->get();
        return view('product.index',$data);
    }   
    public function create(Request $request) {
        $data['categories'] = Category::orderBy('id','desc')->get();
        return view('product.create',$data);
    }
    public function store(Request $request) {

        $request->validate([
            'product_name' => 'required'
        ]);
        if($request->has('product_image')) {
            $image = $request->file('product_image');
            $productImageFilename = time().rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productImageFilename);
        }
        if($request->has('dimension_image')) {
            $image = $request->file('dimension_image');
            $productDimensionImageFilename = time().rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productDimensionImageFilename);
        }
        if($request->has('application_image')) {
            $image = $request->file('application_image');
            $productApplicationImageFilename = time().rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productApplicationImageFilename);
        }
        if($request->has('usage_image')) {
            $image = $request->file('usage_image');
            $productUsageImageFilename = time().rand(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productUsageImageFilename);
        }
        $sizes = $request->input('size', []);
        $result = [];
        for ($i = 0; $i < count($sizes); $i += 2) {
            $heightIndex = $i;
            $lengthIndex = $i + 1;
            if (isset($sizes[$heightIndex]) && isset($sizes[$lengthIndex])) {
                $height = $sizes[$heightIndex];
                $length = $sizes[$lengthIndex];
                $result[] = [
                    'height' => $height,
                    'length' => $length,
                ];
            }
        }
        $product = new Product;
        $product->category_id = $request->category_id;
        $product->product_name = $request->product_name ?? 'Test';
        $product->product_image = $productImageFilename ?? null;
        $product->material = $request->material ?? '';
        $product->package = $request->package ?? '';
        $product->color = $request->color ?? '';
        $product->color_text = $request->color_text ?? '';
        $product->color_type = $request->color_type ?? '';
        $product->product_application = $request->product_application ?? '';
        $product->applications = $request->applications ?? '';
        $product->features = $request->features ?? '';
        $product->delivery_time = $request->delivery_time ?? '';
        $product->benefits = $request->benefits ?? '';
        $product->size = json_encode($result);
        $product->dimension_image = $productDimensionImageFilename ?? null;
        $product->application_image = $productApplicationImageFilename ?? null;
        $product->usage_image = $productUsageImageFilename ?? null;
        $product->save();
        return redirect()->back();
    }
}
