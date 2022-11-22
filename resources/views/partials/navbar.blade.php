<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbarContainer">
        <div class="container-fluid py-4">
            <a id="logo" class="navbar-brand text-center w-25" href="{{ url('/') }}">Newtify</a>
            
            <div class="d-flex d-lg-none justify-content-end align-items-center position-relative flex-grow-1">
                @if (Auth::check())
                    <a id="createArticleIcon" class="nav-item mx-3" href="{{ route('createArticle') }}">
                        <i class="purpleLink fas fa-plus-circle fa-2x"></i>
                    </a>
                    <div class="nav-item mx-3 position-relative">
                        <i class="fas fa-bell notification-bell" onclick="fetchNotifications()"
                        type="button" data-bs-toggle="collapse" data-bs-target="#notificationPanelMobile"
                        aria-expanded="false" aria-controls="notificationPanelMobile"></i>

                        @if ($newNotifications)
                            <div id="newNotificationsCircleMobile"
                                class="border border-4 border-warning rounded-circle position-absolute start-100"></div>
                        @endif
                    </div>

                    <div id="notificationPanelMobile"
                        class="collapse container-md position-absolute bg-dark border border-light mt-2 p-0 top-100">
                        <div class="text-center">Loading...</div>
                    </div>

                    <div id="dropdownContainer" class="nav-item dropdown ms-3 me-4">
                        <img id="dropdownAvatar" class="nav-link px-0 dropdown-toggle py-0" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" alt="Your Avatar"
                            src={{ isset(Auth::user()->avatar) ? asset('storage/avatars/' . Auth::user()->avatar) : $userImgPHolder }}
                            onerror="this.src='{{ $userImgPHolder }}'" />

                        <ul id="mainDropdown" class="dropdown-menu dropdown-menu-dark text-center"
                            aria-labelledby="dropdownAvatar">
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item dropdown-custom-item"
                                        href="{{ route('admin') }}">Admin Panel
                                    </a></li>
                            @endif

                            <a class="dropdown-item dropdown-custom-item"
                                href="{{ url('/user/' . Auth::id()) }}">My
                                Profile</a>
                            <br>
                            <li class="col text-center">
                                <a class="btn btn-lightPurple btn-lg py-2 px-4" href="{{ route('logout') }}"> Logout </a>
                            </li>

                        </ul>
                    </div>
                @else
                    <div class="nav-item">
                        <a href={{ route('login') }} class="button my-0 px-3 me-3">Login</a>
                        <a href={{ route('signup') }} class="button my-0 px-3 me-3 button-secondary">Signup</a>
                    </div>
                @endif
            </div>

            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-75" id="navbarSupportedContent">
                <form id="searchForm" class="d-flex flex-row align-items-center border"
                    action="{{ route('search') }}">
                    <i class="fas fa-search ms-4 submit" type="submit"></i>
                    <input class="form-control no-border flex-grow-1 my-0 ms-3 bg-dark" type="search"
                        placeholder="Search" name="query" autocomplete="off" value="{{ old('query') }}" />
                    <input type="hidden" name="type" value="{{ old('type') ? old('type') : 'articles' }}" />

                    <div class="dropdown" id="searchDropdown">
                        <button id="searchDropdownButton"
                            class="btn btn-outline-light border-start dropdown-toggle my-0 pe-0" type="button"
                            data-bs-toggle="dropdown">{{ old('type') == 'users' ? 'Users' : 'Articles' }}</button>

                        <ul class="dropdown-menu dropdown-menu-dark w-100 text-center"
                            aria-labelledby="searchDropdownButton">
                            <li><a class="dropdown-item dropdown-custom-item" onclick="setSearchType(this)">Articles</a>
                            </li>
                            <li><a class="dropdown-item dropdown-custom-item" onclick="setSearchType(this)">Users</a>
                            </li>
                        </ul>
                    </div>
                </form>

                <div class="d-none d-lg-flex justify-content-end align-items-center position-relative" id="userSectionNav">
                    @if (Auth::check())
                        <label data-bs-toggle="tooltip" data-bs-placement="bottom" title="Create an Article"
                        for="createArticleIcon">
                            <a id="createArticleIcon" class="nav-item mx-4" href="{{ route('createArticle') }}">
                                <i class="purpleLink fas fa-plus-circle fa-3x"></i>
                            </a>
                        </label>
                        <div class="nav-item mx-5 position-relative">
                            <i class="fas fa-bell notification-bell" onclick="fetchNotifications()"
                            type="button" data-bs-toggle="collapse" data-bs-target="#notificationPanel"
                            aria-expanded="false" aria-controls="notificationPanel"></i>

                            @if ($newNotifications)
                                <div id="newNotificationsCircle"
                                    class="border border-4 border-warning rounded-circle position-absolute start-100"></div>
                            @endif
                        </div>

                        <div id="notificationPanel"
                            class="collapse container-md position-absolute bg-dark border border-light mt-2 p-0 top-100">
                            <div class="text-center">Loading...</div>
                        </div>

                        <div id="dropdownContainer" class="nav-item dropdown ms-5">
                            <label data-bs-toggle="dropdown" for="dropdownAvatar">
                            <img id="dropdownAvatar" class="nav-link px-0 dropdown-toggle py-0" role="button"
                                alt="Your Avatar"
                                data-bs-toggle="tooltip" aria-expanded="false" data-bs-placement="bottom" title="{{Auth::user()->name}}"
                                src={{ isset(Auth::user()->avatar) ? asset('storage/avatars/' . Auth::user()->avatar) : $userImgPHolder }}
                                onerror="this.src='{{ $userImgPHolder }}'"/>
                            </label>

                            <ul id="mainDropdown" class="dropdown-menu dropdown-menu-dark text-center"
                                aria-labelledby="dropdownAvatar">
                                @if (Auth::user()->is_admin)
                                    <li><a class="dropdown-item dropdown-custom-item"
                                            href="{{ route('admin') }}">Admin Panel
                                        </a></li>
                                @endif

                                <a class="dropdown-item dropdown-custom-item"
                                    href="{{ url('/user/' . Auth::id()) }}">My
                                    Profile</a>
                                <br>
                                <li class="col text-center">
                                    <a class="btn btn-lightPurple btn-lg py-2 px-4" href="{{ route('logout') }}"> Logout </a>
                                </li>

                            </ul>
                        </div>
                    @else
                        <div class="nav-item me-5">
                            <a href={{ route('login') }} class="button ms-5 mt-2">Login</a>
                            <a href={{ route('signup') }} class="button button-secondary mx-4 mt-2">Sign Up</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
