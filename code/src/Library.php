<?php

namespace App\Oop;

class Library {
  private string $name;
  private string $address;
  private array $rooms;

  public function __construct($name, $address, $numRooms) {
    $this->name = "";
    $this->address = "";
    $this->rooms = [];

    for ($i = 0; $i < $numRooms; $i++) {
      $this->rooms[] = new Bookshelf(count($this->rooms) + 1);
    }
  }

  public function getName(): string {
    return $this->name;
  }

  public function getAddress(): string {
    return $this->address;
  }

  public function getRooms(): array {
    return $this->rooms;
  }

  public function getRoom($id): LibraryRoom|null {
    foreach ($this->rooms as $index => $room) {
      if ($room->getId() === $id) {
        return $room;
      }
    }

    return null;
  }

  public function listBooks(): void {
    foreach ($this->rooms as $room) {
      $room->listBooks();
    }
  }
}