@extends('master/master')
@section("content")
<br><br><br>
<h2 class="text-warning">Place Order</h2>

<table class="table">
    {{-- <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead> --}}
    <tbody>
      <tr>
        <td>Amount</td>
        <td>{{$total}} BDT</td>
      </tr>
      <tr>
        <td>Delivery charge</td>
        <td>15 BDT</td>
      </tr>
      <tr class="text-success">
        <td>Total</td>
        <td>{{$total+15}} BDT</td>
      </tr>

    </tbody>
  </table>



<div class="bg-warning p-5">
  <form action="placeOrder" method="POST">
  @csrf
    <div class="form-group">
      <label for="exampleFormControlInput1">Shipping address</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="your address" name="address">
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Payment Method</label>
      <select class="form-control" id="exampleFormControlSelect1" name="payment_method">
        <option>Cash-on-delivery</option>
        <option>Bkash</option>
        <option>Nagad</option>
        <option>Rocket</option>
        <option>VISA</option>
        <option>Master</option>
      </select>
    </div>

  <form>


    <button type="submit" class="btn btn-success">Place Order</button>
</div>






<br><br><br>
@endsection
