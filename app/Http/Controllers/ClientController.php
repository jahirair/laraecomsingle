<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\ShippingAddress;
class ClientController extends Controller
{
    public function categorypage($id){
        $category_info= Category::findOrFail($id);
        
        $products = Product::where('category_id',$id)->latest()->get();
        
        return view('home.categorypage', compact('category_info','products'));
    }

    public function singleproductpage($id){
        $product = Product::findOrFail($id);
        $subcategory_id = Product::where('id',$id)->value('subcategory_id');
        $related_products= Product::where('subcategory_id',$subcategory_id)->latest()->get();
        return view('home.singleproductpage',compact('product','related_products'));
    }

    public function userprofilepage(){
        
        return view('home.userprofilepage');
    }


    

    
    public function addtocartpage(){
        $cart_info=Cart::where('user_id',Auth::id())->latest()->get();
        return view('home.addtocartpage',compact('cart_info'));
    }

    public function deletecart($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocartpage')->with('message', 'Your Item Deleted from your cart successfully!');
    }
    public function addproducttocart(Request $request, $id){
        $product_price = $request->price;
        $product_quantity = $request->quantity;
        $price = $product_price * $product_quantity;
        $product_id = $id;
        $user_id = Auth::id();

        Cart::insert([
            'product_id' =>$product_id,
            'user_id' => $user_id,
            'quantity' => $product_quantity,
            'price' => $price,
        ]);
        return redirect()->route('addtocartpage')->with('message', 'Your Item Added to your cart successfully!');
    }

    public function shippingaddress(){
        return view ('home.shippingaddress');
    }
    public function storeshippingaddress(Request $request){
        $house_name= $request->house_name;
        $road_name = $request->road_name;
        $phone_no = $request->phone_no;
        $district = $request->district;
        $country = $request->country;
$shipping_info = ShippingAddress::where('user_id',Auth::id())->first();

//$user_id_in_shipping_table = $shipping_info->user_id;
//var_dump($user_id_in_shipping_table);
//exit();

if(is_null($shipping_info)){
ShippingAddress::insert([
            'user_id'=> Auth::id(),
            'house_name'=>$house_name,
            'road_name'=>$road_name,
            'phone_no'=>$phone_no,
            'district'=>$district,
            'country'=>$country,
        ]);
}


      if(!empty($shipping_info)){
        //var_dump($shipping_info);
        //exit();

$user_id_in_shipping_table = $shipping_info->user_id;
//var_dump($user_id_in_shipping_table);
        //exit();
        // $house_name= $shipping_info->house_name;
        // $road_name = $shipping_info->road_name;
        // $phone_no = $shipping_info->phone_no;
        // $district = $shipping_info->district;
        // $country = $shipping_info->country;
        //var_dump($house_name);
        //exit();
        ShippingAddress::findOrFail($user_id_in_shipping_table)->update([
            
            'house_name'=>$house_name,
            'road_name'=>$road_name,
            'phone_no'=>$phone_no,
            'district'=>$district,
            'country'=>$country,
        ]);
    }  

$shipping_info = ShippingAddress::where('user_id',Auth::id())->first();
    $cart_info = Cart::where('user_id',Auth::id())->latest()->get();
    //$user_id = Auth::id();
//$pending_orders = Order::where('user_id',$user_id)->latest()->get();
        return view('home.checkoutpage',compact('cart_info','shipping_info'))->with('message','Shipping Address Added Successfully!');
    }
    public function checkoutpage(){
        //$user_id = Auth::id();
        $cart_info=Cart::where('user_id',Auth::id())->latest()->get();
        $shipping_info=ShippingAddress::where('user_id',Auth::id())->first();
        //var_dump($shipping_info);
        //exit();
        return view('home.checkoutpage',compact('cart_info','shipping_info'));
    }

    public function storeorder(Request $request){
        $user_id = Auth::id();
        
        $cart_info=Cart::where('user_id',$user_id)->latest()->get();

        foreach($cart_info as $cart_info){
        $product_id = $cart_info->product_id;
        
        $product_name = Product::where('id',$product_id)->value('product_name'); 
        
        $shipping_info = ShippingAddress::where('user_id',Auth::id())->first();

        Order::insert([
        'user_id'=> Auth::id(),
        'user_name'=>Auth::user()->name,
        'house_name'=>$shipping_info->house_name,
        'road_name'=>$shipping_info->road_name,
        'shipping_phone_number'=>$shipping_info->phone_no,
        'district'=>$shipping_info->district,
        'country'=>$shipping_info->country,
        'cart_id'=>$cart_info->id,
        'product_name'=>$product_name,
        'price'=>$cart_info->price,
        'quantity'=>$cart_info->quantity,
        'total_price'=>$cart_info->quantity * $cart_info->price,
        'status'=>'pending',
            ]);
        }
        //$pending_orders = Order::where('user_id',$user_id)->latest()->get();
        $pending_orders = Order::where([['user_id',$user_id],['status','pending']])->latest()->get();
        // var_dump($pending_orders);
        // exit();
        return view('home.pendingorder',compact('pending_orders'))->with('message','Order Placed Successfully!');
    }
    


public function userpendingorder(){
    $user_id = Auth::id();
    //$pending_orders = Order::where('user_id',$user_id)->latest()->get();

    $pending_orders = Order::where([['user_id',$user_id],['status','pending']])->latest()->get();
        //var_dump($pending_orders);
        //exit();
        return view('home.pendingorder',compact('pending_orders'));
    }

    
    public function userhistory(){
        $user_id = Auth::id();
        $complete_orders = Order::where([['user_id',$user_id],['status','complete']])->latest()->get();
        //var_dump($pending_orders);
        //exit();
        return view('home.userhistory',compact('complete_orders'));
        
    }

    public function cancelorder($id){
        $user_id = Auth::id();
        $order_id = $id;
        
       $specificorder= Order::where('id',$order_id)->update([            
            'status'=>'cancel',            
        ]);
        
        $pending_orders = Order::where([['user_id',$user_id],['status','pending']])->latest()->get();
    return view('home.pendingorder',compact('pending_orders'))->with('message','Order Cancelled Successfully!');

    }
     public function newreleasepage(){
        return view('home.newreleasepage');
    }


     public function todaysdealpage(){
        return view('home.todaysdealpage');
    }
     public function customservicepage(){
        return view('home.customservicepage');
    }
}
