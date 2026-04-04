<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::create('/admin/teachers', 'GET');
// We need to bypass auth or login
$user = App\Models\User::where('email', 'admin@example.com')->first();
$app->make('auth')->login($user);

$response = $kernel->handle($request);
if ($response->getStatusCode() >= 500) {
    echo "ERROR " . $response->getStatusCode() . "\n";
    echo substr($response->getContent(), 0, 2000);
} else {
    echo "SUCCESS " . $response->getStatusCode() . "\n";
}
