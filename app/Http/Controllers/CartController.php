<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index(Request $request)
    {
     
      if($request->session()->has('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')){
        $cart=new Cart;
        $cart->user_id=$request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $cart->products_id=$request->product_id;
        $cart->save();
        return redirect('/dashboard')->with('message','カートに商品を追加しました');
      }
     else{
        return view('auth.login');
     }
     
    }
        
}


