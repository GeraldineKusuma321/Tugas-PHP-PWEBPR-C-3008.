<?php
include_once 'config/static.php';
include_once 'controller/main.php';
include_once 'function/main.php';

# GET
Router::url('/', 'get', function () { return view('dashb'); });
Router::url('dashb', 'get', 'DashboardController::index');
Router::url('dashb', 'get', 'KosmetikController::kosmetik');

# POST
Router::url('tambah', 'get', 'KosmetikController::add');
Router::url('tambah', 'POST', 'KosmetikController::saveAdd');

Router::url('edit', 'get', 'KosmetikController::edit');
Router::url('edit', 'POST', 'KosmetikController::saveEdit');

Router::url('dashb/remove', 'get', 'KosmetikController::remove');

new Router();
