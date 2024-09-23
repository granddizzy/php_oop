<?php

namespace App\Oop;

class BookCase {
  private string $id;
  private array $shelves;

  private int $roomId;

  public function __construct(int $numShelves) {
    $this->id = uniqid();
    $this->shelves = [];

    for ($i = 0; $i < $numShelves; $i++) {
      $shelfId = count($this->shelves) + 1;
      $this->shelves[$shelfId] = new Bookshelf($shelfId, $this->id);
    }
  }

  public function getRoomId(): int {
    return $this->roomId;
  }

  public function setRoomId(int $roomId): void {
    $this->roomId = $roomId;
  }

  public function getId(): string {
    return $this->id;
  }

  public function setId(string $id): void {
    $this->id = $id;
    foreach ($this->shelves as $shelf) {
      $shelf->setBookcaseId($this->id);
    }
  }

  public function getShelves(): array {
    return $this->shelves;
  }

  public function getShelfById(int $id): BookShelf|null {
    if (array_key_exists($id, $this->shelves)) {
      return $this->shelves[$id];
    }

    return null;
  }

  public function getBookList(): array {
    $books = [];
    foreach ($this->shelves as $shelf) {
      array_merge($books, $shelf->getBookList());
    }

    return $books;
  }
}