<?php

$definition = 'the Open/Closed Principle (OCP) stat that a class should be open for extenstion but closed for modifiction. This mean we should be able to add new feature without altering existing code' . PHP_EOL;

echo $definition;
echo '##############################################################################' . PHP_EOL;
// Define a common interface for all notification channels
interface NotificationChannel {
    public function send(string $message): void;
}

// Concrete implementation for Email notifications
class EmailNotification implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending Email: $message" . PHP_EOL;
    }
}

// Concrete implementation for SMS notifications
class SMSNotification implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending SMS: $message" . PHP_EOL;
    }
}

// Concrete implementation for Push notifications
class PushNotification implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending Push Notification: $message" . PHP_EOL;
    }
}

// Adding a new notification type (Slack) simple create a new class 
class SlackNotification implements NotificationChannel {
    public function send(string $message): void {
        echo "Sending Slack Notification: $message" . PHP_EOL;
    }
}

// The NotificationService is open for extension but closed for modification
class NotificationService {
    private NotificationChannel $channel;

    public function __construct(NotificationChannel $channel) {
        $this->channel = $channel;
    }

    public function notify(string $message): void {
        $this->channel->send($message);
    }
}

// Usage
$emailChannel = new EmailNotification();
$smsChannel = new SMSNotification();
$pushChannel = new PushNotification();
$slackChannel = new SlackNotification();

$notifier = new NotificationService($emailChannel);
$notifier->notify("Welcome to our service!");

$notifier = new NotificationService($smsChannel);
$notifier->notify("Your code is 123456.");

$notifier = new NotificationService($pushChannel);
$notifier->notify("You have a new message!");

$notifier = new NotificationService($slackChannel);
$notifier->notify("new feature add !");
