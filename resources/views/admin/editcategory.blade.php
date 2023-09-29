@extends('admin.layouts.template')

@section('page_title')
Edit Category - Single Ecom
@endsection
@section('content')
<!-- Content -->
        
<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> Edit Category</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Categroy</h5> 
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



                    <form action="{{route('updatecategory')}}" method="post">
                        @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="category_name">Category Name</label>
                        <div class="col-sm-10">
                        <input type="hidden" name="category_id" value="{{$category_info->id}}">
                        <input type="text" name="category_name"class="form-control" id="category_name" placeholder="Category Name" value="{{$category_info->category_name}}" />
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