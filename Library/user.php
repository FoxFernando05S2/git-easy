<?php

class User {
    public function __construct(
        private string $name,
        private string $address = '',
        private string $phone = ''
    ) {}

    public function getName(): string {
        return $this->name;
    }

    public function getAddress(): string {
        return $this->address;
    }

    public function getPhone(): string {
        return $this->phone;
    }
}

class Library {
    private array $books = [];

    public function addBook(Book $book): void {
        $this->books[] = $book;
    }

    public function listBooks(): void {
        foreach ($this->books as $book) {
            echo "{$book->getTitle()} by {$book->getAuthor()} ({$book->getQuantity()} available)\n";
        }
    }

    public function bookExists(string $title): bool {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return true;
            }
        }
        return false;
    }

    public function getBookByTitle(string $title): ?Book {
        foreach ($this->books as $book) {
            if ($book->getTitle() === $title) {
                return $book;
            }
        }
        return null;
    }
}
