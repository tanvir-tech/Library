@extends('master/master')
@section("content")
<?php
use App\Http\Controllers\CartController;

$available = DB::table('books')->where('id', $item['id'])->first();


?>


    <div class="row p-5">

        <div class="col-lg-6">
            <img src="{{asset('gallery/'.$item['gallery'])}}" alt="Product Image">
        </div>

        <div class="col-lg-6">

            <h2 class="text-primary">{{$item['name']}}</h2>
            <h5 class="text-danger">{{$item['price']}} BDT</h5>
            <p>Author : {{$item['description']}}</p>
            {{-- <a href="#" class="btn btn-success btn-sm">Buy now</a><br><br> --}}

<form action="/cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{$item['id']}}>

            @if ($available->quantity != 0)
                <button class="btn btn-warning" type="submit">Add to CART</button>
            @else
                <h3 class="text-danger">Not available</h3>

                {{-- {{$available->quantity}} --}}
            @endif

            {{-- <a href="cart/{{$item['id']}}" class="btn btn-warning btn-sm">Add to CART</a> --}}
</form><br><br>

            <a href="/home" class="btn btn-info btn-sm rounded-circle">Go back</a>



        </div>
    </div>




@endsection
