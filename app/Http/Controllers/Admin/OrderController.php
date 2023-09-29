<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){

        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('admin.pendingorder',compact('pending_orders'));
    }

    public function completeorders(){
        $complete_orders = Order::where('status','complete')->latest()->get();
        return view('admin.completed_orders',compact('complete_orders'));
    }

    

    public function cancelledorders(){
        $cancelled_orders = Order::where('status','cancel')->latest()->get();
        return view('admin.cancelled_order',compact('cancelled_orders'));
    }

    public function deletecancelledorder($id){
        
        Order::findOrFail($id)->delete();
        $cancelled_orders = Order::where('status','cancel')->latest()->get();
        return view('admin.cancelled_order',compact('cancelled_orders'));
    }

    public function completestatus($id){
         
       Order::where('id',$id)->update([            
            'status'=>'complete',            
        ]);

        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('admin.pendingorder',compact('pending_orders'));
        
    }
}
