@extends('back-end.teacher.layout')
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
<form action="{{route('addclass.update',$course->id)}}" method="POST">
    @csrf
    @method('PUT')
  
   
    <div class="mb-3">
      <label for="class_name" class="form-label">Name</label>
      <input type="text" name="class_name" value="{{$course->class_name}}" class="form-control" id="class_name" >
    </div>
    <div class="mb-3">
      <label for="title" class="form-label"> Title</label>
      <input type="text" name="title" value="{{$course->title}}" class="form-control" id="title" >
    </div>
    <div class="mb-3">
      <label for="status" class="form-label">Status</label>
      <input type="text" name="status" value="{{$course->status}}" class="form-control" id="status" >
    </div>
    
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection