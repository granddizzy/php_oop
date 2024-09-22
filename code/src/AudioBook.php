<?php

namespace App\Oop;

class AudioBook extends Book{
  private int $duration;  // Продолжительность в минутах
  private string $narrator;  // Исполнитель

  public function __construct(string $title, array $authors, int $year, int $duration, string $narrator) {
    parent::__construct($title, $authors, $year);
    $this->duration = $duration;
    $this->narrator = $narrator;
  }

  public function getDuration(): int {
    return $this->duration;
  }

  public function getNarrator(): string {
    return $this->narrator;
  }

  public function getType(): string {
    return 'Audio Book';
  }

  public function listen(): void {
    echo "Now listening to '" . $this->getTitle() . "' narrated by " . $this->getNarrator() . ". Duration: " . $this->getDuration() . " minutes.\n";
  }
}