@extends('font-end.fontlayout.layout')
@section('style')
@endsection
@section('content')
@section('homelight')
    hilight
@endsection

<div class="row" style="margin-bottom: 100px !important;">
  <div class="col-md-10">

    <div class="text-center mb-5 mt3 bg-white " style="font-family:Montserrat, Helvetica, sans-serif;   ">
      <h3 class="mt-3 text-center " style="font-weight: 500; font-size:25px;">  From Tafeer Discussions and Quranic Arabic Grammar Discussions
        by Ustad Nouman Ali Khan in Bangla</h3>
        <small class="small-fonts">Conducted by Engr. Nayeem Ahmed <br>
    
          Source: Bayyinah Institute, USA <br>
    
          Special Thanks to Ustad Nouman Ali Khan for the Content of this Discussion</small>
    </div>
    
    @if (isset($timingtafsir))
    <table class="table  text-center">
      <thead class="bg-light table-bordered text-dark ">
        <tr>
          <th>{{$title->tafsirtime1}}</th>
          <th>{{$title->tafsirtime2}}</th>
          <th>{{$title->tafsirtime3}}</th>
        
        </tr>
      </thead>
      <tbody class="table-bordered">
        <tr>
          @forelse ($timingtafsir as $item)
          <td>{!!nl2br($item->tafsirtime1) !!}</td>
          <td>{!! nl2br($item->tafsirtime2)!!}</td>
          <td>{!! nl2br($item->tafsirtime3) !!}</td>
        </tr>
          @empty
              
          @endforelse
      
      
     
      </tbody>
    </table>
    @endif
    
          
  </div>

  <div class="col-md-1  adds"  >
@include('font-end.partials.adds')
  </div>
</div>
 

@endsection

