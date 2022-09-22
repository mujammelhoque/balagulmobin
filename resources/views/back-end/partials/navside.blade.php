
<header class="header" id="header" style="background-color:rebeccapurple">
    <div class="header_toggle"><i id="header-toggle" class="fas fa-bars text-white"></i> &nbsp;&nbsp; <span><a href="{{route('dashboard')}}">Super Admin Dashboard</a> </span></div>
    <div class="header_img text-right"> <img src="{{asset('uploads/logo/Albalaghulmubin.png')}}" alt=""></div>
    <div> 
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <button class="btn btn-primary">logout</button>  
                </form>
    </div>
</header>
<div class="l-navbar" id="nav-bar" style="background-color:rebeccapurple" >
    <nav class="nav">
        <div> <a href="{{route('surahtafsir.index')}}" class="nav_logo"><i class="fas fa-book-open"></i> <span class="nav_logo-name">All Series</span> </a>
            <div class="nav_list">
                 <a href="{{route('navlist.index')}}" class="nav_link "> <i class="fas fa-list-alt"></i>
                <span class="nav_name">Top Nav</span> </a>
                 <a href="{{route('tafsirtiming.index')}}" class="nav_link "> <i class="fas fa-clock"></i>
                <span class="nav_name">Tafsir Timing</span> </a>
                 <a href="{{route('publish.index')}}" class="nav_link "> <i class="fas fa-bullhorn"></i>
                <span class="nav_name">Publication</span> </a>
                 <a href="{{route('notification.index')}}" class="nav_link "> <i style='font-size:20px' class='fas'>&#xf0f3;</i>

                <span class="nav_name">Notification</span> </a>
                 <a href="{{route('carousel.index')}}" class="nav_link "><i class="fas fa-sliders-h"></i>
                <span class="nav_name">Carousel</span> </a>
                 <a href="{{route('user.index')}}" class="nav_link "><i class="fas fa-user"></i>
                <span class="nav_name">User</span> </a>
                <h5>
                    <a href="{{route('teacherboard')}}" class="nav_link "> <i class="fas fa-school"></i>
                        <span class="nav_name">Teacher Pannel</span> </a> 
                </h5>
                {{-- <h5>
                    <a href="{{route('studentboard')}}" class="nav_link "> <i class="fas fa-user-graduate"></i>
                        <span class="nav_name">Student Pannel</span> </a> 
                </h5> --}}

                    {{-- <a class="nav_link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i>
                <span class="nav_name">    Online Exam</span> </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('addclass.index')}}"><i class="menu-icon fa fa-caret-right"></i>
                        Add Class</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('quizes.create')}}"><i class="menu-icon fa fa-caret-right"></i>
                        Add Quiz</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/questions/create">   <i class="menu-icon fa fa-caret-right"></i>
                            Add Qustion </a>
                        </li>
                    
                </ul> --}}
            </div>
        {{-- </div> <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
    </nav>
</div>
