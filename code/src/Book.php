<?php

namespace App\Oop;

abstract class Book {
  protected string $id;
  protected string $title;
  protected string $year;
  protected array $authors = [];
  protected int $readCount;

  public function __construct(string $title, array $authors, int $year) {
    $this->title = $title;
    $this->authors = $authors;
    $this->year = $year;
    $this->readCount = 0;
    $this->id = '';
  }

  public function getId(): string {
    return $this->id;
  }

  public function setId(string $id): void {
    $this->id = $id;
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

  public function incrementReadCount(): void {
    $this->readCount++;
  }

  abstract public function getType(): string;

  public function getDescription(): string {
    return $this->getType() . " Название:" . $this->getTitle() . " Авторы:" . implode(',', $this->getAuthors()) .
      " Год: " . $this->getYear();
  }
}