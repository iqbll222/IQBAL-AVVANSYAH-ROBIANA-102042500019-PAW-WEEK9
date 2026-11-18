@extends('layouts.app')
@section('judul', $judul)
@section('isi')
<h2>{{ $judul }}</h2>
<p>Anda login sebagai <b>{{ auth()->user()->name }}</b> (role: <b>{{ auth()->user()->role }}</b>).</p>
@endsection