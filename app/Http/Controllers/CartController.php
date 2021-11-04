<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{

function addToCart(Request $req){



    if($req->session()->has('user')){

        // $available = DB::table('books')->where('id', $req->product_id)->first();
        // // return $available->quantity ;
        // if($available->quantity == 0){
        //     return "Not available";
        // }

        $cart = new Cart;
        $cart->user_id = session()->get('user')['id'];
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect('home');

    }else{
        return view('auth/login');
    }

}

static function cart_Count(){

    $user_id = session()->get('user')['id'];
    return Cart::where('user_id', $user_id)->count();

}

function cartlist(Request $request){

    $userID = $request->session()->get('user')['id'];

    $items = DB::table('carts')
    ->join('books','carts.product_id','=','books.id')
    ->where('carts.user_id',$userID)
    ->select('books.*','carts.id as cart_id')
    ->get();
    return view('cart_order/cartlist',['Products'=>$items]);
}


function removeCart($id){

    Cart::destroy($id);
    return redirect('cartlist');
}



function orderNow(Request $request){

    $userID = $request->session()->get('user')['id'];

    $total = DB::table('carts')
    ->join('books','carts.product_id','=','books.id')
    ->where('carts.user_id',$userID)
    ->select('books.*','carts.id as cart_id')
    ->sum('books.price');

    return view('cart_order/ordernow',['total'=>$total]);
    //return $total;
}


function placeOrder(Request $req){

    $user_id = session()->get('user')['id'];
    $allcart = Cart::where('user_id',$user_id)->get();

    foreach($allcart as $cart){

        //$available = DB::table('books')->select('quantity')->where('id', $cart['user_id'])->first();


            // find the product
            $updateProduct = Book::find($cart['product_id']);
            // update product storage
            $updateProduct->sold++;
            $updateProduct->quantity--;
            $updateProduct->save();



        $order = new Order;
        $order->product_id = $cart['product_id'];
        $order->user_id = $cart['user_id'];
        $order->address = $req->address;
        $order->status = 'pending';
        $order->payment_method = $req->payment_method;
        $order->payment_status = 'pending';
        $order->save();


        // delete cart
        Cart::where('user_id',$user_id)->delete();





    }



    //
    return redirect('home');
}



function orderlist(Request $req){

    $userID = $req->session()->get('user')['id'];

    $orders = DB::table('orders')
    ->join('books','orders.product_id','=','books.id')
    ->where('orders.user_id',$userID)
    ->get();

    //return $orders;
    return view('cart_order/orderlist',['orders'=>$orders]);
}
}
