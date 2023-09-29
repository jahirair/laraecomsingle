@extends('home.layouts.template')

@section('page_title')
Category Page - Single Ecom
@endsection
@section('content')
<!-- Content -->


<div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">{{ $category_info->category_name;}} - ({{ $category_info->product_count;}})</h1>
                     <div class="fashion_section_2">
                        <div class="row">

                           @foreach ($products as $product )
                              <div class="col-lg-4 col-sm-4">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                 <div class="tshirt_img"><img src="{{url('public/'.$product->product_image)}}"></div>
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
               </div>
               
            </div>
            
         </div>
      </div>
@endsection