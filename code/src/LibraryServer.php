<?php

namespace App\Oop;

class LibraryServer {
  private string $id;
  private string $name;

  private array $eBooks;     // Список электронных книг
  private array $audioBooks; // Список аудиокниг

  public function __construct($name) {
    $this->id = 0;
    $this->name = $name;
    $this->eBooks = [];
    $this->audioBooks = [];
  }

  public function setId(int $id): void {
    $this->id = $id;
  }

  public function getId(): string {
    return $this->id;
  }

  public function getName(): string {
    return $this->name;
  }

  public function addEBook(EBook $eBook): void {
    $this->eBooks[] = $eBook;
  }

  public function addAudioBook(AudioBook $audioBook): void {
    $this->audioBooks[] = $audioBook;
  }

  public function removeEBook(string $id): bool {
    foreach ($this->eBooks as $index => $eBook) {
      if ($eBook->getId() === $id) {
        unset($this->eBooks[$index]);
        $this->eBooks = array_values($this->eBooks);
        return true;
      }
    }
    return false;
  }

  public function removeAudioBook(string $id): bool {
    foreach ($this->audioBooks as $index => $audioBook) {
      if ($audioBook->getId() === $id) {
        unset($this->audioBooks[$index]);
        $this->audioBooks = array_values($this->audioBooks);
        return true;
      }
    }
    return false;
  }
}