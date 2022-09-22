<div class="d-flex justify-content-between " style="height: 32px;">
  <div style="width: 15%"></div>
<div style=" width:60%">
{{--  --}}

  <div id="carouselContent" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
          <div class="carousel-item active text-center text-danger " style="font-size: 11px;font-weight:bold">
            <div class="quote " >
              بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم
            </div>
            <div class="source">
            </div>
          </div>
          @if (isset($carousel))
          @forelse ($carousel as $item)
          <div class="carousel-item  text-center text-danger " style="font-size: 11px; font-weight:bold" >

          <div class="quote">{{$item->text}}</div>
          <div class="source">- {{$item->src}}</div>
        </div>
          @empty
              
          @endforelse
              
          @endif

          {{-- <div class="carousel-item text-center  " style="font-size: 11px">
              
            <div class="quote">Hello, this is a quote from another person.</div>
            <div class="source">- Another person</div>

          </div> --}}
      </div>

  </div>

{{--  --}}
</div>
<div class="text-right " style="margin-right:15px; width:25%;">

  <a class="btn-sm" type="button" data-toggle="modal" data-target="#myModal"> 
     <i class="fa fa-bell text-primary " style='font-size:17px'  aria-hidden="true"><sup ><span class="text-danger badge badge-pill badge-secondary " >@if (isset($notification)){{$notification->count()}}@endif</span></sup></i> 
  </a>
  <a href="https://www.facebook.com/Albalaghulmubin-1505059516467781/" target="_blank"><i class="fab fa-facebook" style='font-size:17px'></i></a>
  <a href="https://www.youtube.com/c/Albalaghulmubin" target="_blank"><i class="fab fa-youtube" style='font-size:17px'></i></a></div>
</div>
  <nav class="navbar navbar-expand-lg ">
 
        

    <button type="button" id="sidebarCollapse" class="navbar-btn">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-align-justify"></i>
    </button>
    <!-- end toggle for sidebar -->
  <div>
     <a href="{{url('/')}}"><img width="80px" src="{{asset('uploads/logo/Albalaghulmubin.png')}}" alt=""> </a></div>
  
<div>
  <ul class="nav navbar-nav d-flex ml-auto">
  <li class="nav-item {{ request()->is('/') ? 'active' : '' }} " style="width: 50px; margin-left:10px;margin-right:10px; ">
    <a class="nav-link @yield('homelight')" href="{{url('/')}}">Home</a>
</li>
</ul>
</div>



  <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
        <ul class="nav navbar-nav d-flex ml-auto">

          
<div id="smalltopnav" > 
@if (isset($parentnav))
<li class="nav-item hilight tnavwidth" >
  <a class="nav-link" href="{{route('second.nav',$parentnav->id)}}">{{$parentnav->name}}  </a>
</li>
@endif

@if (isset($navs))     
@forelse ($navs as $item)
<li class="nav-item tnavwidth" >
  <a class="nav-link" href="{{route('second.nav', $item->id)}}">{{$item->name}}</a>
</li>
@empty
   
@endforelse
@endif
{{-- nav dropdown .start --}}

@isset($navsdrop)
    @if ($navsdrop->first())

<div class="dropdown ">
  <button class="dropbtn"> Others</button>
  <div class="dropdown-content">
    @forelse ($navsdrop as $item)
    <a class="nav-link" href="{{route('second.nav', $item->id)}}">{{$item->name}}</a>
 
    @empty
        
    @endforelse
  
  </div>
</div>
@endif
@endisset
</div>
{{-- nav dropdown .end --}}

          
          <li class="nav-item">
            <a class="nav-link  @yield('aboutlight')"  href="{{ url('about-us') }}">About us</a>
        </li>
       

          @if (!Auth::check())
          <li class="nav-item">
            <a class="nav-link  @yield('hilight')" href="{{ route('login') }}">Login</a>
        </li>
          @else
          <li class="nav-item dropdown pt-2">
            <a class="" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
          @endif 
        </ul>
      </div>
         
         


</nav>
{{-- model --}}
 <!-- The Modal -->
 <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Notificaton</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body">
      <ul style="list-style-type: '→ ';">
        @if (isset($notification))
        @forelse ($notification as $item)
        <li>
          <p style="margin: 0; padding:0">{{$item->title}}
          </p>
          <p class="text-right" style="margin: 0; padding:0"> <small style="margin-left:100px ">{{$item->created_at->diffForHumans() }}</small>
          </p>
        </li>
        @empty
            
        @endforelse
            
        @endif
      
       
      </ul>
      </div>
      
      <!-- Modal footer -->
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> --}}
      
    </div>
  </div>
</div>
