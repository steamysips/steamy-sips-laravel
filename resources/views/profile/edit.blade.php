<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <h1>Edit Profile</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div>
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" name="first_name" value="{{ Auth::user()->first_name }}" required>
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" name="last_name" value="{{ Auth::user()->last_name }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation">
        </div>

        <div>
            <label for="phone_no">Phone Number</label>
            <input id="phone_no" type="text" name="phone_no" value="{{ Auth::user()->phone_no }}" required>
        </div>

        <div>
            <label for="street">Street</label>
            <input id="street" type="text" name="street" value="{{ $client->street }}" required>
        </div>

        <div>
            <label for="city">City</label>
            <input id="city" type="text" name="city" value="{{ $client->city }}" required>
        </div>

        <div>
            <label for="district_id">District</label>
            <select id="district_id" name="district_id" required>
                @foreach(App\Models\District::all() as $district)
                    <option value="{{ $district->district_id }}" @if($district->district_id == $client->district_id) selected @endif>{{ $district->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Save Changes</button>
        </div>
    </form>
</body>
</html>
