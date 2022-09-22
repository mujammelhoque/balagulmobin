<!DOCTYPE html>
<html lang="en">
<title>alblaghulmubin</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }
    
    
    .exam {
        margin: 0 auto;
        background-color: #F7F7F7;
        color: black;
        border-radius: 10px;
        padding: 20px;
        font-family: 'Montserrat', sans-serif;
        max-width: 800px
    }
    
    /* .exam .container>p {
        font-size: 32px
    } */
    
    .question {
        width: 75%
    }
    
    .options {
        position: relative;
        padding-left: 40px
    }
    
    #options label {
        display: block;
        margin-bottom: 15px;
        font-size: 14px;
        cursor: pointer
    }
    
    .options input {
        opacity: 0
    }
    
    .checkmark {
        position: absolute;
        top: -1px;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: rgb(81, 138, 136);
        border: 1px solid #ddd;
        border-radius: 50%
    }
    
    .options input:checked~.checkmark:after {
        display: block
    }
    
    .options .checkmark:after {
        content: "";
        width: 10px;
        height: 10px;
        display: block;
        background: white;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        transition: 300ms ease-in-out 0s
    }
    
    .options input[type="radio"]:checked~.checkmark {
        background: #21bf73;
        transition: 300ms ease-in-out 0s
    }
    
    .options input[type="radio"]:checked~.checkmark:after {
        transform: translate(-50%, -50%) scale(1)
    }
    
    .btn-primary {
        background-color: #555;
        color: #ddd;
        border: 1px solid #ddd
    }
    
    .btn-primary:hover {
        background-color: #21bf73;
        border: 1px solid #21bf73
    }
    
    .btn-success {
        padding: 5px 25px;
        background-color: #21bf73
    }
    
    @media(max-width:576px) {
        .question {
            width: 100%;
            word-spacing: 2px
        }
    }
    /*  */
    .carousel-item.active,
    .carousel-item-next,
    .carousel-item-prev{
        display:block;
    }
    </style>
<body>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>Exam Subject</b></h3>
  </div>
  <div class="w3-bar-block">
    {{-- <a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="#showcase" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Showcase</a> 
    <a href="#services" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Services</a> 
    <a href="#designers" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Designers</a> 
    <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Contact</a> --}}
    @forelse ($subject as $item)
    <a href="{{url('exam/'.$item->id)}}"  class="w3-bar-item w3-button w3-hover-white">{{$item->name}}</a> 

    @empty
        
    @endforelse
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
  <span>Exam Subject</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay" 
style="margin-top: 100px"></div>


    {{-- @php
        dd($question->last());
    @endphp --}}
    <div class="exam mt-sm-5 my-1" >
        <form action="{{url('examcheck')}}" method="POST">
            @csrf

            @foreach ($question as $key => $questionarry)
            {{-- @php
            dd($questionarry);
        @endphp --}}
            <div class="question ml-sm-5 pl-sm-5 pt-2" >
                
            @php
            $topic = $questionarry->first()->topic_id;
            $subject = $questionarry->first()->book_id;
           $topic_name= App\Models\Topic::find($topic);
           $book_name= App\Models\Book::find($subject);
        @endphp
         
        <h2 class="text-center" style="border: 2px solid black">    {{$book_name->name}}</h2>
           
           <h3 style=" text-decoration: underline;" class="text-center" > Exam Topic:  <strong> {{$topic_name->name}} </strong> </h3>
            @foreach ($questionarry as $k=> $item)
            
           <input type="hidden" name="book_id[]" value="{{$item->book_id}}">
           <input type="hidden" name="question_id[]" value="{{$item->id}}">
           <input type="hidden" name="chapter_id[]" value="{{$item->chapter_id}}">
           <input type="hidden" name="topic_id[]" value="{{$item->topic_id}}">
           <input type="hidden" name="answer[]" value="{{$item->answer}}">
           <input type="hidden" name="question[]" value="{{$item->question}}">

            <div class="py-2 h5"><b>{{$item->question}}</b></div>
            <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                 <label class="options">{{$item->option1}} 
                    <input type="radio" name="right_answer[]{{$key.$k}}" value="{{$item->option1}}"> <span class="checkmark"></span> </label> 
                 <label class="options">{{$item->option2}}
                     <input type="radio" name="right_answer[]{{ $key.$k}}" value="{{$item->option2}}"> <span class="checkmark"></span> </label> 

                     @if ($item->option3!='')
                 <label class="options">{{$item->option3}}
                     <input type="radio" name="right_answer[]{{ $key.$k}}" value="{{$item->option3}}"> <span class="checkmark"></span> </label>
                     @endif

                     @if ($item->option4!='')
                              <label class="options">{{$item->option4}} 
                    <input type="radio" name="right_answer[]{{ $key.$k}}" value="{{$item->option4}}"> <span class="checkmark"></span> </label> 
                     @endif

                    </div> 
      
            @endforeach

            @break

        </div> 
        
            @endforeach
            @if ($question->last()==$question->first())
            <input type="hidden" name="final_submit" value="1">
            <div class="d-flex align-items-center pt-3">
                <div class="ml-auto mr-sm-5"> <button class="btn btn-success">submit</button> </div>
            </div>
                @else
                <div class="ml-auto mr-sm-5"> <button class="btn btn-success">Next</button> </div>

            @endif
           
        </form>
    </div>
    
<!-- End page content -->
</div>



<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
