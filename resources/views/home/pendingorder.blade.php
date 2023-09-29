@extends('home.layouts.user_profile_template')

@section('page_title')
    Pending Order Page - Single Ecom
@endsection
@section('userdetails')
    <!-- Content -->

    <div class="container">
        <div class="row">
            <h1>Pending Order Page</h1>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($pending_orders as $pending_order)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $pending_order->user_name }}</td>
                                <td>{{ $pending_order->shipping_phone_number }}</td>
                                <td>{{ $pending_order->product_name }}</td>
                                <td>{{ $pending_order->quantity }}</td>
                                <td>$ {{ $pending_order->total_price }}</td>
                                <td><a href="{{ route('cancelorder', $pending_order->id) }}" class="btn btn-danger">Cancel</a>
                                </td>
                            </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
