<?php

include_once 'model/KosmetikModel.php';

class DashboardController {
    static function index() {
        view('dashb', ['url' => 'home']);
    }
}