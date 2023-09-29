@extends('home.layouts.template')

@section('page_title')
    Checkout Page - Single Ecom
@endsection
@section('content')
    <!-- Content -->
    <h1>Checkout Page</h1>

    <div class="container">
        <h1 class="fashion_taital">Check Out Page</h1>
        <div class="fashion_section_2">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="box_main">

                        <h1>Your Shipping Address is</h1>

                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Ser No</th>
                                    <th>Village</th>
                                    <th>Post</th>
                                    <th>District</th>
                                    <th>Country</th>
                                    <th>Phone</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $i = 1;
                                    $grand_total = 0;
                                @endphp


                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $shipping_info->house_name }}</td>
                                    <td>{{ $shipping_info->road_name }}</td>
                                    <td>{{ $shipping_info->district }}</td>
                                    <td>{{ $shipping_info->country }}</td>
                                    <td>{{ $shipping_info->phone_no }}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="box_main">

                        <h1>Your Products</h1>
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Ser No</th>
                                    <th>Product Name</th>
                                    <th>Image</th>

                                    <th>Price</th>
                                    <th>Quantity</th>

                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $i = 1;
                                    $grand_total = 0;
                                @endphp
                                @foreach ($cart_info as $cart_info)
                                    <tr>
                                        @php
                                            $product_name = App\Models\Product::where('id', $cart_info->product_id)->value('product_name');
                                            $product_image = App\Models\Product::where('id', $cart_info->product_id)->value('product_image');
                                        @endphp
                                        @php
                                            $grand_total = $grand_total + $cart_info->price;
                                        @endphp
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product_name }}</td>
                                        <td><img src="{{ asset('public/' . $product_image) }}" alt=""
                                                style="height:100px"></td>
                                        <td>$ {{ $cart_info->price }}</td>
                                        <td>{{ $cart_info->quantity }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>$ {{ $grand_total }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <form action="{{ route('storeorder') }}" method="post" style="margin-right:20px;">
                    @csrf
                    <input type="submit" value="Place Order" class="btn btn-success">
                </form>
                <form action="{{ route('storeorder') }}" method="post">
                    @csrf
                    <input type="submit" value="Cancel Order" class="btn btn-danger">
                </form>


            </div>
        </div>
    </div>
@endsection
