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
<form action="{{route('publish.update',$editdata->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
 
   
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" value="{{$editdata->name}}" class="form-control" id="name" >
    </div>

    <div class="mb-3">
      <label for="author" class="form-label">Author</label>
      <input type="text" name="author" value="{{$editdata->author}}" class="form-control" id="author" >
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" name="price" value="{{$editdata->price}}" class="form-control" id="price" >
    </div>
    <div class="mb-3">
      <label for="picture" class="form-label">Picture</label>
      <input type="file" name="picture" class="form-control" placeholder="image">
      <img src="{{asset('images/'.$editdata->picture)}}" width="300px">
    </div>
    <div class="mb-3">
      <label for="stock" class="form-label">Stock</label>
      <input type="number" name="stock" value="{{$editdata->stock}}" class="form-control" id="stock" >
    </div>
    <div class="mb-3">
      <label for="preview" class="form-label">Preview File</label>
      <input type="file" name="preview" class="form-control" id="preview" >
      <img src="{{asset('preview/'.$editdata->preview)}}" width="300px">

    </div>
    
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection