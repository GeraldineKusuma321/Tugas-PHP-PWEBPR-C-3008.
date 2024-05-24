<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

// Tentukan route untuk GET
Router::url('/', 'get', function () { return view('dashb'); });
Router::url('dashb', 'get', 'DashboardController::index');
Router::url('dashb', 'get', 'KosmetikController::kosmetik');
Router::url('index', 'get', 'AuthController::login');
Router::url('register', 'get', 'AuthController::register');
Router::url('logout', 'get', 'AuthController::logout');
Router::url('dashb/remove', 'get', 'KosmetikController::remove');

// Tentukan route untuk POST
Router::url('index', 'post', 'AuthController::saveLogin');
Router::url('register', 'post', 'AuthController::saveRegister');
Router::url('tambah', 'post', 'KosmetikController::saveAdd');
Router::url('edit', 'post', 'KosmetikController::saveEdit');
Router::url('logout', 'post', 'AuthController::logout');
Router::url('dashb/remove', 'post', 'KosmetikController::remove');

// Jalankan router
new Router();
