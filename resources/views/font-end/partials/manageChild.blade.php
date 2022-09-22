
  @foreach($childs as $child)
  <li>
    <a href="{{route('second.nav', $child->id)}}">{{$child->name}}</a>
</li>


     
  
     

             @endforeach


   



                          
