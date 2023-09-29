@extends('admin.layouts.template')

@section('page_title')
Edit Sub Category - Single Ecom
@endsection
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Add Sub Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Sub Categroy</h5> 
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

                    <form action="{{ route('updatesubcategory') }}" method="POST">
                        @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="subcategory_name">Name</label>
                        <div class="col-sm-10">
                        <input type="text" name="subcategory_name" value="{{ $subcategory_info->subcategory_name }}"class="form-control" id="subcategory_name" placeholder="Sub Category" />
                        <input type="hidden" name="subcategory_id" value="{{ $subcategory_info->id }}"class="form-control" id="subcategory_name" placeholder="Sub Category Id" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="category_name">Category Name</label>
                        <div class="col-sm-10">
                        <select class="form-select" name="category_id"id="category_name" aria-label="Default select example">
                            <option value="{{ $subcategory_info->category_id }}">{{ $subcategory_info->category_name }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>                            
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Update</button>
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