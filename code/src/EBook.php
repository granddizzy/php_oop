<?php

namespace App\Oop;

class EBook extends Book {
  private string $fileFormat;  // Формат файла (pdf, epub и т.д.)
  private float $fileSize;  // Размер файла в мегабайтах
  private string $downloadLink;

  public function __construct(string $title, array $authors, int $year, string $fileFormat, float $fileSize) {
    parent::__construct($title, $authors, $year);
    $this->fileFormat = $fileFormat;
    $this->fileSize = $fileSize;
  }

  public function getFileFormat(): string {
    return $this->fileFormat;
  }

  public function getFileSize(): float {
    return $this->fileSize;
  }

  public function getType(): string {
    return 'Электронная книга';
  }

  public function setDownloadLink($link): string {
    $this->downloadLink = $link;
  }

  public function download(): string {
    return $this->downloadLink;
  }

  public function getDescription(): string {
    return parent::getDescription() . " Формат:" . $this->getFileFormat() . " Размер:" . $this->getFileSize() . "Mb";
  }
}