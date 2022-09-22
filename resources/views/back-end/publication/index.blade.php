@extends('back-end.layout.layout')

@section('content')
{{-- <div style="positon:absolute;margin-top:200px"></div> --}}
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
  <div>
    @if ($message = Session::get('success'))
    <br>
    <div class="alert alert-success ">
        <p>{{ $message }}</p>
    </div>
    @endif
  </div>
  <div ><h4><a class="btn btn-outline-primary mt-2" href="{{route('publish.create')}}">Create New</a></h4></div>


<table class="table table-hover text-center " name="books" id="t1">
    <thead class="table-info">
        <tr>
            <th align="center">ক্রমিক</th>
            <th align="center"> বই এর নাম </th>
            <th align="center"> বই এর ছবি </th>
            <th align="center"> লেখক </th>
            <th align="center"> প্রিভিউ </th>
            <th width="15%" style="text-align:center;"> মূল্য </th>
            <th align="center">Action</th>
     
        </tr>
    </thead>
    @if (isset($publications))
    @forelse ($publications as $item)
    <tr>
        <td ><p id="ItemID1">{{ ++$i }}</p></td>
        <td ><p id="ItemName1"> {{$item->name}}</p></td>
        <td ><a  href="{{asset('images/'.$item->picture)}}"><img style="width: 120px" src="{{asset('images/'.$item->picture)}}" alt=""></a></td>
        <td ><p id="ItemAuthor1"> {{$item->author}}</p></td>
        <td ><p id="preview"> {{$item->preview}}</p></td>
        <td ><p id="ItemPrice1">BDT {{$item->price}}</p></td>
        <td style="width: 250px;border-left: 2px solid rgb(194, 235, 175);">
            <form action="{{ route('publish.destroy',$item->id) }}" method="POST">


                <a class="btn btn-outline-primary" href="{{ route('publish.edit',$item->id) }}">Edit</a>

                @csrf
                @method('DELETE')
  
                <button Onclick="return ConfirmDelete()" type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </td>

    </tr>
    @empty
        
    @endforelse
        
    @endif
             

    
    <tr id="total_tr" style="display: none;">
        <td></td>
        <td></td>
        <td> সর্বমোট মূল্য </td>
        <td name="TotalPrice" width="15%" align="center"><p id="total_price"></p> </td>
        <td></td>
    </tr>
</table>
<div class="d-flex justify-content-center">
    {!! $publications->links() !!}
</div>
@endsection