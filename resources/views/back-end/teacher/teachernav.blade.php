
<header class="header" id="header" style="background-color:hsl(198, 60%, 35%)">
    <div class="header_toggle"><i id="header-toggle" class="fas fa-bars text-white"></i> &nbsp;&nbsp; <span><a class="text-white" href="{{route('teacherboard')}}">Teacher Dashboard </a> </span></div>
    <div class="header_img text-right"> <img src="{{asset('uploads/logo/Albalaghulmubin.png')}}" alt=""></div>
    <div> 
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <button class="btn btn-primary">logout</button>  
                </form>
    </div>
</header>
<div class="l-navbar " id="nav-bar" style="background-color:hsl(198, 60%, 35%)">
    <nav class="nav">
        <div> 
            <div class="nav_list">
                    <a class="nav_link nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-book" aria-hidden="true"></i>
                <span class="nav_name">    Online Exam</span> </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{url('create-exam')}}"><i class="menu-icon fa fa-caret-right"></i>
                        Make Exam</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('question.index')}}"><i class="menu-icon fa fa-caret-right"></i>
                            Question and Option Change</a>
                    </li>
{{--                     
                    <li>
                        <a class="dropdown-item" href="{{route('topic.index')}}"><i class="menu-icon fa fa-caret-right"></i>
                        Add topic</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('quizes.create')}}"><i class="menu-icon fa fa-caret-right"></i>
                        Add Quiz</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('questions.create')}}">   <i class="menu-icon fa fa-caret-right"></i>
                            Add Qustion </a>
                        </li>
                    <li>
                        <a class="dropdown-item" href="{{route('questions.index')}}">  <i class="fa fa-question" aria-hidden="true"></i>
                            View Qustion </a>
                        </li> --}}
                    
                </ul>
            </div>
        </div> 
        {{-- <a href="{{route('logout')}}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
    </nav>
</div>
