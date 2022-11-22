@extends('layouts.app')

@section('scripts')
    <script type="text/javascript" src={{ asset('js/user.js') }}></script>
@endsection

@section('title', "- Followed Users")

@section('content')

    <section id="users" class="container">
        @include('partials.user.list', ['users' => $users])
    </section>

@endsection
