<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // 👇 Add your custom role middleware here
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];
}