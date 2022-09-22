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
<form action="{{route('tafsirtiming.store')}}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="tafsirtime1" class="form-label">Schedule Time 1</label>
      <textarea name="tafsirtime1" id="tafsirtime1" class="form-control" ></textarea>
   
    </div>
    <div class="mb-3">
      <label for="tafsirtime2" class="form-label">Schedule Time 2</label>
      <textarea name="tafsirtime2" id="tafsirtime2" class="form-control" ></textarea>
   
    </div>
    <div class="mb-3">
      <label for="tafsirtime3" class="form-label">Schedule Time 3</label>
      <textarea name="tafsirtime3" id="tafsirtime3" class="form-control" ></textarea>
   
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