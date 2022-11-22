@extends('layouts.app')

@section('title', "- Admin Panel")
   
@section('content')

<div class="py-5 container">
    <div class="d-flex flex-row row w-100 m-0">
        
        <a href="{{ url('/admin/suspensions') }}" class="text-secondary col-12 col-lg-4 my-3 adminPanelCard">
            <div class="d-flex flex-column manageContainer border bg-light h-100">
                <div class="linkContainer w-100">
                    <div class="iconContainer shadow-lg rounded-circle bg-dark">
                        <i class="fas fa-users-slash suspensionsIcon text-light"></i>
                    </div>
                </div>
                <div class="manageLink">
                    <h3>Manage Users Suspension</h3>
                </div>
            </div>
        </a>
        
        <a class="text-secondary col-12 col-lg-4 my-3 adminPanelCard" href="{{ url('/admin/reports') }}">
            <div class="d-flex flex-column manageContainer border bg-light h-100">
                <div class="linkContainer w-100">
                    <div class="iconContainer shadow-lg rounded-circle bg-dark">
                        <i class="fas fa-ban reportsIcon text-light"></i>
                    </div>
                </div>
                <div class="manageLink">
                    <h3>Manage Reports</h3>
                </div>
            </div>
        </a>
        
        <a class="text-secondary col-12 col-lg-4 my-3 adminPanelCard" href="{{ url('/admin/Topics') }}">
            <div class="d-flex flex-column manageContainer border bg-light h-100">
                <div class="linkContainer">
                    <div class="iconContainer shadow-lg rounded-circle bg-dark">
                        <i class="TopicsIcon fas fa-Topics text-light"></i>
                    </div>
                </div>
                <div class="manageLink">
                    <h3>Manage Topics</h3>
                </div>
            </div>
        </a>
    </div>
</div>


@endsection
