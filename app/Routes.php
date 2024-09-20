<?php

return [
    'GET' => [
        '/' => ['controller' => App\Controllers\Login::class],
        '/dashboard' => ['controller' => App\Controllers\Dashboard::class],
        '/products' => ['controller' => App\Controllers\Products::class],
        '/users' => ['controller' => App\Controllers\UserController::class],
        '/roles' => ['controller' => App\Controllers\RolesController::class],
        '/discounts' => ['controller' => App\Controllers\Dashboard::class],
        '/suppliers' => ['controller' => App\Controllers\Suppliers::class],
        '/suppliers/addsupplier' => ['controller' => App\Controllers\AddSupplierForm::class],
        '/suppliers/supplierDetails' => ['controller' => App\Controllers\SupplierDetails::class],
        '/reports' => ['controller' => App\Controllers\Dashboard::class],
        '/logout' => ['controller' => App\Controllers\Logout::class],
    ],

    'POST' => [
        '/login' => ['controller' => App\Controllers\Login::class, 'action' => 'login'],
        '/users/create' => ['controller' => App\Controllers\UserController::class, 'action' => 'create'],
        '/users/edit' => ['controller' => App\Controllers\UserController::class, 'action' => 'edit'],
        '/users/delete' => ['controller' => App\Controllers\UserController::class, 'action' => 'delete'],
    ]
];
