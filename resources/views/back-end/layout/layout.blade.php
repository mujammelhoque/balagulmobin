@include('back-end.partials.header')
<div class="container mt-5">
@include('back-end.partials.navside')
</div>
    <div class="h-100 bg-light">
        @yield('content')
    </div>



@include('back-end.partials.footer')