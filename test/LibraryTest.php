<?php
use PHPUnit\Framework\TestCase;
use Ilya\Lab6\Book;
use Ilya\Lab6\Library;
use Ilya\Lab6\BookAlreadyExistsException;

class LibraryTest extends TestCase
{
    public function testAddBook()
    {
        $library = new Library(2);

        $book1 = new Book("Babaduk", "Юхаз");
        $library->addBook($book1);
        $this->assertTrue($library->hasBook($book1));

        $book2 = new Book("fff", "Юхаз");
        $this->expectException(BookAlreadyExistsException::class);
        $library->addBook($book2);
    }
}