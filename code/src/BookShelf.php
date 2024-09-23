<?php

namespace App\Oop;

class BookShelf {
  private int $id;
  private array $books;
  private string $bookcaseId;

  public function getId(): int {
    return $this->id;
  }

  public function __construct(int $id, string $bookcaseId) {
    $this->id = $id;
    $this->books = [];
    $this->bookcaseId = $bookcaseId;
  }

  public function getBookcaseId(): int {
    return $this->bookcaseId;
  }

  public function addBook(PaperBook $book): void {
    if (empty($book->getId())) {
      $book->setId(uniqid());
    }
    $this->books[$book->getId()] = $book;
    $book->setBookcaseId($this->bookcaseId);
    $book->setShelfId($this->id);
  }

  public function delBook(PaperBook $delBook): bool {
    if (array_key_exists($delBook->getId(), $this->books)) {
      unset($this->books[$delBook->getId()]);
      return true;
    }
    return false;
  }

  public function getBooksList(): array {
    return $this->books;
  }

  public function setBookcaseId(int $bookcaseId): void {
    $this->bookcaseId = $bookcaseId;
  }
}