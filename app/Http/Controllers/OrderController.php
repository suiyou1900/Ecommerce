<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class OrderController extends Controller
{
    public function index()
    {
        $userID=Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        // ユーザーがオーダーした注文のデータを取り出す処理
        $cartlist=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->where('carts.user_id',$userID)
        ->select('products.*','carts.id as cart_id')
        ->get();
  
        $total=DB::table('carts')
        ->count('id');
  
        $totalprice=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->sum('products.price');
  
      
        return view('/order',[
          'cartlist'=>$cartlist,
          'total'=>$total,
          'totalprice'=>$totalprice
      ]);
       
    
    }

    public function store(Request $request)
    {
      $userID=Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
      $allcart=Cart::where('user_id',$userID)->get();
      $totalprice=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->sum('products.price');

      $total=DB::table('carts')
        ->count('id');
  
      foreach($allcart as $cart)
      {
        $order=new Order;
        $order->product_id=$cart['products_id'];
        $order->user_id=$cart['user_id'];
        $order->first_name=$request->first_name;
        $order->last_name=$request->last_name;
        $order->email=$request->email;
        $order->postal_code=$request->postal_code;
        $order->address=$request->address;
        $order->phonenumber=$request->phonenumber;
        $order->payment_method=$request->payment;
        $order->quantity=$total;
        $order->totalprice=$totalprice;
        $order->save();
      }

      dd($order);
    }

  
}
