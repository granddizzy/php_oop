<?php

namespace App\Oop;

class LibraryServer {
  private string $name;
  private array $eBooks;     // Список электронных книг
  private array $audioBooks; // Список аудиокниг

  public function __construct($name) {
    $this->name = $name;
    $this->eBooks = [];
    $this->audioBooks = [];
  }

  public function getName(): string {
    return $this->name;
  }

  public function addEBook(EBook $book): void {
    $this->eBooks[] = $book;
  }

  public function addAudioBook(AudioBook $book): void {
    $this->audioBooks[] = $book;
  }

  public function removeEBook(EBook $delBook): bool {
    foreach ($this->eBooks as $index => $book) {
      if ($delBook === $book) {
        unset($this->eBooks[$index]);
        $this->eBooks = array_values($this->eBooks);
        return true;
      }
    }
    return false;
  }

  public function removeAudioBook(AudioBook $delBook): bool {
    foreach ($this->audioBooks as $index => $book) {
      if ($delBook === $book) {
        unset($this->audioBooks[$index]);
        $this->audioBooks = array_values($this->audioBooks);
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