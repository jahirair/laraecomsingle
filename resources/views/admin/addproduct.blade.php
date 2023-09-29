@extends('admin.layouts.template')

@section('page_title')
Add Product - Single Ecom
@endsection
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5> 
                </div>
                
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

                    <form action="{{ route('storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_name">Product Title</label>
                        <div class="col-sm-10">
                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_short_description">Product Short Description</label>
                        <div class="col-sm-10">
                        <textarea name="product_short_desc" id="product_short_description" cols="30" rows="5" class="form-control" placeholder="Product Short Descriptrion"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_long_description">Product Long Description</label>
                        <div class="col-sm-10">
                        <textarea name="product_long_desc" id="product_long_description" cols="30" rows="5" class="form-control" placeholder="Product Long Descriptrion"></textarea>
                        
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_price">Product Price</label>
                        <div class="col-sm-10">
                        <input type="text" name="price" class="form-control" id="product_price" placeholder="Product Price" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="category_name">Product Category Name</label>
                        <div class="col-sm-10">
                        <select class="form-select" name="category_id"id="category_name" aria-label="Default select example">
                            <option selected>Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="sub_category_name">Product Sub Category Name</label>
                        <div class="col-sm-10">
                        <select class="form-select" name="subcategory_id"id="sub_category_name" aria-label="Default select example">
                            <option selected>Select Sub Category</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="total_product">Product Count</label>
                        <div class="col-sm-10">
                        <input type="number" name="total_product" class="form-control" id="total_product" placeholder="Product Number" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="product_image">Product Image</label>
                        <div class="col-sm-10">
                        <input type="file" name="product_image" class="form-control" id="product_image" placeholder="Product Image" />
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            
    </div>
</div>
<!-- / Content -->

@endsection