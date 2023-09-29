<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function redirect(){
        if(Auth::user()){
            $usertype = Auth::user()->usertype;

            if ($usertype=='1'){
                return view ('admin.home');
            }
            else{

                $products= Product::latest()->get();
                return view ('home.frontpage',compact('products'));
            }
        }
        else{
           $products= Product::latest()->get();
                return view ('home.frontpage',compact('products')); 
        }
    }

    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }

}
