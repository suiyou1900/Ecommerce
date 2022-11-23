<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function index(Request $request)
    {
     
      if($request->session()->has('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d')){
        $cart=new Cart;
        $cart->user_id=$request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        $cart->products_id=$request->product_id;
        $cart->save();
        return redirect()->route('dashboard')->with('message','カートに商品を追加しました');
      }
     else{
        return view('auth.login')->with('errormesssage','ログインしてください');
     }
     
    }

    static function show()
    {
        $userID=Session::get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        return Cart::where('user_id',$userID)->count();
    }

    public function cartlist()
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


    
      return view('/cart',[
        'cartlist'=>$cartlist,
        'total'=>$total,
        'totalprice'=>$totalprice
    ]);
    }

    public function destroy($id)
    {
      Cart::destroy($id);
      return redirect('/cart');
    }
        
}


