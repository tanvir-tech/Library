@extends('master/master')
@section("content")
<div class="justify-content-center">


<div class="row p-5">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 bg-info text-white rounded">
        <form action="registration" method="POST">
          @csrf
        <br>
        <h3 class="text-center">Register as Customer</h3>
        <br>
    
        <input class="form-control mr-sm-2" type="text" placeholder="Customer name" name="user">
        <br>
        <input class="form-control mr-sm-2" type="email" placeholder="email" name="email">
        <br>
        <input class="form-control mr-sm-2" type="password" placeholder="Password" name="password">
        <br>
    
        <button class="btn btn-success" type="submit">Submit</button>
        <br><br>
        </form>
      </div>
</div>
<div class="col-lg-3"></div>











@endsection