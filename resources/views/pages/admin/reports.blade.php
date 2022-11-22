@extends('layouts.app')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/suspensions.js') }}"></script>
    <script type="text/javascript" src={{ asset('js/daterangepicker.js') }}></script>
    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
@endsection

@section('title', "- Reports")

@section('users')

<div class="text-center container-fluid">
    <h1 class="text-center my-5">User Reports</h1>

    <div class="row mb-5">     

        <div class="accordion my-2 col-12 col-lg-6" id="accordionElement">
            <div class="border reportsContainer m-5">
                <h2 class="text-center bg-dark m-0 py-5">Open</h2>
                @foreach ($reports as $report)
                    @if ($report['is_closed'] == 0)
                        @include('partials.admin.reports')
                    @endif
                @endforeach
            </div>
        </div>

        <div class="accordion my-2 col-12 col-lg-6" id="accordionElement">
            <div class="border reportsContainer m-5">
                <h2 class="text-center bg-dark m-0 py-5">Closed</h2>
                @foreach ($reports as $report)
                    @if ($report['is_closed'] == 1)
                        @include('partials.admin.reports')
                    @endif
                @endforeach
            </div>
        </div>   
    </div>

</div>

@endsection

@section('report')
    @include('partials.admin.suspendUserPopup')
@endsection

@section('content')
    @yield('users')
    @yield('report')
@endsection