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
<div class="d-flex justify-content-end"><h4><a class="btn btn-outline-info mt-2" href="{{route('surahtafsir.create')}}">Create New</a></h4></div>
@if (isset($surahtafsirs))
    

<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">Serial</th>
          <th scope="col">Category</th>
          <th scope="col">Topic</th>
          <th scope="col">Class Recording</th>
          <th scope="col">Class Note</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($surahtafsirs as $surahtafsir)
          @php
              $navname= App\Models\Navtest::find($surahtafsir->nav_id)
          @endphp
          <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $navname->name ?? "not defined"  }}</td>
            <td>{{$surahtafsir->description}}</td>
            <td><a href="{{$surahtafsir->class_rec_url}}"><i class="fab fa-youtube"></i> {{$surahtafsir->class_rec}}</a></td>
            <td><a href="{{$surahtafsir->class_note_url}}"><i class="fas fa-file-pdf"></i> {{$surahtafsir->class_note}}</a></td>
            <td style="width: 250px">
                <form action="{{ route('surahtafsir.destroy',$surahtafsir->id) }}" method="POST">
   
    
                    <a class="btn btn-outline-primary" href="{{ route('surahtafsir.edit',$surahtafsir->id) }}">Edit</a>
   
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
  <div class="d-flex justify-content-center">
    {!! $surahtafsirs->links() !!}
</div>
  @endif
@endsection
