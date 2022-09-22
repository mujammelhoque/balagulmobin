

{{-- <div class="text-center" >

  <p class="text-dark">For registration detail pls email to <a class="text-primary" href="mailto:albalaghualmubinu@gmail.com">albalaghualmubinu@gmail.com</a></P>  
  
  <p class="text-dark" style="font-size:x-small ; font-weight: 500;">For details of the program, please contact, Mob:+88-0171-5011-640 email: albalaghualmubinu@gmail.com <br>
  
    Stay connected by joining our <a  href="https://www.youtube.com/c/Albalaghulmubin" target="_blank">
      <img src="{{asset('images/yt.png')}}" style="height:12px;"></a> and
       <a  href="https://www.facebook.com/Albalaghulmubin-1505059516467781/"  target="_blank"><img src="{{asset('images/fb.png')}}" style="height:14px;"></a> page for regular updates</p>
            </div> --}}

        
          
      
  {{-- </main>                     --}}
    
  
  <!-- Footer -->
   
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#contentmargin').toggleClass('martest');

            });
        });

 
    </script>
    @yield('scripts')
</body>

</html>