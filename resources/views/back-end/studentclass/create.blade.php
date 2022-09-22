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
<form action="{{route('addclass.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="class_name" class="form-label">Course Name<sup class="text-danger">*</sup></label>
      <input type="text" name="class_name" class="form-control">   
    </div>
    <div class="mb-3">
      <label for="title" class="form-label">Course Title</label>
      <input type="text" name="title" class="form-control">   
    </div>
   
    <div class="mb-3">
      <label for="status" class="form-label">Course Status</label>
      <select name="status" class="form-control" id="status">
        <option value="1">Active</option>
        <option value="2">Inactive</option>
        </select>  
    </div>
   
  
{{--     
    <div class="mb-3">
      <label for="series" class="form-label">Series</label>
      <input type="text" name="series" class="form-control" id="series" >
    </div>
    <div class="mb-3">
      <label for="surah_no" class="form-label">Surah No</label>
      <input type="number" name="surah_no" class="form-control" id="surah_no" >
    </div>
    <div class="mb-3">
      <label for="surah_name" class="form-label">Surah Name</label>
      <input type="text" name="surah_name" class="form-control" id="surah_name" >
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Title</label>
      <input type="text" name="description" class="form-control" id="description" >
    </div>
    <div class="mb-3">
      <label for="class_rec" class="form-label">Class Record</label>
      <input type="text" name="class_rec" class="form-control" id="class_rec" >
    </div>
    <div class="mb-3">
      <label for="class_rec_url" class="form-label">Class Record url</label>
      <input type="text" name="class_rec_url" class="form-control" id="class_rec_url" >
    </div>
    <div class="mb-3">
      <label for="class_note" class="form-label">Class Note</label>
      <input type="text" name="class_note" class="form-control" id="class_note" >
    </div>
    <div class="mb-3">
      <label for="class_note_url" class="form-label">Class Note url</label>
      <input type="text" name="class_note_url" class="form-control" id="class_note_url" >
    </div> --}}
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection