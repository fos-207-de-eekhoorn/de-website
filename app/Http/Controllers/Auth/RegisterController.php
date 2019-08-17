<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
    protected $redirectTo = '/home';

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
            'voornaam' => 'required|string|max:255',
            'achternaam' => 'required|string|max:255',
            'totem' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefoon' => 'string|max:255',
            'foto' => 'required|string|max:255',
            'is_el' => 'boolean',
            'is_ael' => 'boolean',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Leider::create([
            'voornaam' => $data['voornaam'],
            'achternaam' => $data['achternaam'],
            'totem' => $data['totem'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telefoon' => $data['telefoon'],
            'foto' => $data['foto'],
            'is_el' => $data['is_el'],
            'is_ael' => $data['is_ael'],
        ]);
    }
}
