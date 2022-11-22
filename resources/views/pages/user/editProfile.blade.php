@extends('layouts.app')

@php
$isOpen = $errors->has('password');
@endphp

@section('title', "- Edit Profile")

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script type="text/javascript" src={{ asset('js/daterangepicker.js') }}></script>
    <script type="text/javascript" src={{ asset('js/user.js') }}></script>
    <script type="text/javascript" src=" {{ asset('js/select2tags.js') }}"> </script>
@endsection

@section('content')
    <section id="editProfileContainer">
        <form name="profileForm" method="POST" enctype="multipart/form-data"
            action="{{ route('editProfile', ['id' => $user['id']]) }}" class="container-fluid py-3" id="editProfileForm">
            @method('put')
            @csrf

            <div class="row w-100 " id="editAvatarContainer">
                <label class="h2 py-0 my-0">Avatar</label>
                <div id="avatarPreviewContainer" class="d-flex align-items-center">
                    <img src={{ isset($user['avatar']) ? asset('storage/avatars/' . $user['avatar']) : $userImgPHolder }}
                        id="avatarPreview" onerror="this.src='{{ $userImgPHolder }}'" alt="Avatar Preview"/>
                    <input type="file" accept="image/*" id="imgInput" name='avatar' />
                    @if ($errors->has('avatar'))
                        <div class="w-50 py-1 text-danger ">
                            <p class="">{{ $errors->first('avatar') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row w-100 mt-3">
                <div class="col-12 col-lg-8">
                    <div class="row w-100">
                        <div class="col-6">
                            <label class="h2 pb-3 my-0" for="nameInput">Username</label>
                            <input type="text" required value="{{ old('name') ? old('name') : $user['name'] }}"
                                class="h3 editInputs w-75" id="nameInput" name='name' />
                            @if ($errors->has('name'))
                                <div class="w-50 py-1 text-danger ">
                                    <p class="">{{ $errors->first('name') }}</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-6">
                            <label class="h2 pb-3 my-0" for="birthDateInput">Birth Date</label>
                            <input name="birthDatePicker" class="h3 editInputs py-4 px-2 px-lg-3" type="text" placeholder="Enter Birthdate" required
                                value="{{ old('birthDate') ? old('birthDate') : $birthDate }}">
                            <input name="birthDate" type="hidden" value="{{ old('birthDate') }}" id="birthDateInput">
                            @if ($errors->has('birthDate'))
                                <div class="text-danger w-100 py-1">
                                    <p class="">{{ $errors->first('birthDate') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row w-100 mt-4">
                        <div class="col-6">
                            <label class="h2 pb-3 my-0" for="countryInput">Country</label>
                            <div class="d-flex position-relative align-items-center h2 editInputs" id='countryInputContainer'>
                                <select required name='country'
                                    value="{{ old('country') ? old('country') : $user['country']['name'] }}"
                                    id="countryInput" size=1 class="my-0 border-0 h3">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country['name'] }}" @if (old('country') ? old('country') == $country['name'] : $user['country']['id'] == $country['id'])
                                            selected
                                    @endif>
                                    {{ $country['name'] }}
                                    </option>
                                    @endforeach
                                </select>
                                <i class="fa fa-caret-down fa-1x position-absolute caretDown"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <label class="h2 pb-3 my-0" for="cityInput">City</label>
                            <input type="text" value="{{ old('city') ? old('city') : $user['city'] }}"
                                class="h3 editInputs" id="cityInput" name='city' />

                        </div>
                        @if ($errors->has('country'))
                            <div class="text-danger w-50 py-1">
                                <p class="">{{ $errors->first('country') }}</p>
                            </div>
                        @endif
                        @if ($errors->has('city'))
                            <div class="text-danger w-50 py-1">
                                <p class="">{{ $errors->first('city') }}</p>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                    <label class="h2 mb-3" for="tagsInput">Favorite Tags</label>

                    <select id="favoriteTags" name="favoriteTags[]" multiple>
                        @foreach ($tags as $tag)
                            <option class="m-0" @if (old('favoriteTags') ? in_array($tag['id'], old('favoriteTags')) : $favoriteTags->contains('id', $tag['id']))
                                selected
                        @endif
                        value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('favoriteTags'))
                        <div class="alert alert-danger mt-2 mb-0 p-0 w-50 text-center" role="alert">
                            <p class="mb-0">{{ $errors->first('favoriteTags') }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row w-100 mt-4">
                <label class="h2 pb-3 my-0" for="descriptionInput">Description</label>
                <textarea id="descriptionInput" name="description" rows="6"
                    class="h-100 editInputs py-2">{{ old('description') ? old('description') : $user['description'] }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger w-50 py-1">
                        <p class="">{{ $errors->first('description') }}</p>
                    </div>
                @endif
            </div>

            <div class="row w-100 mt-2 d-flex justify-content-center">
                <button type="submit" class="w-auto text-center px-5 btn-primary">Edit Profile</button>
            </div>
        </form>

        <div class="container-fluid py-3 w-75 mt-5 pt-5 border-top border-light">
            <div class="d-flex position-relative mb-3">
                <a class="h1 w-100 text-darkPurple" href="#advancedContainer" data-bs-toggle="collapse" role="button"
                    aria-expanded="false" aria-contols="advancedContainer">Advanced
                    Settings</a>
                <i class="fa fa-caret-down fa-1x position-absolute pe-none caretDown"></i>
            </div>

            <div <?php if ($isOpen) { echo 'class="colapse show"'; } else { echo 'class="collapse"'; } ?> id="advancedContainer">
                <form name="passForm" method="POST" action="{{ route('editProfile', ['id' => $user['id']]) }}">
                    @method('put')
                    @csrf
                    @if ($errors->has('password'))
                        <div class="w-50 py-1 text-danger">
                            <p class="">Invalid Password</p>
                        </div>
                    @endif
                    <label for="currPassInput" class="form-label mt-4">Change Password</label>
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="me-5">
                            <div class="form-text">Current Password</div>
                            <input type="password" required class="w-auto h4 editInputs" id="currPassInput" name='password'
                                placeholder="Current Password" />
                        </div>
                        <div class="me-5">
                            <div class="form-text">New Password</div>
                            <input type="password" required class="w-auto h4 editInputs" id="newPassInput"
                                name='new_password' placeholder="New Password" onkeyup="checkPass('#newPassInput')" />
                        </div>
                        <div class="me-5">
                            <div class="form-text">Confirm Password</div>
                            <input type="password" required name="new_password_confirmation" class="w-auto h4 editInputs"
                                id="newPassInput-confirm" placeholder="Confirm Password"
                                onkeyup="checkPass('#newPassInput')">
                            <span class="ms-2" id="matchingPass"></span>
                        </div>
                        <button class="mb-4 btn btn-primary px-5" type="submit">Change</button>
                    </div>
                    @if ($errors->has('new_password'))
                        <div class="w-50 py-1 text-danger ">
                            <p class="">{{ $errors->first('new_password') }}</p>
                        </div>
                    @endif
                </form>

                <form name="emailForm" method="POST" action="{{ route('editProfile', ['id' => $user['id']]) }}"
                    class="mt-3" autocomplete="off">
                    @method('put')
                    @csrf
                    <label for="emailPassInput" class="form-label mt-4">Change Email</label>
                    <div class="d-flex align-items-end flex-wrap">
                        <div class="me-5">
                            <div class="form-text">Current Password</div>
                            <input type="password" autocomplete="new-password" required class="w-auto h4 editInputs"
                                id="emailPassInput" name='password' placeholder="Current Password" />
                        </div>
                        <div class="me-5">
                            <div class="form-text">New Email</div>
                            <input type="email" required class="w-auto h4 editInputs" id="emailInput" name='email'
                                placeholder="New Email" value="{{ old('email') }}" />
                        </div>
                        <button class="mb-4 btn btn-primary px-5" type="submit">Change</button>
                    </div>
                    @if ($errors->has('email'))
                        <div class="w-50 py-1 text-danger ">
                            <p class="">{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                </form>

                <form name="deleteForm" method="POST" action="{{ route('deleteUser', ['id' => $user['id']]) }}"
                    class="mt-3" autocomplete="off">
                    @method('delete')
                    @csrf
                    <label for="delPassInput" class="form-label mt-4">Delete Account</label>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="me-5">
                            <div class="form-text">Current Password</div>
                            <input type="password" autocomplete="new-password" required class="w-auto h4 editInputs"
                                id="delPassInput" name='password' placeholder="Current Password" />
                        </div>
                        <div class="mt-5">
                            <button id="delAccButton" class="btn btn-danger px-5" type="button"
                                onclick="confirmAction('#delAccButton', () => document.deleteForm.submit())" 
                            >
                                Delete Account
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
