<?php

namespace App\Oop;

class BookShelf {
  private string $id;
  private array $books = [];

  public function __construct(string $id) {
    $this->id = $id;
  }

  public function getId(): string {
    return $this->id;
  }

  public function addBook(PaperBook $book): void {
    $this->books[] = $book;
  }

  public function takeBook($id): PaperBook|null {
    foreach ($this->books as $index => $book) {
      if ($book->getId() === $id) {
        unset($this->books[$index]);
        // Сбросим индексы массива чтобы не было дырок
        $this->books = array_values($this->books);
        return $book;
      }
    }

    return null;
  }

  public function getBooks(): array {
    return $this->books;
  }

  public function getBookById(int $id): PaperBook|null {
    foreach ($this->books as $index => $book) {
      if ($book->getId() === $id) {
        return $book;
      }
    }

    return null;
  }
}