<?php
// Definition: High-level modules should not depend on low-level modules. Both should depend on abstractions.

interface PayementProc {
    public function processPayment($amount);
}

class PayPalProcessor implements PayementProc {
    public function processPayment($amount) {
        echo "Processing $amount via PayPal" . PHP_EOL;
    }
}

class StripeProcessor implements PayementProc {
    public function processPayment($amount) {
        echo "Processing $amount via Stripe" . PHP_EOL;
    }
}

class PaymentService {
    private $processor;

    public function __construct(PayementProc $processor) {
        $this->processor = $processor;
    }

    public function pay($amount) {
        $this->processor->processPayment($amount);
    }
}

// Usage
$paymentService = new PaymentService(new PayPalProcessor());
$paymentService->pay(100);
