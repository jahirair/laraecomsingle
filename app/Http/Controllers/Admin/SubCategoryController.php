<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        $allsubcat= SubCategory::latest()->get();
        return view('admin.allsubcategory',compact('allsubcat'));
    }

    public function addsubcategory(){
        $categories = Category::latest()->get();
        return view('admin.addsubcategory',compact('categories'));
    }

    public function storesubcategory(Request $request){
        $request->validate([
            
            'subcategory_name' => 'required|unique:sub_categories', 
            'category_id'  =>'required',
        ]);

        $category_id = $request->category_id;
        
        $category_name = Category::where('id',$category_id)->value('category_name');

        SubCategory::insert([
            'subcategory_name'=> $request->subcategory_name,
            'category_id' => $category_id,
            'category_name' =>$category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name))
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);

        return redirect()->route('addsubcategory')->with('message','Sub Category Added Successfully.');
    }

    public function editsubcategory($id){

        $subcategory_info = SubCategory::findOrFail($id);
        $categories = Category::latest()->get();
        return view('admin.editsubcategory',compact('subcategory_info','categories'));
    }

    public function updatesubcategory(Request $request ){

        $request->validate([
            
            'subcategory_name' => 'required|unique:sub_categories', 
            'category_id'  =>'required',
        ]);

        $category_id = $request->category_id;

        
        
        $category_name = Category::where('id',$category_id)->value('category_name');
        $subcategory_id= $request->subcategory_id;
        
        SubCategory::findOrFail($subcategory_id)->update([

            'subcategory_name'=> $request->subcategory_name,
            'category_id' => $category_id,
            'category_name' => $category_name,
            'slug'=>strtolower(str_replace(' ','-',$request->subcategory_name))

        ]);

        return redirect()->route('allsubcategory')->with('message','Sub Category Updated Successfully.');
        
    }

    public function deletesubcategory($id){
        
        $category_id = SubCategory::where('id',$id)->value('category_id');
       SubCategory::findOrFail($id)->delete();
        Category::where('id',$category_id)->decrement('subcategory_count',1);
        
        return redirect()->route('allsubcategory')->with('message','Category Deleted Successfully.');
    }

}
