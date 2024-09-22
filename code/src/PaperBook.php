<?php

namespace App\Oop;

class PaperBook extends Book {
  private int $pages;

  public function __construct(string $title, array $authors, int $year, int $pages) {
    parent::__construct($title, $authors, $year);
    $this->pages = $pages;
  }

  public function getPages(): int {
    return $this->pages;
  }

  public function getType(): string {
    return 'Paper Book';
  }
}