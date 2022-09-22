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
<form action="{{route('tafsirtiming.update',$timingtafsir->id)}}" method="POST">
    @csrf
    @method('PUT')
  
   
    <div class="mb-3">
      <label for="tafsirtime1" class="form-label">scheduale 1</label>
      <textarea name="tafsirtime1" id="tafsirtime1" class="form-control"   rows="4">{{$timingtafsir->tafsirtime1}}</textarea>
      {{-- <input type="text" name="tafsirtime1" value="{{$timingtafsir->tafsirtime1}}" class="form-control" id="tafsirtime1" > --}}
    </div>
    <div class="mb-3">
      <label for="tafsirtime2" class="form-label">scheduale 2</label>
      <textarea name="tafsirtime2" id="tafsirtime2" class="form-control"   rows="4">{{$timingtafsir->tafsirtime2}}</textarea>
      {{-- <input type="text" name="tafsirtime1" value="{{$timingtafsir->tafsirtime1}}" class="form-control" id="tafsirtime1" > --}}
    </div>
    <div class="mb-3">
      <label for="tafsirtime3" class="form-label">scheduale 3</label>
      <textarea name="tafsirtime3" id="tafsirtime3" class="form-control"   rows="4">{{$timingtafsir->tafsirtime3}}</textarea>
      {{-- <input type="text" name="tafsirtime1" value="{{$timingtafsir->tafsirtime1}}" class="form-control" id="tafsirtime1" > --}}
    </div>
   
    
 
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</div>
{{-- .container --}}
</div>
    
  @endsection