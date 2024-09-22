<?php

namespace App\Oop;

class PaperBook extends Book {
  private int $pages;
  private string $bookcaseId;

  private string $shelfId;

  public function __construct(string $title, array $authors, int $year, int $pages) {
    parent::__construct($title, $authors, $year);
    $this->pages = $pages;
    $this->bookcaseId = 0;
  }

  public function getPages(): int {
    return $this->pages;
  }

  public function getBookcaseId(): string {
    return $this->bookcaseId;
  }

  public function getShelfId(): int {
    return $this->shelfId;
  }

  public function setShelfId(int $id): void {
    $this->shelfId = $id;
  }

  public function setBookcaseId(string $bookcaseId): void {
    $this->bookcaseId = $bookcaseId;
  }

  public function getType(): string {
    return 'Бумажная книга';
  }

  public function getDescription(): string {
    return parent::getDescription() . " Страниц:" . $this->getPages();
  }
}