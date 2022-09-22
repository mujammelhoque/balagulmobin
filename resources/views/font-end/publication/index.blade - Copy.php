
@extends('font-end.fontlayout.layout')
@section('content')
@section('style')
    <style>
        wrapper {
    box-shadow: 10px 10px 80px #c9fab2;
    max-width: 800px;
    margin: 30px auto;
    align-content: center;
}

select {
    border-radius: 20px;
    outline: none;
    border: 1px solid #ddd;
    color: #555
}

.cartimg {
    object-fit: contain;
    width: 130px;
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center
}

p.h4 {
    font-family: 'Roboto Slab', serif
}

.rating {
    font-size: 0.7rem
}

.fa-star,
.reviews {
    color: #daa520
}

div.h4 {
    font-size: 1.8rem;
    color: #d4a838;
    font-family: 'Lora', serif;
    margin: 0
}

.btn {
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 8px 20px
}

.card {
    position: relative
}

.card:hover {
    border: 1px solid #000;
    box-shadow: 3px 3px 30px rgb(166, 255, 144)
}

.red {
    background-color: #e03e3e;
    position: absolute;
    color: #fff;
    border-radius: 5px;
    right: 5px;
    top: 5px;
    font-size: 0.9rem
}

a:hover {
    text-decoration: none
}

@media(max-width:800px) {
    .wrapper {
        margin: 20px 10px
    }

    p.h4 {
        font-size: 1.35rem;
        padding-top: 10px
    }
}

@media(max-width:767px) {
    .wrapper {
        max-width: 500px;
        margin: 20px auto
    }
}

@media(max-width:424px) {
    .wrapper {
        width: 100%;
        margin: auto
    }

    div.text-muted {
        font-size: 0.75rem
    }
}
    </style>
@endsection
    @section('pubactive')
    hilight
    @endsection
<div  style="margin-left: 50px">
    <div class="wrapper rounded bg-white">
        {{-- <div class="d-flex align-items-center justify-content-end px-sm-3 pt-3 px-1">
            <div class="text-muted">Items per page (<b>53 items</b> )</div> <select name="num" id="num" class="px-2 py-1 ml-sm-2 ml-1">
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
            </select> <select name="sort" id="sort" class="px-1 py-1 ml-2">
                <option value="" selected hidden>Sort by</option>
                <option value="rating">Rating</option>
                <option value="popular">Popular</option>
                <option value="featured">Featured</option>
            </select>
        </div>
        <hr> --}}
        <div class="row px-sm-2 px-0 pt-3">
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-6 col-10 offset-sm-2 offset-1 mb-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plant-png-pleasures-helping-others-beautiful-transparent-plants-0.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 my-md-0 my-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plants-transparent-png-pictures-icons-and-png-14.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 my-md-0 my-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img  class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plant-png-plants-png-transparent-images-png-only-27.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-sm-2 px-0 pt-3">
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 mb-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img  class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plant-png-pleasures-helping-others-beautiful-transparent-plants-0.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 my-md-0 my-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plants-transparent-png-pictures-icons-and-png-14.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 offset-md-0 offset-sm-2 offset-1 col-sm-8 col-10 offset-sm-2 offset-1 my-md-0 my-3">
                <div class="card">
                    <div class="px-2 red text-uppercase">new</div>
                    <div class="d-flex justify-content-center"> <img class="cartimg" src="https://www.freepnglogos.com/uploads/plant-png/plant-png-plants-png-transparent-images-png-only-27.png" class="product" alt=""> </div> <b class="px-2">
                        <p class="h4">The Little Botanical Haworthia</p>
                    </b>
                    <div class="d-flex align-items-center justify-content-start rating border-top border-bottom py-2">
                        <div class="text-muted text-uppercase px-2 border-right">insto2007</div>
                        <div class="px-lg-2 px-1"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <a href="#" class="px-lg-2 px-1 reviews">{3 Reviews}</a> </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between py-2 px-3">
                        <div class="h4"><span>&#xa3;</span>10.99</div>
                        <div> <button class="btn btn-dark text-uppercase"> buy now </button> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection