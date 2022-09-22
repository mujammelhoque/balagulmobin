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

  {{-- male table start--}}
@if (isset($muser))
    
<h4 class="text-info text-center bg-white">Male user table</h4>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="col">SL</th>
          <th scope="col">name</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">Mobile</th>
          <th scope="col">Address</th>
          <th scope="col">Education</th>
          <th scope="col">Profession</th>
          <th scope="col">Prev Experience</th>
          <th scope="col">Register time</th>
          <th scope="col">Last Login</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($muser as $male)
    
          <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $male->name }}</td>
            <td>{{$male->age}}</td>
            <td>{{$male->gender}}</td>
            <td>{{$male->mobile}}</td>
            <td>{{$male->address}}</td>
            <td>{{$male->education}}</td>
            <td>{{$male->profession}}</td>
            <td>{{$male->prev_experi}}</td>
            <td>
              {{date('d-m-Y', strtotime($male->created_at))}}
            </td>
            <td>
              {{date('d-m-Y', strtotime($male->last_login_at))}}
            </td>
            <td>
                <form action="{{ route('user.destroy',$male->id) }}" method="POST" style="display: inline-block">
   
    
                    {{-- <a class="btn btn-outline-primary" href="{{ route('user.edit',$male->id) }}">Edit</a> --}}
   
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
    {!! $muser->links() !!}
</div>
  @endif
  {{-- male table end--}}

  {{-- female table start--}}
@if (isset($fuser))
    
<h4 class="text-info text-center bg-white">Female user table</h4>
<table class="table table-striped">
    <thead>
        <tr>
          <th scope="row">{{ ++$i }}</th>
          <th scope="col">name</th>
          <th scope="col">Age</th>
          <th scope="col">Gender</th>
          <th scope="col">Mobile</th>
          <th scope="col">Address</th>
          <th scope="col">Education</th>
          <th scope="col">Profession</th>
          <th scope="col">Prev Experience</th>
          <th scope="col">Register time</th>
          <th scope="col">Last Login</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($fuser as $female)
    
          <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $female->name }}</td>
            <td>{{$female->age}}</td>
            <td>{{$female->gender}}</td>
            <td>{{$female->mobile}}</td>
            <td>{{$female->address}}</td>
            <td>{{$female->education}}</td>
            <td>{{$female->profession}}</td>
            <td>{{$female->prev_experi}}</td>
            <td>
              {{date('d-m-Y', strtotime($female->created_at))}}
            </td>
            <td>
              {{date('d-m-Y', strtotime($female->last_login_at))}}
            </td>
            <td >
                <form action="{{ route('user.destroy',$female->id) }}" method="POST" style="display: inline-block">
   
    
                    {{-- <a class="btn btn-outline-primary" href="{{ route('user.edit',$female->id) }}">Edit</a> --}}
   
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
    {!! $fuser->links() !!}
</div>
  @endif

@endsection
