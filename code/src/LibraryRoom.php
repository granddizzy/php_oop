<?php

namespace App\Oop;

class LibraryRoom {
  public int $id;
  public string $name;
  private array $bookcases;
  private array $servers;

  public function __construct(int $id) {
    $this->id = $id;
    $this->name = '';
    $this->bookcases = [];
    $this->servers = [];
  }

  public function getId(): int {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }

  public function addBookcase(Bookcase $bookcase): void {
    $this->bookcases[$bookcase->getId()] = $bookcase;
    $bookcase->setRoomId($this->id);
  }

  public function delBookcase(Bookcase $delBookcase): bool {
    if (array_key_exists($delBookcase->getId(), $this->bookcases)) {
      unset($this->bookcases[$delBookcase->getId()]);
      return true;
    }

    return false;
  }

  public function getBookcases(): array {
    return $this->bookcases;
  }

  public function getServers(): array {
    return $this->servers;
  }

  public function addServer(LibraryServer $server): void {
    if (empty($server->getId())) {
      $server->setId(uniqid());
    }
    $this->servers[$server->getId()] = $server;
  }

  public function delServer(LibraryServer $delServer): bool {
    if (array_key_exists($delServer->getId(), $this->servers)) {
      unset($this->bookcases[$delServer->getId()]);
      return true;
    }

    return false;
  }

  public function getBookList(): array {
    $books = [];
    foreach ($this->bookcases as $bookcase) {
      array_merge($books, $bookcase->getBookList());
    }

    return $books;
  }
}