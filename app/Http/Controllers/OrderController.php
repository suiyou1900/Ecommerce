<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        $userID=Auth::user()->id;
        // ユーザーがオーダーした注文のデータを取り出す処理
        $cartlist=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->where('carts.user_id',$userID)
        ->select('products.*','carts.id as cart_id')
        ->get();
  
        $total=$cartlist
        ->count('id');
  
        $totalprice=$cartlist
        ->sum('price');
  
      
        return view('/order',[
          'cartlist'=>$cartlist,
          'total'=>$total,
          'totalprice'=>$totalprice
      ]);
       
    
    }

    public function store(Request $request)
    {
      $userID=Auth::user()->id;
      $allcart=Cart::where('user_id',$userID)->get();
     
      $totalprice=DB::table('carts')
        ->join('products','carts.products_id','=','products.id')
        ->sum('products.price');

      $total=DB::table('carts')
        ->count('id');
      
      $totallist=Cartcontroller::show();

       $validated = Validator::make($request->all(), [
          'first_name' => 'required|max:255', 
          'last_name' => 'required|max:255', 
          'email' => 'email:rfc,dns',
          'postal_code' => 'required',
          'address' => 'required',
          'phonenumber' => ['required','numeric','digits_between:10,11'],
          
      ])->validate();

      if($totallist==0)
      {
        return redirect('/cart')->with('cart','!カートに商品がありません!');
      }
      
  
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
        Cart::where('user_id',$userID)->delete();
      }

      return redirect()->route('dashboard')->with('order','商品の注文を完了しました');
    }
    

}
