<?php

class Loan {
    public function __construct(
        private User $user,
        private Book $book,
        private string $loanDate,
        private string $returnDate = ''
    ) {}

    public function getUser(): User {
        return $this->user;
    }

    public function getBook(): Book {
        return $this->book;
    }

    public function getLoanDate(): string {
        return $this->loanDate;
    }

    public function getReturnDate(): string {
        return $this->returnDate;
    }

    public function setReturnDate(string $returnDate): void {
        $this->returnDate = $returnDate;
    }
}