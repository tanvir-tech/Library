@extends('master/master')
@section("content")

<h2 class="bg-success text-white text-center">Your Orders</h2>

<div class="row">
                @foreach ($orders as $item)

                <div class="col-lg-3 p-3">
                      <a href="detail/{{$item->id}}">
                          <img class="card-img-top" src="{{asset('gallery/'.$item->gallery)}}" alt="Card image cap">
                      </a>
                </div>
                <div class="col-lg-3 p-3">
                      <h5 class="card-title">{{$item->name}}</h5>
                      <p>Author : {{$item->description}}</p>
                      <div class="text-danger">{{$item->price}} BDT</div>
                </div>
                <div class="col-lg-3 p-3">
                    <h4 class="text-info">Order Detail</h5>

                    <h6>Address : {{$item->address}}</h6>
                    <h6>Payment Status : {{$item->payment_status}}</h6>
                    <h6>Payment Method : {{$item->payment_method}}</h6>
                    <h6>Delivery Status : {{$item->status}}</h6>

                </div>






                <hr style="width:100%;"><br>


                @endforeach

</div>






@endsection
