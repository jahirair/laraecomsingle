<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function index(){
        //return view('admin.dashboard');
        $usertype = Auth::user()->usertype;

        if ($usertype=='1'){
            return view ('admin.dashboard');
        }
        else{
            //return view ('home.frontpage');
            return redirect('/login');
           
        }
    }
}
