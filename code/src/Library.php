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
      $room_id = count($this->rooms) + 1;
      $this->rooms[$room_id] = new LibraryRoom($room_id);
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

  public function getRoomById(string $id): LibraryRoom|null {
    if (array_key_exists($id, $this->rooms)) {
      return $this->rooms[$id];
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
          foreach ($shelf->getBooksList() as $book) {
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

  public function getBookLocation(PaperBook $searchBook): BookShelf|null {
    foreach ($this->rooms as $room) {
      if (array_key_exists($searchBook->getBookcaseId(), $room->getBookcases())) {
        $bookcase = $room->getBookcases()[$searchBook->getBookcaseId()];
        if (array_key_exists($searchBook->getShelfId(), $bookcase->getShelves())) {
          return $bookcase->getShelves()[$searchBook->getShelfId()];
        }
      }
    }

    return null;
  }

  public function takeBook(PaperBook $book): void {
    $shelf = $this->getBookLocation($book);
    if ($shelf !== null) {
      $shelf->delBook($book);
      $this->checkedOutBooks[$book->getId()] = $book;
      $book->incrementReadCount();
      echo "Выдана книга: " . $book->getDescription() . PHP_EOL;
    } else {
      echo "Не найдено место хранения книги: " . $book->getDescription() . PHP_EOL;
    }
  }

  public function returnBook(PaperBook $book): void {
    $shelf = $this->getBookLocation($book);
    if ($shelf !== null) {
      $shelf->addBook($book);
      unset($this->checkedOutBooks[$book->getId()]);
      echo "Возвращена книга: " . $book->getDescription() . PHP_EOL;
    } else {
      echo "Не найдено место хранения книги: " . $book->getDescription() . PHP_EOL;
    }
  }
}