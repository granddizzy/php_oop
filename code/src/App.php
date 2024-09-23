<?php

namespace App\Oop;

class App {
  public static Config $config;

  public function __construct() {
    self::$config = new Config();
  }

  public function run(): void {
    $library = new Library("Национальня библиотека",
      "Республика Беларусь, г.Минск, пр. Независимости 116",
      2);

    $room_1 = $library->getRoomById(1);
    $room_2 = $library->getRoomById(2);

    $server_1 = new LibraryServer("Server 1");

    $bookcase_1 = new Bookcase(2);
    $bookshelf_1 = $bookcase_1->getShelfById('1');
    $bookshelf_2 = $bookcase_1->getShelfById('2');

    $room_1->addBookcase($bookcase_1);
    $room_2->addServer($server_1);

    $book_1 = new PaperBook("Гарри Поттер и философский камень", ["Дж.К. Роулинг"], 1997, 309);
    $book_2 = new PaperBook("Мастер и Маргарита", ["Михаил Булгаков"], 1967, 400);
    $book_3 = new AudioBook("Убить пересмешника", ["Харпер Ли"], 1960, 12, 'Мария Иванова');
    $book_4 = new AudioBook("Великий Гэтсби", ["Фрэнсис Скотт Фицджеральд"], 1925, 8.3, 'Джон Смит');
    $book_5 = new DigitalBook("Бравый солдат Швейк", ["Ярослав Гашек"], 1923, "PDF", 1.5);
    $book_6 = new DigitalBook("1984", ["Джордж Оруэлл"], 1949, "epub", 1.2);

    $bookshelf_1->addBook($book_1);
    $bookshelf_2->addBook($book_2);
    $server_1->addBook($book_3);
    $server_1->addBook($book_4);
    $server_1->addBook($book_5);
    $server_1->addBook($book_6);

    $library->showBooks();;

    $library->takeBook($book_2);
    $library->returnBook($book_2);
  }
}