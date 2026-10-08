<?php

use App\Models\Book;

it('can create a book', function () {
    $payload = [
        'title' => 'Pemrograman Laravel 13',
        'isbn' => '9781234567890',
        'author' => 'Penulis Contoh',
        'publisher' => 'Penerbit Kampus',
        'published_year' => 2026,
        'price' => 125000,
        'stock' => 10,
        'description' => 'Deskripsi buku.',
    ];

    $response = $this->post(route('books.store'), $payload);

    $response->assertRedirect(route('books.index'));
    $this->assertDatabaseHas('books', [
        'isbn' => '9781234567890',
    ]);
});

it('displays books in a table', function () {
    $book = Book::factory()->create([
        'title' => 'Belajar Laravel',
        'author' => 'Budi Santoso',
        'stock' => 7,
    ]);

    $response = $this->get(route('books.index'));

    $response->assertOk();
    $response->assertSee('Data Buku');
    $response->assertSee('Judul');
    $response->assertSee('Penulis');
    $response->assertSee('Stok');
    $response->assertSee($book->title);
    $response->assertSee(route('books.create'));
});

it('displays all books without pagination', function () {
    $books = Book::factory()->count(11)->create();

    $response = $this->get(route('books.index'));

    $response->assertOk();
    foreach ($books as $book) {
        $response->assertSee($book->title);
    }
    $response->assertDontSee('Halaman');
});

it('displays books alphabetically by title', function () {
    Book::factory()->create(['title' => 'Zebra']);
    Book::factory()->create(['title' => 'Angkasa']);
    Book::factory()->create(['title' => 'Mentari']);

    $response = $this->get(route('books.index'));

    $response->assertOk();
    $response->assertSeeInOrder(['Angkasa', 'Mentari', 'Zebra']);
});

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});
