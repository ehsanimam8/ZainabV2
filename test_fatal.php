<?php
try {
    require __DIR__.'/vendor/autoload.php';
    $app = require_once __DIR__.'/bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
    $kernel->bootstrap();
    // Instantiate AdminResource
    $resource = new App\Filament\Resources\Admins\AdminResource();
    echo "Resource Boots OK\n";
    
    // Try to get schema form
    $schema = new \Filament\Schemas\Schema(); // Wait, Filament might pass a schema object
    App\Filament\Resources\Admins\AdminResource::form($schema);
    echo "Form OK\n";

    // Try to get table
    // $table = new \Filament\Tables\Table(); 
    // App\Filament\Resources\Admins\AdminResource::table($table);
    // echo "Table OK\n";
    
} catch (\Throwable $e) {
    echo "Caught Error: " . $e->getMessage() . " at " . $e->getFile() . ":" . $e->getLine() . "\n";
}
