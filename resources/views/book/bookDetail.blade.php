@extends('master/master')
@section("content")


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
            <button class="btn btn-warning" type="submit">Add to CART</button>
            {{-- <a href="cart/{{$item['id']}}" class="btn btn-warning btn-sm">Add to CART</a> --}}
</form><br><br>

            <a href="/home" class="btn btn-info btn-sm rounded-circle">Go back</a>



        </div>
    </div>




@endsection
