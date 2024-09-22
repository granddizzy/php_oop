<?php

namespace App\Oop;

class Library {
  private string $name;
  private string $address;
  private array $rooms;
  private array $checkedOutBooks;

  public function __construct(string $name, string $address, int $numRooms) {
    $this->name = $name;
    $this->address = $address;
    $this->rooms = [];

    for ($i = 0; $i < $numRooms; $i++) {
      $this->rooms[] = new LibraryRoom(count($this->rooms) + 1);
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

  public function getRoomById(int $id): LibraryRoom|null {
    foreach ($this->rooms as $room) {
      if ($room->getId() === $id) {
        return $room;
      }
    }

    return null;
  }

  public function showBooks(): void {
    foreach ($this->rooms as $room) {
      echo "Комната: " . $room->getId() . " " . $room->getName() . PHP_EOL;

      foreach ($room->getBookcases() as $bookcase) {
        echo "Шкаф: " . $bookcase->getId() . PHP_EOL;
        foreach ($bookcase->getShelves() as $shelf) {
          echo "Полка: " . $shelf->getId() . PHP_EOL;
          foreach ($shelf->getBooks() as $book) {
            echo $book->getDescription() . PHP_EOL;
          };
        };
      };

      foreach ($room->getServers() as $server) {
        echo "Сервер: " . $server->getName() . PHP_EOL;
        foreach ($server->getAudioBooks() as $book) {
          echo $book->getDescription() . PHP_EOL;
        };
        foreach ($server->getEBooks() as $book) {
          echo $book->getDescription() . PHP_EOL;
        };
      }
    }
  }

  public function takeBook(PaperBook $book, BookShelf $shelf): void {
    $shelf->delBook($book);
    $this->checkedOutBooks[] = $book;
    $book->incrementReadCount();
  }

  public function returnBook(PaperBook $book, BookShelf $shelf): void {
    $this->checkedOutBooks[] = $book;

    foreach ($this->checkedOutBooks as $index => $checkedOutBook) {
      if ($checkedOutBook === $book) {
        unset($this->checkedOutBooks[$index]);
        $shelf->addBook($book);
      }
    }
  }
}