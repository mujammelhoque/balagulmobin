@include('font-end.partials.header')


    <div class="container-fluid ">

        @include('font-end.partials.topnav')
        <div class="row ">
  
         <div class=" col-md-1 col-lg-1 col-sm-1 sidesm" id="sidebar">  @include('font-end.partials.sidenav')</div>
         
          <div class="col-md-10 col-lg-10 col-sm-8 contentsm" id="contentmargin" class="pl-2 mobliewidth" >  
           
            @yield('content')
    
            {{-- footer .start --}}
            {{-- footer .end --}}
    
            </div>
          </div>
         


        </div>
        @include('font-end.partials.bottom')

    </div>
    @include('font-end.partials.footer')


