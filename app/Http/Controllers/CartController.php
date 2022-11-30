<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index(Request $request)
    {
      $userID=Auth::user()->id;
     
      if($request->user()){
        $cart=new Cart;
        $cart->user_id=Auth::user()->id;
        $cart->products_id=$request->product_id;
        $cart->save();
        
        return redirect()->route('dashboard')->with('message','カートに商品を追加しました');
      }

    
    
     
    }

    static function show()
    {
        $userID=Auth::user()->id;
        return Cart::where('user_id',$userID)->count();
    }

    public function cartlist()
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

    public function cart()
    {
      $totalcart=Cartcontroller::show();

      if($totalcart==0){
        return redirect('/cart');
      }
    }
        
}


