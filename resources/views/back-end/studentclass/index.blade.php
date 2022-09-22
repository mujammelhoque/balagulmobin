@extends('back-end.teacher.layout')
@section('content')
@if ($message = Session::get('success'))
<br>
<div class="alert alert-success ">
    <p>{{ $message }}</p>
</div>
@endif
<div class="d-flex justify-content-end"><h4><a class="btn btn-info mt-2" href="{{route('addclass.create')}}">Create New</a></h4></div>
@if (isset($classname))
    

<table class="table table-striped text-center">
    <thead >
        <tr>
          <th scope="col">Serial</th>
          <th scope="col">Course Name</th>
          <th scope="col">Title</th>
      
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($classname as $item)
       
          <tr >
            <th scope="row" style="width:100px">{{ ++$i }}</th>
            <td  style="border-left: 2px solid rgb(175, 220, 250);" >{{$item->class_name}}</td>
            <td style="border-left: 2px solid rgb(231, 250, 161);">{{$item->title}}</td>
           
            
            <td style="width: 200px;border-left: 2px solid rgb(194, 235, 175);">
                <form action="{{ route('addclass.destroy',$item->id) }}" method="POST">

                    <a class="btn btn-primary" href="{{ route('addclass.edit',$item->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
           
          </tr>
          @empty
              
          @endforelse
      
       
      </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {!! $classname->links() !!}
</div>
  @endif
@endsection
