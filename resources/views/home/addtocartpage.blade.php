@extends('home.layouts.template')

@section('page_title')
    Cart Page - Single Ecom
@endsection
@section('content')
    <!-- Content -->

    <div class="card-body">

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
        <h1 class="fashion_taital">Your Cart</h1>
        <div class="fashion_section_2">
            <div class="row">



                <div class="col-lg-12 col-sm-12">
                    <div class="box_main">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead class="table-light">
                                    <tr>
                                        <th>Ser No</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Id</th>
                                        <th>User Name</th>
                                        <th>User Id</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @php
                                        $i = 1;
                                        $grand_total = 0;
                                    @endphp
                                    @foreach ($cart_info as $cart)
                                        @php
                                            $grand_total = $grand_total + $cart->price;
                                        @endphp
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            @php
                                                $product_name = App\Models\Product::where('id', $cart->product_id)->value('product_name');
                                                $product_image = App\Models\Product::where('id', $cart->product_id)->value('product_image');
                                            @endphp
                                            <td>{{ $product_name }}</td>
                                            <td><img src="{{ asset('public/' . $product_image) }}" alt=""
                                                    style="height:100px"></td>
                                            <td>{{ $cart->product_id }}</td>
                                            <td>{{ Auth::user()->name }}</td>
                                            <td>{{ $cart->user_id }}</td>
                                            <td>$ {{ $cart->price }}</td>
                                            <td>{{ $cart->quantity }}</td>

                                            <td>


                                                <a class="btn btn-danger" href="{{ route('deletecart', $cart->id) }}"><i
                                                        class="bx bx-trash me-1"></i> Delete</a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td>$ {{ $grand_total }}</td>

                                        <td></td>
                                        @if ($grand_total <= 0)
                                            {
                                            <td><a href="" class="btn btn-success disabled">Checkout Now</a></td>
                                            }
                                        @else{
                                            <td><a href="{{ route('shippingaddress') }}" class="btn btn-success ">Checkout
                                                    Now</a></td>
                                            }
                                        @endif

                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>



@endsection
