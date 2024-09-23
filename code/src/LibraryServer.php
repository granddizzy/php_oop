<?php

namespace App\Oop;

class LibraryServer {
  private string $id;
  private string $name;
  private array $eBooks;     // Список электронных книг
  private array $audioBooks; // Список аудиокниг

  public function __construct(string $name, string $id = '') {
    $this->id = $id;
    $this->name = $name;
    $this->eBooks = [];
    $this->audioBooks = [];
  }

  public function getName(): string {
    return $this->name;
  }

  public function getId(): string {
    return $this->id;
  }

  public function setId(string $id): void {
    $this->id = $id;
  }

  public function addBook(DigitalBook|AudioBook $book): void {
    if ($book instanceof DigitalBook) {
      $this->eBooks[$book->getId()] = $book;
    } elseif ($book instanceof AudioBook) {
      $this->audioBooks[$book->getId()] = $book;
    }
  }

  public function removeBook(AudioBook|DigitalBook $delBook): bool {
    if ($delBook instanceof DigitalBook) {
      if (array_key_exists($delBook->getId(), $this->eBooks)) {
        unset($this->eBooks[$delBook->getId()]);
        return true;
      }
    } elseif ($delBook instanceof AudioBook) {
      if (array_key_exists($delBook->getId(), $this->audioBooks)) {
        unset($this->audioBooks[$delBook->getId()]);
        return true;
      }
    }

    return false;
  }

  public function getAudioBooks(): array {
    return $this->audioBooks;
  }

  public function getEBooks(): array {
    return $this->eBooks;
  }
}