@extends('master/master')
@section("content")



<div class="row">
      <div class="col-lg-11">


            <div class="row">
                  @foreach ($Products as $item)

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
                      <a href="removeCart/{{$item->cart_id}}" class="text-white btn btn-warning">Remove from Cart</a>
                </div>


                  <hr style="width:100%;"><br>

                  @endforeach
              </div>


      </div>


      <div class="col-lg-1">
            <a href="orderNow" class="text-white btn btn-success">Order Now</a>
      </div>
</div>







@endsection
