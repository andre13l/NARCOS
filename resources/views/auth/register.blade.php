@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <label for="username">Username</label>
    <input id="username" type="text" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
    @if ($errors->has('username'))
      <span class="error">
          {{ $errors->first('username') }}
      </span>
    @endif

    <label for="email">E-Mail Address</label>
    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
    @if ($errors->has('email'))
      <span class="error">
          {{ $errors->first('email') }}
      </span>
    @endif

    <label for="password">Password</label>
    <input id="password" type="password" name="password" placeholder="Password" required>
    @if ($errors->has('password'))
      <span class="error">
          {{ $errors->first('password') }}
      </span>
    @endif

    <label for="password-confirm">Confirm Password</label>
    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required>

    <label for="date_of_birth">Date of birth</label>
    <input id="date_of_birth" type="text" name="date_of_birth" placeholder="Confirm Password" required>
    @if ($errors->has('date_of_birth'))
      <span class="error">
          {{ $errors->first('date_of_birth') }}
      </span>
    @endif

    <label for="avatar">Avatar</label>
    <input id="avatar" type="file" name="avatar" >
    
    <button type="submit">
      Register
    </button>
    <a class="button button-outline" href="{{ route('login') }}">Login</a>
</form>
@endsection
