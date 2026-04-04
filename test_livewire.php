<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $user = App\Models\User::where('email', 'admin@example.com')->first();
    auth()->login($user);
    
    // Test the render of a Livewire component
    $html = Livewire\Livewire::test(App\Filament\Resources\Admins\Pages\ListAdmins::class)
        ->html();
    echo "RENDER OK. Length: " . strlen($html) . "\n";
} catch (\Throwable $e) {
    echo "FATAL LIVEWIRE ERROR!\n";
    echo $e->getMessage() . "\n";
    echo $e->getFile() . ":" . $e->getLine() . "\n";
}
