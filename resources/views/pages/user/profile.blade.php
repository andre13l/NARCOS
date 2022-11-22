@extends('layouts.app')

@php
$guest = !Auth::check();
@endphp

<script type="text/javascript" src={{ asset('js/user.js') }}></script>

@section('title', "- User Profile")

{{-- ------------------------------------------------------------------------------------ --}}
@section('userInfo')
    <section id="userInfo">
        <div class="container-fluid py-3">
            <div class="row w-100 mt-4 mt-lg-5" id="userGraphics">
                <div class="col-5 col-lg-6 d-flex justify-content-center align-items-center h-100">
                    <img src="{{ isset($user['avatar']) ? asset('storage/avatars/' . $user['avatar']) : $userImgPHolder }}"
                        id="avatarImg" onerror="this.src='{{ $userImgPHolder }}'" alt="User Avatar" />

                </div>
                <div class="col-7 col-lg-6 d-flex flex-column align-items-center h-100">
                    <div id="areasOfExpertiseContainer" class="h-100">
                        @include('partials.user.areasOfExpertiseGraph', ['topAreasExpertise' => $topAreasExpertise ])
                    </div>
                </div>
            </div>
            <div class="row w-100 my-4 mt-lg-5">
                <div class="col-5 col-lg-6 d-flex justify-content-center align-items-center position-relative">
                    <h2 class="text-center my-0 py-0">{{ $user['name'] }}</h2>
                    @if ($user['isAdmin'])
                        <span id="adminBadge" class="badge rounded-pill ms-3 bg-custom">Admin</span>
                    @endif
                </div>
                <div class="col-7 col-lg-6 d-flex justify-content-center align-items-center">
                    @if ($isOwner)
                        <button type="button" class="btn transparentButton my-0 py-0 me-2 rounded-circle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Profile">
                            <a class="fa fa-pencil font-3x darkPurpleLink" href="/user/{{ $user['id'] }}/edit"></a>
                        </button>
                        <form method="GET" class="m-0 p-0 mx-0 mx-lg-3" action="{{ route('followedUsers', $user['id']) }}">
                            <button type="submit" class="btn btn-sm btn-primary my-0 py-0" >
                                Followed Users
                            </button>
                        </form>
                    @else
                        @if (!$guest)
                            @if ($follows)
                                <button type="button" class="btn btn-secondary px-lg-5 my-0 py-0 mx-3" id="followBtn"
                                    onclick="unfollowUser({{ $user['id'] }})">Unfollow</button>
                            @else
                                <button type="button" class="btn btn-primary px-lg-5 my-0 py-0 mx-3" id="followBtn"
                                    onclick="followUser({{ $user['id'] }})">Follow</button>
                            @endif
                        @endif
                    @endif

                    <i class="fa fa-users font-2x mx-3 text-primary"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Follower Count"></i>
                    <p class="h5 text-center py-0 my-0" id="followersCount">{{ $followerCount }}</p>
                </div>
            </div>
            <div class="row w-100 my-2">
                <div class="col-12 col-lg-6 d-flex flex-column align-items-center">
                    <div class="d-flex align-items-center my-3">
                        <i class="fa fa-birthday-cake me-3 fa-1x" onclick="console.log('cliked')"></i>
                        <h5 class="mb-0">{{ $birthDate . ' (' . $age . ')' }}</h5>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        &#{{ $user['country']['flag'][0] }}&#{{ $user['country']['flag'][1] }}
                        <h5 class="mb-0 ms-3">
                            {{ (is_null($user['city']) ? '' : $user['city'] . ', ') . $user['country']['name'] }}</h5>
                    </div>
                </div>
                <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center mt-2 mt-lg-0">
                    <div id="profileRepContainer">
                        @include('partials.user.reputationBar', ['user' => $user, 'isOwner' => $isOwner])
                    </div>
                </div>
            </div>
            <div class="mt-5" id="description">
                <h5>{{ $user['description'] }}</h5>
            </div>
        </div>
    </section>
@endsection

{{-- ------------------------------------------------------------------------------------ --}}

@section('articles')
    <section class="container-fluid w-100 d-flex flex-column align-items-center my-2 ">
        <div class="position-relative w-100 d-flex justify-content-center align-items-center mb-2 mb-lg-4" id="userArticles">
            <h2 class="border-bottom border-2 border-light text-center pb-2" id="articlesTitle">Articles</h2>
        </div>
        <div id="articles">
            @if ($articles->isEmpty()) 
                <div class="alert alert-secondary mb-0 text-center mb-5" role="alert">
                    <h3 class="my-3 text-white">User didn't post any Article</h3>
                </div>
            @endif
            @include('partials.content.articles', ['articles' => $articles])
        </div>
    </section>
@endsection

{{-- ------------------------------------------------------------------------------------ --}}

@section('load-more')
    <div id="load-more">

        <button onclick="loadMoreUser({{ Auth::id() }})">Load more</button>

    </div>
@endsection

{{-- ------------------------------------------------------------------------------------ --}}

@section('report')
    @include('partials.user.reportPopup', ['id' => $user['id']])
@endsection

{{-- ------------------------------------------------------------------------------------ --}}

@section('content')
    <div id="userProfileContainer" class="d-flex flex-column">
        @yield('userInfo')
        @yield('articles')
        @yield('report')

        @if ($canLoadMore)
            @yield('load-more')
        @endif
    </div>
@endsection
