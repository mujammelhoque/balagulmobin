@extends('back-end.layout.layout')
@section('content')
<div class="container">
    <br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success w-75">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="card w-75">
    <div class="card-body">
<form action="{{route('publish.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
   
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name" >
    </div>
    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" name="author" class="form-control" id="author" >
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" class="form-control" id="price" >
    </div>
    <div class="mb-3">
      <label for="picture" class="form-label">Picture</label>
      <input type="file" name="picture" class="form-control" id="picture" >
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" name="stock" class="form-control" id="stock" >
    </div>
    <div class="mb-3">
      <label for="preview" class="form-label">Priview File </label>
      <input type="file" name="preview" class="form-control" id="preview" >
    </div>
    
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection