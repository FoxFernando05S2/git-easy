<?php 

require_once 'book.php';
require_once 'loan.php';
require_once 'user.php';
require_once 'loanRegistry.php';

$library = new Library();

echo "\n========================================================\n";
echo "Add books to the library\n";
echo "========================================================\n";

while (true) {
    echo "\nBook title (or 'fin' to finish): ";
    $title = trim(fgets(STDIN));

    if ($title === 'fin') {
        break;
    }

    echo "Author of the book: ";
    $author = trim(fgets(STDIN));

    echo "Quantity available: ";
    $quantity = (int) trim(fgets(STDIN));

    $book = new Book($title, $author, $quantity);
    $library->addBook($book);
}

echo "\n========================================================\n";
echo "Enter the name of the user:\n";
$nombreUsuario = trim(fgets(STDIN));
$user = new User($nombreUsuario);

echo "\n========================================================\n";
$loanRegistry = new LoanRegistry();

while (true) {
    echo "\nBooks available in the library:\n";
    $library->listBooks();

    echo "\nEnter the title of the book to borrow (or 'fin' to finish): ";
    $title = trim(fgets(STDIN));

    if ($title === 'fin') {
        break;
    }

    if (!$library->bookExists($title)) {
        echo "Book not found in the library.\n";
        continue;
    }

    $bookToBorrow = $library->getBookByTitle($title);

    while (true) {
        echo "Quantity to borrow: ";
        $quantityToBorrow = (int) trim(fgets(STDIN));

        if ($quantityToBorrow > $bookToBorrow->getQuantity()) {
            echo "Quantity to borrow exceeds the quantity available. Try again.\n";
        } else {
            break;
        }
    }

    if ($bookToBorrow !== null) {
        $loan = new Loan($user, $bookToBorrow, date('Y-m-d'));
        $loanRegistry->addLoan($loan);
        $bookToBorrow->decreaseQuantity($quantityToBorrow);
    }
}

echo "\n========================================================\n";
echo "List of all loans:\n";
$loanRegistry->listLoans();

echo "\n========================================================\n";
echo "Loans by user:\n";
$loanRegistry->listLoansByUser($user);

echo "\n========================================================\n";
$totalLoans = $loanRegistry->calculateTotalLoans();
echo "Total loans made: $totalLoans\n";
echo "========================================================\n";
?>