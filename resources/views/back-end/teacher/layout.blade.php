<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{asset('assets/admin/teacher.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
        {{-- <link rel="stylesheet" href="{{asset('assets/admin/index.css')}}"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"  />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        
 
    
        @yield('style')

        <title>Teacher Dashboard</title>
    </head>
    <body>
        <div class="container">
        <!--========== HEADER ==========-->
        <header class="header" style="margin-left: 30px">
            <div class="header__container">
                {{-- <img src="assets/img/perfil.jpg" alt="" class="header__img"> --}}

                <a href="#" class="header__logo">Albalaghulmubin</a>
    
                <div class="header__search">
                    <input type="search" placeholder="Search" class="header__input">
                    <i class='bx bx-search header__icon'></i>
                </div>
                
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                    @csrf
                    <button class="btn btn-primary">logout</button>  
                </form>
    
                <div class="header__toggle">
                    <i class='bx bx-menu' id="header-toggle"></i>
                </div>
            </div>
        </header>

        <!--========== NAV ==========-->
        <div class="nav" id="navbar" style="margin-left: 30px">
            <nav class="nav__container">
                <div>
                    <a href="#" class="nav__link nav__logo">
                        <i class='bx bxs-disc nav__icon' ></i>
                        <span class="nav__logo-name">Albalaghulmubin</span>
                    </a>
    
                    <div class="nav__list">
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Your Customizes</h3>
    
                            <a href="{{url('ajax-datatable-crud')}}" class="nav__link active">
                                <i class="fas fa-question"></i>
                                <span class="nav__name">Change Question</span>
                            </a>

                            <a href="{{url('bookIndex')}}" class="nav__link">
                                <i class="fas fa-book"></i>
                                <span class="nav__name">Change Book</span>
                               
                            </a>

                            <a href="{{url('chapterIndex')}}" class="nav__link">
                                <i class="fas fa-book"></i>
                                <span class="nav__name">Change Chapter</span>
                               
                            </a>

                            <a href="{{url('topicIndex')}}" class="nav__link">
                                <i class="fas fa-book"></i>
                                <span class="nav__name">Change Topic</span>
                               
                            </a>

                            
                    

                            <a href="#" class="nav__link">
                                <i class='bx bx-message-rounded nav__icon' ></i>
                                <span class="nav__name">Messages</span>
                            </a>
                        </div>
    
                        <div class="nav__items">
                            <h3 class="nav__subtitle">Menu</h3>
    
                            <div class="nav__dropdown">
                                <a href="#" class="nav__link">
                                    <i class='bx bx-bell nav__icon' ></i>
                                    <span class="nav__name">Notifications</span>
                                    <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                                </a>

                                <div class="nav__dropdown-collapse">
                                    <div class="nav__dropdown-content">
                                        <a href="#" class="nav__dropdown-item">Blocked</a>
                                        <a href="#" class="nav__dropdown-item">Silenced</a>
                                        <a href="#" class="nav__dropdown-item">Publish</a>
                                        <a href="#" class="nav__dropdown-item">Program</a>
                                    </div>
                                </div>

                            </div>

                            <a href="#" class="nav__link">
                                <i class='bx bx-compass nav__icon' ></i>
                                <span class="nav__name">Explore</span>
                            </a>
                            <a href="#" class="nav__link">
                                <i class='bx bx-bookmark nav__icon' ></i>
                                <span class="nav__name">Saved</span>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#" class="nav__link nav__logout">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>
    </div>
        <!--========== CONTENTS ==========-->
       <main style="margin-left: 30px; margin-top:50px">
            <section>
                @yield('content')
            </section>
        </main> 
        

        <!--========== MAIN JS ==========-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/admin/teacher.js')}}"></script>
        @yield('forjs')
    </body>
</html>