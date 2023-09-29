@extends('admin.layouts.template')

@section('page_title')
Change Product Image - Single Ecom
@endsection
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Change Product Image</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Change Product Image</h5> 
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

                    <form action="{{ route('updateproductimage') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    

                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="total_product">Previous Image</label>
                        <div class="col-sm-10">
                        <img style="height:100px;"src="{{ url('public/'.$product->product_image) }}" alt="">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
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
                        <button type="submit" class="btn btn-primary">Update Product Image</button>
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