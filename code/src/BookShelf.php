<?php

namespace App\Oop;

class BookShelf {
  private int $id;
  private array $books;

  public function getId(): int {
    return $this->id;
  }

  public function __construct(int $id) {
    $this->id = $id;
    $this->books = [];
  }

  public function addBook(PaperBook $book): void {
    $this->books[] = $book;
  }

  public function delBook(PaperBook $delBook): bool {
    foreach ($this->books as $index => $book) {
      if ($book === $delBook) {
        unset($this->books[$index]);
        return true;
      }
    }

    return false;
  }

  public function getBooks(): array {
    return $this->books;
  }
}