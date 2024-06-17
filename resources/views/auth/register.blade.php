<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required>
        </div>

        <div>
            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div>
            <label for="phone_no">Phone Number</label>
            <input id="phone_no" type="text" name="phone_no" value="{{ old('phone_no') }}" required>
        </div>

        <div>
            <label for="street">Street</label>
            <input id="street" type="text" name="street" value="{{ old('street') }}" required>
        </div>

        <div>
            <label for="city">City</label>
            <input id="city" type="text" name="city" value="{{ old('city') }}" required>
        </div>

        <div>
            <label for="district_id">District</label>
            <select id="district_id" name="district_id" required>
                @foreach(App\Models\District::all() as $district)
                    <option value="{{ $district->district_id }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>
</html>
