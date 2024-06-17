<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function show()
    {
        $client = Auth::user()->client;
        return view('profile.show', compact('client'));
    }

    public function edit()
    {
        $client = Auth::user()->client;
        return view('profile.edit', compact('client'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|min:8|confirmed',
            'phone_no' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'district_id' => 'required|integer',
        ]);

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->phone_no = $request->phone_no;

        $client = $user->client;
        $client->street = $request->street;
        $client->city = $request->city;
        $client->district_id = $request->district_id;
        $client->save();

        return redirect()->route('profile.show')->with('status', 'Profile updated successfully!');
    }

    public function destroy()
    {
        $user = Auth::user();

        // Deleting the client record
        $client = $user->client;
        if ($client) {
            $client->delete();
        }

        return redirect('/')->with('status', 'Profile deleted successfully!');
    }
}

