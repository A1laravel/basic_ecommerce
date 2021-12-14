<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    //all() fetch data and put on product page
    function index(){
        $data = Product::all();
        return view('product',['products'=>$data]);
    }
    //fetching product detail through product id and put on detail page
    function detail($id){
        $data = Product::find($id);
        return view('detail',['product'=>$data]);
    }
    //
    function search(Request $req){
        $data = Product::where('name','like','%'.$req->input('query').'%')->get();
        return view('search',['products'=>$data]);
    }
    // Adding product to database for cart
    function addToCart(Request $req){
        if($req->session()->has('user')){
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }
    // To show cart number
    static function cartItem(){
        $userId = Session::get('user')['id'];
        return Cart::where('user_id',$userId)->count();
    }
    // show cart product
    function cartList(){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
    }
    // to remove product from cart
    function removeCart($id){
        Cart::destroy($id);
        return redirect('cartlist');
    }
    // to add all price of cart item
    function orderNow(){
        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
        ->join('products','cart.product_id','products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }
    // Add address and more details to order table and remove data which is logged in
    function orderPlace(Request $req){
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "panding";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();// to remove product from cart which is logged in
            //return redirect('');
        }
        $req->input();
        return redirect('/');
    }
    // To view payment address status and moe details
    function myOrders(){
        $userId = Session::get('user')['id'];
        $orders =  DB::table('orders')
        ->join('products','orders.product_id','products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorders',['orders'=>$orders]);
    }
}
