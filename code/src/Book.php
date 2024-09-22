<?php

namespace App\Oop;

abstract class Book {
  protected string $title;
  protected string $year;
  protected array $authors = [];

  public function __construct(string $title, array $authors, int $year) {
    $this->title = $title;
    $this->authors = $authors;
    $this->year = $year;
  }

  public function getTitle(): string {
    return $this->title;
  }

  public function getAuthors(): array {
    return $this->authors;
  }

  public function getYear(): int {
    return $this->year;
  }

  abstract public function getType(): string;

  public function getDescription(): string {
    return $this->getType() . " Название:" . $this->getTitle() . " Авторы:" . implode(',', $this->getAuthors()) .
      " Год: " . $this->getYear();
  }
}