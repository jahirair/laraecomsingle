@extends('home.layouts.user_profile_template')

@section('page_title')
    User History Page - Single Ecom
@endsection
@section('userdetails')
    <!-- Content -->
    <div class="container">
        <div class="row">
            <h1>Completed Order Page</h1>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Ser No</th>
                            <th>User Name</th>
                            <th>Phone Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($complete_orders as $complete_order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $complete_order->user_name }}</td>
                                <td>{{ $complete_order->shipping_phone_number }}</td>
                                <td>{{ $complete_order->product_name }}</td>
                                <td>{{ $complete_order->quantity }}</td>
                                <td>$ {{ $complete_order->total_price }}</td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
