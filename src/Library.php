<?php
namespace Ilya\Lab6;
use Ilya\Lab6\Book;
use Ilya\Lab6\LibraryFullException;
use Ilya\Lab6\BookAlreadyExistsException;
class Library
{
    private array $books = [];
    private int $maxBooks;

    public function __construct(int $maxBooks)
    {
        $this->maxBooks = $maxBooks;
    }

    public function addBook(Book $book)
    {
        if ($this->hasBook($book)) {
            throw new BookAlreadyExistsException("Книга с названием '" . $book->getTitle() . "' и автором '" . $book->getAuthor() . "' уже существует");
        }
        if (count($this->books) >= $this->maxBooks) {
            throw new LibraryFullException("Библиотека заполнена");
        }
        $this->books[] = $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function hasBook(Book $book): bool
    {
        foreach ($this->books as $existingBook) {
            if ($existingBook->getTitle() === $book->getTitle() && $existingBook->getAuthor() === $book->getAuthor()) {
                return true;
            }
        }
        return false;
    }
}
