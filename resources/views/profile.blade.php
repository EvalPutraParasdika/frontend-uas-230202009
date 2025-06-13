<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat datang, {{ $user['username'] }}</h1>
    <p>Email: {{ $user['email'] ?? 'Tidak tersedia' }}</p>

    <a href="{{ route('logout') }}">Logout</a>
</body>
</html>
