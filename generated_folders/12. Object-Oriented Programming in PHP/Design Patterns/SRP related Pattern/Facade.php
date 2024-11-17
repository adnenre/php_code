<?php

echo "#. Single Responsibility Principle (SRP)" . PHP_EOL;
echo "  - Pattern: Facade" . PHP_EOL;
echo " Scenario: Consider a library management system where different subsystems handle book details, user management, and transaction processing. The Facade simplifies the interaction by coordinating these subsystems, each of which has a single responsibility." . PHP_EOL;
echo "#############################################################################################\n\n";

// Subsystems
class BookManager {
    public function addBook($title) {
        echo "Adding book: $title\n";
    }
}

class UserManager {
    public function registerUser($user) {
        echo "Registering user: $user\n";
    }
}

class TransactionManager {
    public function processTransaction($book, $user) {
        echo "Processing transaction for $book with $user\n";
    }
}

// Facade
class LibraryFacade {
    private $bookManager;
    private $userManager;
    private $transactionManager;

    public function __construct() {
        $this->bookManager = new BookManager();
        $this->userManager = new UserManager();
        $this->transactionManager = new TransactionManager();
    }

    public function borrowBook($book, $user) {
        $this->bookManager->addBook($book);
        $this->userManager->registerUser($user);
        $this->transactionManager->processTransaction($book, $user);
    }
}

// Client Code
$libraryFacade = new LibraryFacade();
$libraryFacade->borrowBook("Design Patterns", "John Doe");  // Simplified interaction

echo "\n\n#############################################################################################\n\n";

$Explanation = " Each subsystem (BookManager, UserManager, TransactionManager) has a single, well-defined responsibility. The Facade (LibraryFacade) itself has the responsibility of coordinating the operations across these subsystems, thus adhering to the SRP. The client doesn't need to worry about the individual responsibilities of each subsystem but can rely on the facade to orchestrate the actions." . PHP_EOL;
echo $Explanation;

echo "\n\n#############################################################################################\n\n";

echo " Facade in ISP	Simplifying the interface for the client. while in SRP main goal is Coordinating complex subsystems while maintaining clear responsibilities." . PHP_EOL;
