<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Détermine si l'application est en mode maintenance
if (file_exists(__DIR__ . '/../hardware-shop/storage/framework/maintenance.php')) {
    require __DIR__ . '/../hardware-shop/storage/framework/maintenance.php';
}

// Charge l'autoloader Composer
require __DIR__ . '/../hardware-shop/vendor/autoload.php';

// Lance Laravel
$app = require_once __DIR__ . '/../hardware-shop/bootstrap/app.php';

/** @var Application $app */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle($request = Request::capture());
$response->send();
