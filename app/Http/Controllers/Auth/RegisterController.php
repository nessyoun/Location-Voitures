<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Client;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
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
        $client = new Client;
        $client->tel = $data['tel'];
        if ($data['permis']) {
            $mainImage = $data['permis'];
            $mainImageName = 'permis' . time() . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->storeAs('public/img', $mainImageName);
            $mainImageName = "/storage/img/". $mainImageName;
            $client->permis = $mainImageName;
        }

        $client->id_user = 0;
        $client->save();

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->role = '2';
        $user->client_id = $client->id;
        $user->save();
        $client->id_user = $user->id; 
        $client->save();
        return $user;
        
    }
}
