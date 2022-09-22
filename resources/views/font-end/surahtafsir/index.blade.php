@extends('font-end.fontlayout.layout')
@section('style')

@endsection
@section('content')

<div class="row" style="margin-bottom: 150px !important;">
  <div class="col-md-10" style=""> 
    @if ($surahtafsirs->first())
   
    <div class="table-responsive">

    <table style="font-size: 12px;" class="table table-striped center">
        <thead class=" text-center table-bordered">
            <tr>
              <th scope="col">Serial</th>
              <th scope="col">Topic</th>
              <th scope="col">Class Recording</th>
              <th scope="col">Class Note</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($surahtafsirs as $surahtafsir)
            
        
              <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{$surahtafsir->description}}</td>
                <td><a href="{{$surahtafsir->class_rec_url}}"><i class="fab fa-youtube"></i>Class Recording</a></td>
                <td><a href="{{$surahtafsir->class_note_url}}"><i class="fas fa-file-pdf"></i> Class Note</a></td>
                
               
              </tr>
              @empty
                  
              @endforelse
          
           
          </tbody>
      </table>
      </div>
      <div class="d-flex justify-content-center">
        {!! $surahtafsirs->links() !!}
    </div>
      {{-- @endif --}}
      @else

        @if (isset($timingtafsir))
        
<div class="text-center mb-5 mt3 bg-white " style="font-family:Montserrat, Helvetica, sans-serif;   ">
  <h3 class="mt-3 text-center " style="font-weight: 500; font-size: 25px;">  From Tafeer Discussions and Quranic Arabic Grammar Discussions
    by Ustad Nouman Ali Khan in Bangla</h3>
    <small class="small-fonts">Conducted by Engr. Nayeem Ahmed <br>

      Source: Bayyinah Institute, USA <br>

      Special Thanks to Ustad Nouman Ali Khan for the Content of this Discussion</small>
</div>

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
      {{-- end first if --}}
      @endif




  </div>
  

  <div class="col-1  adds" >
    @include('font-end.partials.adds')

     </div>
</div>
    {{-- @if (isset($surahtafsirs)) --}}
   
@endsection

