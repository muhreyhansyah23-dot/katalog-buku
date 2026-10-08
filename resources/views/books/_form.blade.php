<div>
    <label for="title">Judul</label>
    <input
        id="title"
        name="title"
        value="{{ old('title', $book->title ?? '') }}"
    >
    @error('title')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="isbn">ISBN</label>
    <input
        id="isbn"
        name="isbn"
        value="{{ old('isbn', $book->isbn ?? '') }}"
    >
    @error('isbn')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="author">Penulis</label>
    <input
        id="author"
        name="author"
        value="{{ old('author', $book->author ?? '') }}"
    >
    @error('author')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="publisher">Penerbit</label>
    <input
        id="publisher"
        name="publisher"
        value="{{ old('publisher', $book->publisher ?? '') }}"
    >
    @error('publisher')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="published_year">Tahun Terbit</label>
    <input
        id="published_year"
        name="published_year"
        type="number"
        min="1900"
        max="{{ date('Y') }}"
        value="{{ old('published_year', $book->published_year ?? '') }}"
    >
    @error('published_year')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="price">Harga</label>
    <input
        id="price"
        name="price"
        type="number"
        min="0"
        step="0.01"
        value="{{ old('price', $book->price ?? '') }}"
    >
    @error('price')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="stock">Stok</label>
    <input
        id="stock"
        name="stock"
        type="number"
        min="0"
        value="{{ old('stock', $book->stock ?? '') }}"
    >
    @error('stock')
        <small>{{ $message }}</small>
    @enderror
</div>

<div>
    <label for="description">Deskripsi</label>
    <textarea id="description" name="description">{{ old('description', $book->description ?? '') }}</textarea>
    @error('description')
        <small>{{ $message }}</small>
    @enderror
</div>

<button type="submit">Simpan</button>