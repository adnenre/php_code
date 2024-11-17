<?php

echo " -The Strategy Pattern supports the Open/Closed Principle by allowing new strategies (or algorithms) to be added without modifying the context or existing code." . PHP_EOL;
echo " - Senario : Let’s consider a payment processing system where a user can choose to pay via credit card, PayPal, or Bitcoin. Each payment method has its own algorithm for processing payments. Instead of modifying the core class every time a new payment method is added, we can use the Strategy Pattern to extend the payment system." . PHP_EOL;
echo "#############################################################################################\n\n";

// Strategy Interface (defines a common contract for all payment methods)
interface PaymentStrategyExample {
    public function pay($amount);
}

// Concrete Strategy: Credit Card Payment
class CreditCard implements PaymentStrategyExample {
    public function pay($amount) {
        echo "Processing payment of $amount using Credit Card.\n";
    }
}

// Concrete Strategy: PayPal Payment
class PayPalPayment implements PaymentStrategyExample {
    public function pay($amount) {
        echo "Processing payment of $amount using PayPal.\n";
    }
}

// Concrete Strategy: Bitcoin Payment
class BitcoinPayment implements PaymentStrategyExample {
    public function pay($amount) {
        echo "Processing payment of $amount using Bitcoin.\n";
    }
}

// Context Class (Payment Processor)
class PaymentProcessor {
    private $paymentStrategy;

    // Constructor Injection of the Strategy
    public function __construct(PaymentStrategyExample $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    // Method to change the payment strategy dynamically
    public function setPaymentStrategyExample(PaymentStrategyExample $paymentStrategy) {
        $this->paymentStrategy = $paymentStrategy;
    }

    // Process Payment
    public function processPayment($amount) {
        $this->paymentStrategy->pay($amount);
    }
}

// Client Code
$CreditCard = new CreditCard();
$paypalPayment = new PayPalPayment();
$bitcoinPayment = new BitcoinPayment();

// Create the Payment Processor and use Credit Card as the payment method
$paymentProcessor = new PaymentProcessor($CreditCard);
$paymentProcessor->processPayment(100);

// Change the payment method to PayPal at runtime
$paymentProcessor->setPaymentStrategyExample($paypalPayment);
$paymentProcessor->processPayment(200);

// Change the payment method to Bitcoin at runtime
$paymentProcessor->setPaymentStrategyExample($bitcoinPayment);
$paymentProcessor->processPayment(300);
