<?php

namespace App\Oop;

class BookCase {
  private string $id;
  private array $shelves;

  public function __construct($id, $numShelves) {
    $this->id = $id;
    $this->shelves = [];

    for ($i = 0; $i < $numShelves; $i++) {
      $this->shelves[] = new Bookshelf(count($this->shelves) + 1);
    }
  }

  public function getId(): string {
    return $this->id;
  }

  public function getShelvesCount(): int {
    return count($this->shelves);
  }

  public function getShelves(): array {
    return $this->shelves;
  }

  public function getShelfById(string $id): BookShelf|null {
    foreach ($this->shelves as $shelf) {
      if ($shelf->getId() === $id) {
        return $shelf;
      }
    }

    return null;
  }

  public function listBooks(): void {
    foreach ($this->shelves as $shelf) {
      $shelf->listBooks();
    }
  }
}