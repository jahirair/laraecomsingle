@extends('admin.layouts.template')

@section('page_title')
All Product - Single Ecom
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Product</h4>
    <div class="card">
    <h5 class="card-header">Available Product Information</h5>
    <div class="card-body">
                    @if(session()->has('message'))
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
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Image</th>
            <th>Product Quantity</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php
                $i=1;
            @endphp
            
            @foreach($products as $product)
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_name }}</td>
            <td><img style="height:100px;"src="{{ url('public/'.$product->product_image) }}" alt="">
                <br>
                <a href="{{ route('editproductimage',$product->id) }}" class="btn btn-primary">Change Image</a>
            
            </td>
            <td>{{ $product->total_product }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('editproduct', $product->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="{{ route('deleteproduct',$product->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
                </div>
            </td>
            </tr>
         @endforeach  
        </tbody>
        </table>
    </div>
    </div>
</div>


@endsection