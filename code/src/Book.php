<?php

namespace App\Oop;

abstract class Book {
  protected string $id;
  protected string $title;
  protected string $year;
  protected array $authors = [];

  public function __construct(string $title, array $authors, int $year) {
    $this->title = $title;
    $this->authors = $authors;
    $this->year = $year;
  }

  public function setId(string $id): void {
    $this->id = $id;
  }

  public function getId(): string {
    return $this->id;
  }

  public function getTitle(): string {
    return $this->title;
  }

  public function getAuthors(): array {
    return $this->authors;
  }

  abstract public function getType(): string;
}