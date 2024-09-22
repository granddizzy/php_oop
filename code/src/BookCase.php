<?php

namespace App\Oop;

class BookCase {
  private int $id;
  private array $shelves;

  public function __construct(int $id, int $numShelves) {
    $this->id = $id;
    $this->shelves = [];

    for ($i = 0; $i < $numShelves; $i++) {
      $this->shelves[] = new Bookshelf(count($this->shelves) + 1);
    }
  }

  public function getId(): int {
    return $this->id;
  }

  public function getShelves(): array {
    return $this->shelves;
  }

  public function getShelfById(int $id): BookShelf|null {
    foreach ($this->shelves as $shelf) {
      if ($shelf->getId() === $id) {
        return $shelf;
      }
    }

    return null;
  }
}