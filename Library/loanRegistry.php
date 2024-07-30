<?php

class LoanRegistry {
    private array $loans = [];

    public function addLoan(Loan $loan): void {
        $this->loans[] = $loan;
    }

    public function listLoans(): void {
        foreach ($this->loans as $loan) {
            echo "User: {$loan->getUser()->getName()}, Book: {$loan->getBook()->getTitle()}, Loan Date: {$loan->getLoanDate()}, Return Date: {$loan->getReturnDate()}\n";
        }
    }

    public function listLoansByUser(User $user): void {
        foreach ($this->loans as $loan) {
            if ($loan->getUser()->getName() === $user->getName()) {
                echo "Book: {$loan->getBook()->getTitle()}, Loan Date: {$loan->getLoanDate()}, Return Date: {$loan->getReturnDate()}\n";
            }
        }
    }

    public function calculateTotalLoans(): int {
        return count($this->loans);
    }
}
