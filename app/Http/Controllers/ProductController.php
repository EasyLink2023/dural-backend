<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['products'] = Product::orderBy('id', 'desc')->get();
        return view('product.index', $data);
    }
    public function create(Request $request)
    {
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('product.create', $data);
    }
    public function edit($id)
    {
        $data['product'] = Product::whereId($id)->first();
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        return view('product.edit', $data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required'
        ]);
        if ($request->has('product_image')) {
            $image = $request->file('product_image');
            $productImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productImageFilename);
        }
        if ($request->has('dimension_image')) {
            $image = $request->file('dimension_image');
            $productDimensionImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productDimensionImageFilename);
        }
        if ($request->has('application_image')) {
            $image = $request->file('application_image');
            $productApplicationImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productApplicationImageFilename);
        }
        if ($request->has('usage_image')) {
            $image = $request->file('usage_image');
            $productUsageImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
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
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $product = Product::find($request->id);
        if ($request->has('product_image')) {
            $fileToDelete = public_path('uploads/product-images/' . $product->product_image);
            if (File::exists($fileToDelete)) {
                File::delete($fileToDelete);
            }
            $image = $request->file('product_image');
            $productImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productImageFilename);
            $product->product_image = $productImageFilename;
        }
        if ($request->has('dimension_image')) {
            $fileToDeletedimension_image = public_path('uploads/product-images/' . $product->dimension_image);
            if (File::exists($fileToDeletedimension_image)) {
                File::delete($fileToDeletedimension_image);
            }
            $image = $request->file('dimension_image');
            $productDimensionImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productDimensionImageFilename);
            $product->dimension_image = $productDimensionImageFilename;
        }
        if ($request->has('application_image')) {
            $fileToDeleteapplication_image = public_path('uploads/product-images/' . $product->application_image);
            if (File::exists($fileToDeleteapplication_image)) {
                File::delete($fileToDeleteapplication_image);
            }
            $image = $request->file('application_image');
            $productApplicationImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productApplicationImageFilename);
            $product->application_image = $productApplicationImageFilename;
        }
        if ($request->has('usage_image')) {
            $fileToDeleteusage_image = public_path('uploads/product-images/' . $product->usage_image);
            if (File::exists($fileToDeleteusage_image)) {
                File::delete($fileToDeleteusage_image);
            }
            $image = $request->file('usage_image');
            $productUsageImageFilename = time() . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/product-images'), $productUsageImageFilename);
            $product->usage_image = $productUsageImageFilename;
        }
        $product->save();
        return redirect()->back()->with('success', 'Product created successfully');
    }

    public function destroy($id) {
        $product = Product::find($id);
        if ($product->product_image) {
            $fileToDelete = public_path('uploads/product-images/' . $product->product_image);
            if (File::exists($fileToDelete)) {
                File::delete($fileToDelete);
            }
        }
        if ($product->dimension_image) {
            $fileToDeletedimension_image = public_path('uploads/product-images/' . $product->dimension_image);
            if (File::exists($fileToDeletedimension_image)) {
                File::delete($fileToDeletedimension_image);
            }
        }
        if ($product->application_image) {
            $fileToDeleteapplication_image = public_path('uploads/product-images/' . $product->application_image);
            if (File::exists($fileToDeleteapplication_image)) {
                File::delete($fileToDeleteapplication_image);
            }
        }
        if ($product->usage_image) {
            $fileToDeleteusage_image = public_path('uploads/product-images/' . $product->usage_image);
            if (File::exists($fileToDeleteusage_image)) {
                File::delete($fileToDeleteusage_image);
            }
        }
        $delete = $product->delete();
        return redirect()->back()->with('delete-success', 'Product deleted Successfully');
    }
}
