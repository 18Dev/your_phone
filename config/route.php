<?php

// Route name
if (!defined('ROUTE_BRAND')) define('ROUTE_BRAND', [
    'INDEX' => 'brand.index',
    'CREATE' => 'brand.create',
    'STORE' => 'brand.store',
    'UPDATE' => 'brand.update',
    'SHOW' => 'brand.show',
]);
if (!defined('ROUTE_ADMIN')) define('ROUTE_ADMIN', [
    'SIGN_IN' => 'admin.sign-in',
    'LOGIN' => 'admin.login',
    'LOGOUT' => 'admin.logout',
]);
