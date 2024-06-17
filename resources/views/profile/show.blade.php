<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>

    <p>First Name: {{ Auth::user()->first_name }}</p>
    <p>Last Name: {{ Auth::user()->last_name }}</p>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>Phone Number: {{ Auth::user()->phone_no }}</p>
    <p>Street: {{ $client->street }}</p>
    <p>City: {{ $client->city }}</p>
    <p>District: {{ $client->district->name }}</p>

    <a href="{{ route('profile.edit') }}">Edit Profile</a>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Profile</button>
    </form>
</body>
</html>
