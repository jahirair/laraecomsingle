<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('admin.allproduct',compact('products'));
    }

    public function addproduct(){
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin.addproduct',compact('categories','subcategories'));
    }

    public function storeproduct(Request $request){
        $request->validate([            
            'product_name' => 'required|unique:products',
            'product_short_desc'=>'required',
            'product_long_desc'=>'required',
            'price'=>'required',            
            'category_id'=>'required',            
            'subcategory_id'=>'required',
            'total_product'=>'required',
            'product_image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',              
        ]);

        $product_name = $request->product_name;
        $product_short_desc = $request->product_short_desc;
        $product_long_desc = $request->product_long_desc;
        $price = $request->price;
        
        $category_id = $request->category_id;
        
        $category_name = Category::where('id',$category_id)->value('category_name');
        
        $subcategory_id = $request->subcategory_id;
        $subcategory_name = SubCategory::where('id',$subcategory_id)->value('subcategory_name');
        $total_product = $request->total_product;
        $image = $request->file('product_image');
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;
        $product_image = $image_url;

        $slug = strtolower(str_replace(' ','-',$request->product_name));
        Product::insert([
            'product_name'=>$product_name,
            'product_short_desc'=>$product_short_desc,
            'product_long_desc'=>$product_long_desc,
            'price'=>$price,
            'category_name'=>$category_name,
            'category_id'=>$category_id,
            'subcategory_name'=>$subcategory_name,
            'subcategory_id'=>$subcategory_id,
            'total_product'=>$total_product,
            'product_image'=>$product_image,
            'slug'=>$slug,
        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        SubCategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('addproduct')->with('message','Product Added Successfully.');

    }

    public function editproduct($id){
        $product= Product::findOrFail($id);
        $subcategories = SubCategory::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.editproduct',compact('product','subcategories','categories'));
    }

    public function updateproduct(Request $request){
       $request->validate([            
            'product_name' => 'required|unique:products',
            'product_short_desc'=>'required',
            'product_long_desc'=>'required',
            'price'=>'required',            
            'category_id'=>'required',            
            'subcategory_id'=>'required',
            'total_product'=>'required',
            'product_image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048',              
        ]);

        $product_name = $request->product_name;
        $product_short_desc = $request->product_short_desc;
        $product_long_desc = $request->product_long_desc;
        $price = $request->price;
        
        $category_id = $request->category_id;
        
        $category_name = Category::where('id',$category_id)->value('category_name');
        
        $subcategory_id = $request->subcategory_id;
        $subcategory_name = SubCategory::where('id',$subcategory_id)->value('subcategory_name');
        $total_product = $request->total_product;
        $image = $request->file('product_image');
        if($image){
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;
        $product_image = $image_url;
        }else{
            $product_image = $request->prev_img;
        }

        $slug = strtolower(str_replace(' ','-',$request->product_name));
        $product_id = $request->product_id;
        Product::findOrFail($product_id)->update([
            'product_name'=>$product_name,
            'product_short_desc'=>$product_short_desc,
            'product_long_desc'=>$product_long_desc,
            'price'=>$price,
            'category_name'=>$category_name,
            'category_id'=>$category_id,
            'subcategory_name'=>$subcategory_name,
            'subcategory_id'=>$subcategory_id,
            'total_product'=>$total_product,
            'product_image'=>$product_image,
            'slug'=>$slug,
        ]);
        
        return redirect()->route('allproducts')->with('message','Product Updated Successfully.');
 
    }

    public function editproductimage($id){
        $product= Product::findOrFail($id);
        //$subcategories = SubCategory::latest()->get();
        //$categories = Category::latest()->get();
        return view('admin.editproductimage',compact('product'));
    }

    

    public function updateproductimage(Request $request){
        
        $image = $request->file('product_image');
        if($image){
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_image->move(public_path('upload'),$image_name);
        $image_url = 'upload/'.$image_name;
        $product_image = $image_url;
        }
        $product_id = $request->product_id;
        Product::findOrFail($product_id)->update([
            
            'product_image'=>$product_image,
            
        ]);
        return redirect()->route('allproducts')->with('message','Product Image Changed Successfully.');

    }

    public function deleteproduct($id){
        
        $category_id = Product::where('id',$id)->value('category_id');
        $subcategory_id = Product::where('id',$id)->value('subcategory_id');
       Product::findOrFail($id)->delete();
        Category::where('id',$category_id)->decrement('product_count',1);
        SubCategory::where('id',$subcategory_id)->decrement('product_count',1);
        
        return redirect()->route('allproducts')->with('message','Category Deleted Successfully.');
    }

}
