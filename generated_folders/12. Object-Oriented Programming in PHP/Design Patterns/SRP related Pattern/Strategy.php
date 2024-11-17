<?php

echo "#. Single Responsibility Principle (SRP)" . PHP_EOL;
echo "  - Pattern: Strategy Pattern" . PHP_EOL;
echo " Scenario: A system that can perform different types of payment processing (e.g., Credit Card, PayPal). Each payment method should be handled by a different strategy to avoid mixing concerns in one class" . PHP_EOL;
echo "#############################################################################################\n\n";
// Strategy Interface
interface PaymentStrategy {
    public function processPayment($amount);
}

// Concrete Strategies
class CreditCardPayment implements PaymentStrategy {
    public function processPayment($amount) {
        echo "Processing credit card payment of $amount\n";
    }
}

class PayPalPayment implements PaymentStrategy {
    public function processPayment($amount) {
        echo "Processing PayPal payment of $amount\n";
    }
}

// Context Class
class PaymentProcessor {
    private $paymentStrategy;

    public function __construct(PaymentStrategy $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    public function executePayment($amount) {
        $this->paymentStrategy->processPayment($amount);
    }
}

// Client Code
$creditCardPayment = new PaymentProcessor(new CreditCardPayment());
$creditCardPayment->executePayment(100);

$payPalPayment = new PaymentProcessor(new PayPalPayment());
$payPalPayment->executePayment(200);


echo "\n\n#############################################################################################\n\n";

$Explanation = " Why Strategy: The Strategy Pattern allows payment processing to be divided into different strategies (CreditCardPayment, PayPalPayment), keeping the PaymentProcessor class focused on executing the payment, maintaining a Single Responsibility." . PHP_EOL;
echo $Explanation;
