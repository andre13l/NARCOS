<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:authenticated_user',
            'password' => 'required|string|min:6|confirmed',
            'date_of_birth' => 'required|string|date_format:Y-m-d|before_or_equal:'.date('Y-m-d', strtotime('-13 years')),
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        ],['before_or_equal' => 'You must be at least 12 years old']);
    }

    protected function create(array $data) {

        $timestamp = strtotime($data['date_of_birth']);

        if(isset($data['avatar'])) {
            $avatar = $data['avatar'];
            $imgName = round(microtime(true)*1000).'.'.$avatar->extension();
            $avatar->storeAs('public/avatars', $imgName);
        }

        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'date_of_birth' => gmdate('Y-m-d H:i:s', $timestamp),
            'avatar' => isset($data['avatar']) ? $imgName : null,
        ]);
    }
}
