@extends('admin.layouts.template')

@section('page_title')
All Sub Category - Single Ecom
@endsection
@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
            
            
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Page/</span> All Sub Category</h4>
    <div class="card">
    <h5 class="card-header">Available Sub Category Information</h5>
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
            <th>Sub Category Id</th>
            <th>Sub Category Name</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th>Total Product</th>
            <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php
$i=1;
@endphp
        @foreach($allsubcat as $subcat)
            <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $subcat->id }}</td>
            <td>{{ $subcat->subcategory_name }}</td>
            <td>{{ $subcat->category_name }}</td>
            <td>{{ $subcat->slug  }}</td>
            <td>{{ $subcat->product_count  }}</td>
            <td>
                <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('editsubcategory',$subcat->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item" href="{{ route('deletsubecategory',$subcat->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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