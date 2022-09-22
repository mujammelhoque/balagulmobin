@extends('font-end.fontlayout.layout')
@section('content')
@section('style')
<style>
.error {
    color: red;
    font-weight: 400;
    display: block;
    padding: 6px 0;
    font-size: 14px;
}

.form-control.error {
    border-color: red;
    padding: .375rem .75rem;
}
</style>
@endsection

    @section('pubactive')
    hilight
    @endsection
  
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Book</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr data-id="{{ $id }}">
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-4 hidden-xs"><img src="{{asset('images/'.$details['image'] ) }}" width="100" height="100" class="img-responsive"/></div>
                                        <div class="col-sm-9">
                                            <p class="nomargin small">{{ $details['name'] }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">{{ $details['price'] }}/-</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}/-</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" > 
                            <h5 class="text-right">
                                <div><strong>Total {{ $total }}/-</strong></div></h5></td>
                    </tr>
                  
                </tfoot>
            </table>
        </div>
        <div class="col-md-6 col-sm-12">
            <form method="POST" action="{{url('sendemail')}}" novalidate>
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your name">
                  @if ($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ old('') }}" placeholder="Enter email">
                  @if ($errors->has('email'))
                  <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="phone" value="{{ old('') }}" placeholder="Enter your phone number">
                  @if ($errors->has('phone'))
                  <span class="text-danger">{{ $errors->first('phone') }}</span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="address">Address</label>
                <textarea name="address" id="address"  class="form-control"  rows="3">{{ old('address') }}</textarea>
                @if ($errors->has('address'))
                  <span class="text-danger">{{ $errors->first('address') }}</span>
                  @endif              
             </div>

                <div class="form-group">
               
                    <label for="travel">Payment Method</label>
                    <select name="payment" class="custom-select form-control" id="travel" onChange=showHide() >
                        <option value="">Choose...</option>
                        <option value="Cash-On-Delivery">Cash On Delivery</option>
                        
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nogad">Nogad</option>
                        {{-- <option value="Roket">Roket</option>
                        <option value="Nogad">Nogad</option> --}}
                    </select>
                    @if ($errors->has('payment'))
                  <span class="text-danger">{{ $errors->first('payment') }}</span>
                  @endif
                
             </div>
             <div class="form-group" style="display: none" id="hidden-panel">
                <label for="txnid">Transaction Id </label>
                <input type="text" name="txnid" class="form-control" id="txnid" 
                        value="{{ old('txnid') }}" placeholder="write your txnid id">
                        @if ($errors->has('txnid'))
                        <span class="text-danger">{{ $errors->first('txnid') }}</span>
                        @endif
            </div>
            <div class="form-group">
                @if ($errors->has('txnid'))
                <span class="text-danger">{{ $errors->first('txnid') }}</span>
                @endif
            </div>
              
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    
    <hr>
    
    <div>

    </div>

    @endsection
      
    @section('scripts')
    <script type="text/javascript">
      
        $(".update-cart").change(function (e) {
            e.preventDefault();
      
            var ele = $(this);
      
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                   window.location.reload();
                }
            });
        });
      
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
      
            var ele = $(this);
      
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
      
    </script>

<script>
    function showHide() {
     let travelhistory = document.getElementById('travel')
     if (travelhistory.value == "Bkash") {
         document.getElementById('hidden-panel').style.display = 'block'
     } else if(travelhistory.value == "Rocket") {
         document.getElementById('hidden-panel').style.display = 'block'
     }else if(travelhistory.value == "Nogad"){
        document.getElementById('hidden-panel').style.display = 'block'
     }else{
        document.getElementById('hidden-panel').style.display = 'none'

     }
 }
  </script>
    
    @endsection
