<?php

namespace App\Oop;

class LibraryRoom {
  public string $id;
  private array $bookcases = [];
  private array $servers = [];

  public function __construct($id) {
    $this->id = $id;
  }

  public function getId(): string {
    return $this->id;
  }

  public function addBookcase(Bookcase $bookcase): void {
    $this->bookcases[] = $bookcase;
  }

  public function delBookcase($id): bool {
    foreach ($this->bookcases as $index => $bookcase) {
      if ($bookcase->getId() === $id) {
        unset($this->bookcases[$index]);
        // Сбросим индексы массива чтобы не было дырок
        $this->bookcases = array_values($this->bookcases);
        return true;
      }
    }

    return false;
  }

  public function getBookcases(): array {
    return $this->bookcases;
  }

  public function addServer(LibraryServer $server): void {
    $this->servers[] = $server;
  }

  public function delServer(LibraryServer $server): bool {
    foreach ($this->servers as $index => $server) {
      if ($server->getId() === $id) {
        unset($this->servers[$index]);
        // Сбросим индексы массива чтобы не было дырок
        $this->servers = array_values($this->servers);
        return true;
      }
    }

    return false;
  }

  public function listBooks(): void {
    foreach ($this->bookcases as $bookcase) {
      $bookcase->listBooks();
    }
  }
}