@extends('home.layouts.template')

@section('page_title')
Single Product Page - Single Ecom
@endsection
@section('content')
<!-- Content -->


<div class="container">
    <h1 class="fashion_taital">Product Details</h1>
    <div class="fashion_section_2">
        <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                
                <div class="tshirt_img"><img src="{{ url('public/'.$product->product_image) }}"></div>
                
            </div>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="box_main">
                <h4 class="shirt_text text-left">{{ $product->product_name }}</h4>
                <p class="price_text text-left">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                <p class="" style="margin-left:0">{{ $product->product_long_desc }}</p>
                <div class="btn_main">
                    <form action="{{ route('addproducttocart',$product->id) }}" method="post">
                        @csrf
                        
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        Quantity:  <input type="number" name="quantity" min="1" style="margin-bottom:20px;"><br>
                        <input type="submit" value="Add To Cart" class="btn btn-warning ">
                    </form>
                    
                    
                </div>
            </div>
        </div>
        
        </div>
    </div>
</div>

<div class="container">
    <h1 class="fashion_taital">Related Product</h1>
    <div class="fashion_section_2">
        <div class="row">
        @foreach ($related_products as $product )
            
        
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->product_name }}</span></p>
                <div class="tshirt_img"><img src="{{ url('public/'.$product->product_image) }}"></div>
                <div class="btn_main">
                    <form action="{{ route('addproducttocart',$product->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="submit" value="Buy Now" class="btn btn-warning ">
                    </form>
                    
                    <div class="seemore_bt btn btn-warning" style="margin-left:120px;"><a href="{{ route('singleproductpage',[$product->id,$product->slug]) }}">See More</a></div>
                </div>
            </div>
        </div>

        @endforeach
       
        </div>
    </div>
</div>
@endsection