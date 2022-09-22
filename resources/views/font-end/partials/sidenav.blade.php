<div  class="" id="test">
<nav id="">

    <ul class="list-unstyled components">
        
   
    
        <li class="">
           {{-- @yield('name') --}}
          
           
                @if (isset($sidenavs))
             

                @forelse ($sidenavs as  $category)
                
                <a href="#{{str_replace(' ', '', $category->name)}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle @if (isset($navactivess )  )
                {{-- @isset($navactivess || $parentnav) --}}
               @if (($navactivess->id==$category->id))
               hilight
               @endif
               {{-- @endisset  --}}
               @endif
               @if (isset($navactive2 )  )
                {{-- @isset($navactivess || $parentnav) --}}
               @if ($category->id==$navactive2->id)
               hilight
               @endif
               {{-- @endisset  --}}
               @endif ">
                {{$category->name}}</a>
                <ul class="collapse list-unstyled" id="{{str_replace(' ', '', $category->name)}}">
                    @if(count($category->childs))
                    @include('font-end.partials.manageChild',['childs' => $category->childs])
                @endif

                </ul>
         
               
                @empty
                @endforelse
                @endif
            </li>
        </li>
        <li>
            <a href="{{url('/publication')}}" class="@yield('pubactive')">Publications</a>
        </li>
        <li>
            <a href="{{url('/examlanding')}}" class="">Exam</a>
        </li>
        {{-- <li>
            <a href="#education" class="dropdown-toggle  @yield('pubactive')" data-toggle="collapse" aria-expanded="false" >Education Portal</a>

            <ul class="collapse list-unstyled" id="education">
                <li>
                    @if (isset($classes))
                        
                   
              @forelse ($classes as $course)
              <a href="{{url('quiz/'.$course->id)}}">{{$course->class_name}}</a>
              @empty  
              @endforelse
              @endif
               
                 
                </li> --}}
            </ul>
        </li>
        {{-- <li>
            <a href="https://zoom.us/j/2942221819" class="btn badge badge-pill badge-info" style="font-weight: 600; border-redious:15px;color:#0804dd">Join with zoom</a>
        </li> --}}
        {{-- <li>
            <a href="https://www.facebook.com/Albalaghulmubin-1505059516467781/" > <i class="fab fa-facebook-square"></i> Facebook</a>
        </li>
        <li>
            <a href="https://www.youtube.com/c/Albalaghulmubin"><i class="fab fa-youtube"></i> youtube</a>
        </li> --}}
    </ul>
    <button class="glow-on-hover" type="button"><a class="text-light" href="https://zoom.us/j/2942221819">Zoom Meeting</a>  </button>

 </nav>
 </div>

