@extends('back-end.layout.layout')
@section('content')
<script>
  function ConfirmDelete()
  {
    var x = confirm("Are you sure you want to delete?");
    if (x)
        return true;
    else
      return false;
  }
</script> 

@if ($message = Session::get('success'))
<br>
<div class="alert alert-success ">
    <p>{{ $message }}</p>
</div>
@endif
@if (isset($tafsirtiming))

<div class=" d-flex justify-content-between">
<div ><h4><a class="btn btn-outline-info mt-2" href="{{route('tafsirtiming.create')}}">Create New</a></h4></div>
<div ><h4><a class="btn btn-outline-primary mt-2" href="{{ route('tafsirtiming.edit', $title ->id) }}">Change Title</a></h4></div>
</div>

    

<table class="table table-striped">
    <thead >
        <tr>
          <th scope="col">Serial</th>
          <th scope="col">{{$title ->tafsirtime1}}</th>
          <th scope="col">{{$title ->tafsirtime2}}</th>
          <th scope="col">{{$title ->tafsirtime3}}</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($tafsirtiming as $time)
       
          <tr >
            <th scope="row">{{ ++$i }}</th>
            <td >{!!nl2br($time->tafsirtime1)!!}</td>
            <td>{!!nl2br($time->tafsirtime2)!!}</td>
            <td>{!!nl2br($time->tafsirtime3)!!}</td>
            
            <td style="width: 250px;border-left: 2px solid rgb(194, 235, 175);">
                <form action="{{ route('tafsirtiming.destroy',$time->id) }}" method="POST">
   
    
                    <a class="btn btn-outline-primary" href="{{ route('tafsirtiming.edit',$time->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </td>
           
          </tr>
          @empty
              
          @endforelse
      
       
      </tbody>
  </table>
 
  @endif
@endsection

{{-- 
Monday after Fajr 5:45am to 6:45am

<a class="text-primary" href="https://youtu.be/zhtUzRuXoWA" target=_blank>কিভাবে বাইয়্যিনাহ্ ড্রীম বাঙলা কোর্সটি অনলাইনে করবেন</a> --}}