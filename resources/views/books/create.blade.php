@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku</h1>
    <a href="{{ route('books.index') }}">Kembali</a>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        @include('books._form', ['book' => new \App\Models\Book()])
    </form>
@endsection