    
<div class="row pb-5 smallcart">
    @if (isset($publications))
        
 
    @foreach($publications as $product)
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" >
         
            <div class="thumbnail" >
                <div style="
            
                height:390px;
                overflow: auto;
              ">
                <img style="width:220px;height:280px" src="{{asset('images/'.$product->picture ) }}" alt="">
                <div class="caption">
                    <p style="font-size: 12px; font-weight:bold; margin-bottom:0px !important"> {{ $product->name }}</p>
                    <p style="font-size: 11px;margin-bottom:0px !important "> Author: {{ $product->author }}</p>
                  
                    <small><strong>Price: BTD </strong><b>{{ $product->price }}/-</b></small> <span>&nbsp;&nbsp;<a title="Preview" href="{{asset('preview/'.$product->preview)}}"><i class="fas fa-eye"></i></a></span>
                </div>

                </div>
                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>

        </div>
        </div>
    @endforeach
    @endif
</div>