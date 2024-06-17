<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->createUser($request->all());
        $client = $this->createClient($request->all(), $user->user_id);

        auth()->login($user);

        return redirect()->route('profile.show', ['user' => $user->user_id]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_no' => ['required', 'string', 'max:15'],
            'street' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'district_id' => ['required', 'integer'],
        ]);
    }

    protected function createUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_no' => $data['phone_no'],
        ]);
    }

    protected function createClient(array $data, $userId)
    {
        return Client::create([
            'user_id' => $userId,
            'street' => $data['street'],
            'city' => $data['city'],
            'district_id' => $data['district_id'],
        ]);
    }
}
