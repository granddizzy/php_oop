<?php

namespace App\Oop;

class AudioBook extends Book {
  private float $duration;  // Продолжительность в минутах
  private string $narrator;  // Исполнитель
  private string $fileAddress;

  public function __construct(string $title, array $authors, int $year, float $duration, string $narrator) {
    parent::__construct($title, $authors, $year);
    $this->duration = $duration;
    $this->narrator = $narrator;
  }

  public function getDuration(): float {
    return $this->duration;
  }

  public function getNarrator(): string {
    return $this->narrator;
  }

  public function getType(): string {
    return 'Аудиокнига';
  }

  public function listen(): void {
    echo "Now listening to '" . $this->getTitle() . "' narrated by " . $this->getNarrator() . ". Duration: " .
      $this->getDuration() . " minutes.\n";
  }

  public function getDescription(): string {
    return parent::getDescription() . " Читает: " . $this->getNarrator() . " Длительность:" . $this->getDuration() . "ч.";
  }
}