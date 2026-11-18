<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>@yield('judul') - Akademik App</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f5f5; }
        nav { background: #c8102e; padding: 12px 24px; display: flex; gap: 16px; align-items: center; }
        nav a { color: #fff; text-decoration: none; }
        nav form { margin-left: auto; }
        main { max-width: 800px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 8px; }
        .error { color: #c00; }
    </style>
</head>
<body>
@auth
<nav>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="/materi">Materi</a>
    @if (in_array(auth()->user()->role, ['admin', 'dosen']))
        <a href="/kelola-materi">Kelola Materi</a>
        <a href="/kelola-nilai">Kelola Nilai</a>
    @endif
    @if (in_array(auth()->user()->role, ['admin', 'mahasiswa']))
        <a href="/nilai-saya">Nilai Saya</a>
    @endif
    @if (auth()->user()->role === 'admin')
        <a href="/pengguna">Pengguna</a>
    @endif
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>
@endauth
<main>@yield('isi')</main>
</body>
</html>