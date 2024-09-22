<?php

namespace App\Oop;

use Grpc\Server;

class App {
  public static Config $config;

  public function __construct() {
    self::$config = new Config();
  }

  public function run(): void {
    $library = new Library("Национальня библиотека",
      "Республика Беларусь, г.Минск, пр. Независимости 116",
      10);

    $room_1 = $library->getRoom('1');
    $room_2 = $library->getRoom('2');

    $server_1 = new LibraryServer("Server 1");

    $bookcase_1 = new Bookcase('1', 10);
    $bookshelf_1 = $bookcase_1->getShelfById('1');

    $room_1->addBookcase($bookcase_1);
    $room_2->addServer($server_1);

    $book_1 = new PaperBook("Гарри Поттер и философский камень", ["Дж.К. Роулинг"], 1997, 309);
    $book_2 = new PaperBook("Мастер и Маргарита", ["Михаил Булгаков"], 1967, 400);
    $book_3 = new AudioBook("Убить пересмешника", ["Харпер Ли"], 1960, 12, 'Мария Иванова');
    $book_4 = new AudioBook("Великий Гэтсби", ["Фрэнсис Скотт Фицджеральд"], 1925, 8.3, 'Джон Смит"');
    $book_5 = new EBook("Бравый солдат Швейк", ["Ярослав Гашек"], 1923, "PDF", 1.5);
    $book_6 = new EBook("1984", ["Джордж Оруэлл"], 1949, "epub", 1.2);

    $bookshelf_1->addBook($book_1);
    $bookshelf_1->addBook($book_2);

    $server_1->addAudioBook($book_3);
    $server_1->addAudioBook($book_4);
    $server_1->addEBook($book_5);
    $server_1->addEBook($book_6);
  }
}