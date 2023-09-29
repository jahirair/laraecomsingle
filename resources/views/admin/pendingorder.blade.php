@extends('admin.layouts.template')

@section('page_title')
    Pending Orders - Single Ecom
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Pending Order Page</h5>
                    </div>
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
                                        <td>{{ $pending_order->total_price }}</td>
                                        <td><a href="{{ route('completestatus', $pending_order->id) }}"
                                                class="btn btn-success">Complete Order</a></td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
