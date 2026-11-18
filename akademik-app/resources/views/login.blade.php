@extends('layouts.app')
@section('judul', 'Login')
@section('isi')
<h2>Login</h2>
<form method="POST" action="/login">
    @csrf
    <p><label>Email<br><input type="email" name="email" value="{{ old('email') }}" required></label></p>
    <p><label>Password<br><input type="password" name="password" required></label></p>
    @error('email')<p class="error">{{ $message }}</p>@enderror
    <button type="submit">Masuk</button>
</form>
@endsection