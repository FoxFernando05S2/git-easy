<?php

declare(strict_types=1);

class Book {
    public function __construct(
        private string $title,
        private string $author,
        private int $quantity
    ) {
        $this->title = $title;
        $this->author = $author;
        $this->quantity = max(0, $quantity);
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function getQuantity(): int {
        return $this->quantity;
    }

    public function decreaseQuantity(int $amount): void {
        $this->quantity = max(0, $this->quantity - $amount);
    }

    public function increaseQuantity(int $amount): void {
        $this->quantity += $amount;
    }
}