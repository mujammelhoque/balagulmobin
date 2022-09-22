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
<div ><h4><a class="btn btn-outline-info mt-2" href="{{route('carousel.create')}}">Create New</a></h4></div>

@if (isset($carousel))

    

<table class="table table-striped">
    <thead >
        <tr>
          <th scope="col">Serial</th>
          <th scope="col">Text</th>
          <th scope="col">Source</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($carousel as $item)
       
          <tr >
            <th scope="row">{{ ++$i }}</th>
            <td >{{($item->text)}}</td>
            <td >{{($item->src)}}</td>
            <td>{{($item->status)}}</td>
            
            <td style="width: 250px;border-left: 2px solid rgb(194, 235, 175);">
                <form action="{{ route('carousel.destroy',$item->id) }}" method="POST">
   
    
                    {{-- <a class="btn btn-outline-primary" href="{{ route('carousel.edit',$item->id) }}">Edit</a> --}}
   
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