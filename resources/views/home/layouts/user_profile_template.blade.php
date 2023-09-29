@extends('home.layouts.template')

@section('page_title')
User Profile Page - Single Ecom
@endsection
@section('content')
<!-- Content -->


<div class="container">
    <h1 class="fashion_taital">User Profile Page</h1>
    <div class="fashion_section_2">
        <div class="row">
        <div class="col-lg-4 col-sm-4">
            <div class="box_main">
                <ul>
                    <li><a href="{{ route('userprofilepage') }}" class="btn btn-info">User Dashboard</a></li>
                    
                    <li><a href="{{ route('userpendingorder') }}" class="btn btn-info" style="margin-top:5px">Pending Orders</a></li>
                    <li><a href="{{ route('userhistory') }}" class="btn btn-info" style="margin-top:5px">History</a></li>
                    <li><a href="{{ url('/logout') }}" class="btn btn-info" style="margin-top:5px">Logout</a></li>
                </ul>
                
                
                
            </div>
        </div>
        <div class="col-lg-8 col-sm-8">
            <div class="box_main">
                @yield('userdetails')
            </div>
        </div>
        
        </div>
    </div>
</div>
@endsection