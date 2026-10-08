@extends('layouts.app')

@section('title', 'Data Buku')

@section('content')
    <h1>Data Buku</h1>

    <div>
        <a href="{{ route('books.create') }}">Tambah Buku</a>
    </div>

    <form method="GET" action="{{ route('books.index') }}">
        <input
            type="search"
            name="q"
            value="{{ $keyword }}"
            placeholder="Cari judul, penulis, atau ISBN"
        >
        <button type="submit">Cari</button>
        <a href="{{ route('books.index') }}">Reset</a>
    </form>

    <table border="1" cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 15px;">
        <thead style="background: #f3f4f6; font-weight: bold;">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>ISBN</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td style="text-align: center">{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn ?: '-' }}</td>
                    <td>Rp {{ number_format((float) $book->price, 0, ',', '.') }}</td>
                    <td style="text-align: center">{{ $book->stock }}</td>
                    <td style="text-align: center">
                        <a href="{{ route('books.show', $book) }}">Detail</a>
                        |
                        <a href="{{ route('books.edit', $book) }}">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', $book) }}" style="display:inline" onsubmit="return confirm('Hapus data buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center">Data belum tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection