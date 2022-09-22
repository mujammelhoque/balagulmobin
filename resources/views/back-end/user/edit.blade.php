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
<form action="{{route('surahtafsir.update',$surahtafsir->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
    <label for="nav_id" class="form-label">Nav Category</label>
    <select name="nav_id"  id="nav_id"  class="form-select"  size="4" aria-label="size 3 select example">
        {{-- <option selected>Open this select menu</option> --}}
        @forelse ($navs as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @empty
            <span>No category found</span>
        @endforelse
   
      </select>
    </div>
    {{-- <div class="mb-3">
      <label for="nav_id" class="form-label">Nav Category</label>
      <input type="number" name="nav_id" class="form-control" id="nav_id" >
    </div> --}}
    <div class="mb-3">
      <label for="series" class="form-label">Series</label>
      <input type="text" name="series" value="{{$surahtafsir->series}}" class="form-control" id="series" >
    </div>
    <div class="mb-3">
      <label for="surah_no" class="form-label">Surah No</label>
      <input type="number" name="surah_no" value="{{$surahtafsir->surah_no}}" class="form-control" id="surah_no" >
    </div>
    <div class="mb-3">
      <label for="surah_name" class="form-label">Surah Name</label>
      <input type="text" name="surah_name" value="{{$surahtafsir->surah_name}}" class="form-control" id="surah_name" >
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Title</label>
      <input type="text" name="description" value="{{$surahtafsir->description}}" class="form-control" id="description" >
    </div>
    <div class="mb-3">
      <label for="class_rec" class="form-label">Class Record</label>
      <input type="text" name="class_rec" value="{{$surahtafsir->class_rec}}" class="form-control" id="class_rec" >
    </div>
    <div class="mb-3">
      <label for="class_rec_url" class="form-label">Class Record url</label>
      <input type="text" name="class_rec_url" value="{{$surahtafsir->class_rec_url}}" class="form-control" id="class_rec_url" >
    </div>
    <div class="mb-3">
      <label for="class_note" class="form-label">Class Note</label>
      <input type="text" name="class_note" value="{{$surahtafsir->class_note}}" class="form-control" id="class_note" >
    </div>
    <div class="mb-3">
      <label for="class_note_url" class="form-label">Class Note url</label>
      <input type="text" name="class_note_url" value="{{$surahtafsir->class_note_url}}" class="form-control" id="class_note_url" >
    </div>
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection