@extends('master/master')
@section("content")
<div class="justify-content-center">


<div class="row p-5">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 bg-success text-white rounded">
        <form action="insertBook" method="POST" enctype="multipart/form-data">
          @csrf
        <br>
        <h3 class="text-center">New Book</h3>
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="Book name" name="productName">
        <br>
        <input class="form-control mr-sm-2" type="text" placeholder="author / description" name="description">
        <br>
        <label for="category">Book category:</label>
        <select class="form-control col-lg-6" id="category" name="category">
          <option value="Engineering">Engineering</option>
          <option value="Fiction">Fiction</option>
          <option value="ScienceFiction">ScienceFiction</option>
          <option value="Arts">Arts</option>
          <option value="Bengali">Bengali</option>
          <option value="English">English</option>
          <option value="Grammer">Grammer</option>
          <option value="Vocabulary">Vocabulary</option>
          <option value="Comics">Comics</option>
          <option value="GeneralKnowledge">GeneralKnowledge</option>
      </select>
        <br>
        <input class="form-control col-lg-4" type="number" placeholder="price" name="price">
        <br>
            {{-- product Image  --}}
            <label for="productImage">Select an image:</label>
            <input type="file" id="productImage" name="productImage">
        <br>
        <input class="form-control col-lg-4" type="number" placeholder="quantity" name="quantity">
        <br>
        <button class="btn btn-danger" type="submit">Submit</button>
        <br><br>
        </form>
      </div>
</div>
<div class="col-lg-3"></div>



@endsection
