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

  public function getId(): string {
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
    $this->bookcases[] = $bookcase;
  }

  public function delBookcase(Bookcase $delBookcase): bool {
    foreach ($this->bookcases as $index => $bookcase) {
      if ($delBookcase === $bookcase) {
        unset($this->bookcases[$index]);
        return true;
      }
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
    $this->servers[] = $server;
  }

  public function delServer(LibraryServer $delServer): bool {
    foreach ($this->servers as $index => $server) {
      if ($delServer === $server) {
        unset($this->servers[$index]);
        return true;
      }
    }

    return false;
  }
}