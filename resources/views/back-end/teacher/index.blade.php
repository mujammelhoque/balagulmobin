

{{-- <body> --}} 
    @extends('back-end.teacher.layout')
    @section('style')
    {{-- <style>
      .container {
            max-width: 800px;
        }
    </style> --}}
    @endsection
  @section('content')
      
  
  <p class="elements"></p>
  
  
      <div class="container">
   
  
          <form action="{{ url('allstore') }}" method="POST">
              @csrf
              @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if (Session::has('success'))
              <div class="alert alert-success text-center">
                  <p>{{ Session::get('success') }}</p>
              </div>
              @endif
              @php
                  $i=0;
                  $i++;
              @endphp
             <table class="table">
                 <tr>
                     <td >
                      <label for="" class="form-label">Select book</label>
                      <div class="input-group mb-2">
                        
                          <select name="book_id" id="book" class="form-select newbook">
                            <option value="" selected disabled>chose one</option>
                            @foreach($allbook as $key => $book)
                            <option value="{{$key}}"> {{$book}}</option>
                            @endforeach
                          </select>
  
                          <span class="input-group-text">
                              <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#myModal1">
                                  <i class="fas fa-plus" style="color: green"></i>
                                </button>
                          </span>
  
                        </div>
  
                     </td>
                     <td>
                      <label for="" class="form-label">Select chapter</label>
                      <div class="input-group mb-2">
                          <select name="chapter_id" id="chapter" class="form-select newchapter">
                
                          </select>
                          <span class="input-group-text">
                              <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#myModal2">
                                  <i class="fas fa-plus" style="color: green"></i>
                                </button>
                          </span>
  
                        </div>
                     </td>
  
                     <td>
                      <label for="" class="form-label">Select topic</label>
                      <div class="input-group mb-2">
                          <select name="topic_id" id="topic" class="form-select newtopic">
                          
                          </select>
                          <span class="input-group-text">
                              <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#myModal3">
                                  <i class="fas fa-plus" style="color: green"></i>
                                </button>
                          </span>
  
                        </div>
                     </td>
                    </tr>
  
                     {{-- <tr>
                     <td>
                     <label for="">Select Question Type</label>
                     <select name="qtype" id="" class="form-select">
                       <option value="" disabled> choose question type</option>
                       <option value="1"> Mcq</option>
                       <option value="2"> Fill in the Blank</option>
                     </select>
                    </td>
                  </tr> --}}
  
              
            
                 <tr>
                     <td><label for="">Option1</label>
                      <input class="opt" name="option1" id="option1" type="text">
                   </td>
                     <td>
                       <label for="">Option2</label>
                      <input class="opt" name="option2" id="option2" type="text">
                   </td>
                     <td>
                      <label for="">Option3</label>
                      <input class="opt" name="option3" id="option3" type="text">
                       </td>
                 </tr>
                 <tr>
                     <td><label for="">Option4</label>
                      <input class="opt" name="option4" id="option4" type="text">
                   </td>
                     <td>
                       <label for="">Option5</label>
                      <input class="opt" name="option5" id="option5" type="text">
                   </td>
                     <td>
                      <label for="">Option6</label>
                      <input class="opt" name="option6" id="option6" type="text">
                       </td>
                 </tr>
             </table>
              <br>
              <h5><button type="button" name="add" id="dynamic-ar" class="btn btn-sm btn-outline-primary optdisable">Add Question <i class="fas fa-plus"></i> </button></h5>
              <table class="table table-bordered" id="dynamicAddRemove">
                  <tr>
                      <th>Question</th>
                      <th>Answer</th>
                      <th>Delete</th>
                  </tr>
  
              </table>
              <button type="submit" class="btn btn-outline-success btn-block">Save</button>
          </form>
      
      
  <!-- The Book Modal -->
  <div class="container">
  <div class="modal fade" id="myModal1">
      <div class="modal-dialog">
        <div class="modal-content" id="createbook">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Book</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form id="addform1">
            @csrf
          <!-- Modal body -->
          <div class="modal-body">
              <label class="form-label" for="">Name</label>
              <input name="name" type="text" class="form-control">
              </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger creatbook" >Submit</button>
          </div>
      </form>
    
        </div>
      </div>
    </div>
    
  <!-- End  Book Model-->
      
  <!-- The Chapter Model  -->
  <div class="modal fade" id="myModal2">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Chapter</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form id="addform2">
            @csrf
          <!-- Modal body -->
          <div class="modal-body  addid" >
            <label class="form-label" for="">Chapter Name</label>
            <input type="text" name="name" class="form-control">
            
              </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" >Submit</button>
          </div>
      </form>
    
        </div>
      </div>
    </div>
    
  <!-- End  Chapter Model-->
      
  <!-- The Topic Model  -->
  <div class="modal fade" id="myModal3">
      <div class="modal-dialog">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Create Topic</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <form id="addform3">
            @csrf
          <!-- Modal body -->
          <div class="modal-body">
            {{-- <div class="addid"></div> --}}
            <div class="addChapterId"></div>
  
              <label class="form-label" for="">Topic Name</label>
              <input type="text" name="name" class="form-control">
              </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger" >Submit</button>
          </div>
      </form>
    
        </div>
      </div>
    </div>
  </div>
  </div>

  {{-- selection part start--}}
  <script type=text/javascript>
    
    $(document).ready(function(){
      $('#book').change(function(){
      var bookID = $(this).val();  
      if(bookID){
        $.ajax({
          type:"GET",
          url:"{{url('getBook')}}?book_id="+bookID,
          success:function(res){        
          if(res){
            $("#chapter").empty();
            $("#chapter").append('<option>Select chapter</option>');
            $.each(res,function(key,value){
              $("#chapter").append('<option value="'+key+'">'+value+'</option>');
            });
          
          }else{
            $("#chapter").empty();
          }
          }
        });
      }else{
        $("#chapter").empty();
        $("#topic").empty();
      }   
      });
      $('#chapter').on('change',function(){
      var chapterID = $(this).val();  
      if(chapterID){
        $.ajax({
          type:"GET",
          url:"{{url('getTopic')}}?chapter_id="+chapterID,
          success:function(res){        
          if(res){
            $("#topic").empty();
        $("#topic").append('<option>Select topic</option>');
            $.each(res,function(key,value){
              $("#topic").append('<option value="'+key+'">'+value+'</option>');
            });
          
          }else{
            $("#topic").empty();
          }
          }
        });
      }else{
        $("#topic").empty();
      }
        
      });
    }); 
    </script>
    
    {{-- selection part end--}}


<!-- js for question and ans start-->
<script type="text/javascript">
$(document).ready(function(){

  $("#dynamic-ar").click(function () {
   
      $("#dynamicAddRemove").append('<tr><td><input type="text" name="question[]" placeholder="Enter question" class="form-control" /></td><td> <select name="ans[]" id="optionvalue" class="form-select optionvalue"></select></td><td><button type="button" class="btn btn-sm btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
          );
  });
  $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
  });
  });
</script>
<!-- js for question and ans end-->


<!-- js for modal start-->
<script type="text/javascript">
  $('#book').on('change', function() {
  var bookid = $("#book :selected").val();
  $(".divchild").remove();
    $('.addid').append('<div class="divchild"><label class="form-label" for="">Selected Book</label><input type="text" name="book_id" value="'+bookid+'" class="form-control"> </div>') 
});
</script>

<script type="text/javascript">
  $('#chapter').on('change', function() {
  var chapterid = $("#chapter :selected").val();
  $(".divChapterchild").remove();
    $('.addChapterId').append('<div class="divChapterchild"><label class="form-label" for="">Selected Chapter</label><input type="text"  name="chapter_id" value="'+chapterid+'" class="form-control"> </div>') 
});
</script>
<!-- js for modal end-->

<!-- js for option start-->
<script>
function onClick(event) {
  var option = $('.opt').map(function(idx, elem) {
    return $(elem).val();
  }).get();
 var html = '';
 for (var i = 0; i < option.length; i++) {
  if (option[i] =="") { continue; }
   var value = option[i];
   html += '<option>' + value + '</option>';
 }
 $("#option1").prop('readonly', 'readonly');
 $("#option2").prop('readonly', 'readonly');
 $("#option3").prop('readonly', 'readonly');
 $("#option4").prop('readonly', 'readonly');
 $("#option5").prop('readonly', 'readonly');
 $("#option6").prop('readonly', 'readonly');
 
 $('.optionvalue').append(html);

  console.log(option);
  event.preventDefault();

}

$(document).ready(function(){
    $(function() {
  $('.optdisable').click(onClick);
});
});

</script>
<!-- js for option end-->

<!-- js for insert data from book modal start-->
   <script type="text/javascript">
   //for book modal, modal id = mymodal1
  $(document).ready(function(){
      $('#addform1').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              type:"POST",
              url:"{{url('createBookFromModal')}}",
              data: $('#addform1').serialize(),
              success: function(response){
                  var newbook_id =response[Object.keys(response)[0]]
                  console.log(newbook_id)
                  $(".newbook").empty();
        $.each(response,function(key,value){
          $(".newbook").append('<option value="'+value+'">'+key+'</option>');
        });

          $('#myModal1').modal('hide')
            alert("data seaved")
        $(".divchild").remove();
       $('.addid').append('<div class="divchild"><label class="form-label" for="">Selected Book</label><input type="text" name="book_id" value="'+newbook_id+'" class="form-control"> </div>') 

                  },

                  error: function(error){
                      console.log(error)
                      alert("Data Not Saved Something missing")
                  }

          });
      });
  });
// for chapter modal , modal id = mymodal2
  $(document).ready(function(){
      $('#addform2').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              type:"POST",
              url:"{{url('createChapterFromModal')}}",
              data: $('#addform2').serialize(),
              success: function(response){
                  console.log(response)
                  var newchapter_id =response[Object.keys(response)[0]]

                  $(".newchapter").empty();
        $.each(response,function(key,value){
          $(".newchapter").append('<option value="'+value+'">'+key+'</option>');
        });

           $('#myModal2').modal('hide')
                  alert("data seaved")
            
        $(".divChapterchild").remove();
    $('.addChapterId').append('<div class="divChapterchild"><label class="form-label" for="">Selected Chapter</label><input type="text"  name="chapter_id" value="'+newchapter_id+'" class="form-control"> </div>') 
                  },

                 error: function(error){
                    console.log(error)
                    alert("Data Not Saved Something missing")
                }

          });
      });
  });

  // for topic modal, modal id = mymodal3
$(document).ready(function(){
      $('#addform3').on('submit', function(e){
          e.preventDefault();
          $.ajax({
              type:"POST",
              url:"{{url('createTopicFromModal')}}",
              data: $('#addform3').serialize(),
              success: function(response){
                  console.log(response)
                  $(".newtopic").empty();
        $.each(response,function(key,value){
          $(".newtopic").append('<option value="'+value+'">'+key+'</option>');
        });

                  $('#myModal3').modal('hide')
                  alert("data seaved")
                  },

                  error: function(error){
                      console.log(error)
                      alert("Data Not Saved Something missing")
                  }
          });
        });
    });

  
</script>  
  
  @endsection
 
  
  