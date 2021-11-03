<?php
use App\Http\Controllers\CartController;
// use Illuminate\Http\Request;
$totalCartItem = 0;
// if(Session::has('user')){
//   $totalCartItem = CartController::cart_Count();
// }

?>
{{-- nav bar  --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand " href="/home">Smart Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>




{{-- cart  --}}
      {{-- <a class="nav-link" href="/cartlist">Cart({{$totalCartItem}})</a> --}}
      @if(Session::has('user'))
      <a class="nav-link" href="/cartlist">Cart({{$totalCartItem}})</a>
      {{-- @else
      <a class="nav-link" href="/login">Cart({{$totalCartItem}})</a> --}}
      @endif
{{-- search  --}}
      <form class="form-inline my-2 my-lg-0" action="/search">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
        <button class="btn btn-warning my-2 my-sm-0" type="submit">Search</button>
      </form>

      @if(Session::has('user'))
{{-- dropedown menu  --}}
      <div class="dropdown p-1">
        <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{Session::get('user')['name']}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item text-warning" href="orderlist">My Orders</a>
          <a class="dropdown-item" href="#">My Wishlist</a>
          <a class="dropdown-item" href="#">Notifications</a>
          <a class="dropdown-item" href="#">Messages</a>

          {{-- @if(Str::contains(Session::get('user')['type'] , "admin"))
          <a class="dropdown-item" href="insertProduct">Insert Product</a>
          <a class="dropdown-item" href="insertProduct">Edit Product</a>
          @endif --}}

          <a class="dropdown-item text-warning" href="logout">Logout</a>

        </div>
      </div>
@else
<a class="nav-link" href="login">Login</a>
@endif



    </div>
  </nav>
  {{-- nav bar closed  --}}
