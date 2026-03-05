<?php

use Illuminate\Support\Facades\Mail;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

try {
    echo "Attempting to send test email...\n";
    Mail::raw('This is a direct SMTP test from the server.', function ($message) {
        $message->to('immanuelashley77@gmail.com')
                ->subject('SMTP Verification Test');
    });
    echo "Email sent command executed. Check your inbox.\n";
} catch (\Exception $e) {
    echo "Error sending email: " . $e->getMessage() . "\n";
}
