@extends('home.layouts.template')

@section('page_title')
Add Shipping Address - Single Ecom
@endsection
@section('content')
<!-- Content -->
        
<div class="container">
            
            
    <h4 class=""> Add Shipping Address</h4>

    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-lg-12 col-sm-12">
            <div class="box_main">
                
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

                    <form action="{{ route('storeshippingaddress') }}" method="POST">
                        @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="house_name">Address Line One</label>
                        <div class="col-sm-10">
                        <input type="text" name="house_name" class="form-control" id="house_name" placeholder="House Name" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="road_name">Address Line Two/ Road No.</label>
                        <div class="col-sm-10">
                        <input type="text" name="road_name" class="form-control" id="road_name" placeholder="Road Name" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="phone_no">Phone Number</label>
                        <div class="col-sm-10">
                        <input type="text" name="phone_no" class="form-control" id="phone_no" placeholder="Phone No" />
                        
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="district">District</label>
                        <div class="col-sm-10">
                        <input type="text" name="district" class="form-control" id="district" placeholder="District" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="country">Country</label>
                        <div class="col-sm-10">
                        <input type="text" name="country" class="form-control" id="country" placeholder="Country" />
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Add Now</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
            
    
<!-- / Content -->

@endsection