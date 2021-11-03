<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    function insertBook(Request $req){

        //validate
        $req->validate([
            'productName'=>'required',
            'description'=>'required',
            'category'=>'required',
            'price'=>'required',
            'productImage'=>'required|file|mimes:jpg,jpeg,bmp,png'
        ]);

        // file
        $productImageExt = $req->productImage->extension();
        $new_productImageName = time().'_'.$req->productName.'_'.$req->category.'.'.$productImageExt;
        $req->productImage->move(public_path('gallery'), $new_productImageName);

        //form input
        $book = new Book();
        $book->name = $req->productName;
        $book->description = $req->description;
        $book->category = $req->category;
        $book->price = $req->price;
        $book->gallery = $new_productImageName;
        $book->save();
        return redirect('/insertBook');

        // return $product;
    }

    function showBooks(Request $req){
        $items = Book::all();
        // return $items;
        return view('book/home',['Books'=>$items]);
    }

    function search(Request $req){
        // return $req->input();
        $items = Book::where('name','like', '%'.$req->input('query').'%')
                        ->orWhere('description','like', '%'.$req->input('query').'%')
                        ->orWhere('category','like', '%'.$req->input('query').'%')
                        ->get();
        return view('book/home',['Books'=>$items]);
    }

    function categoryProduct($category){
        // return $category;
        $items = Book::where('category','like', '%'.$category.'%')->get();
        return view('showProduct/categoryProduct',['Products'=>$items]);

    }


    function detail($id){
        $item = Book::find($id);
        return view('book/bookDetail',['item'=>$item]);
    }




// Uncomplete
    function removeProduct($id){

        Book::destroy($id);
        return redirect('productList');
    }

}
