<?php
function view($page, $data=[]) {
    extract($data);
    include 'view/'.$page.'.php';
}

class Router { 
    public static $urls = ['routes' => [], 'GET' => [], 'POST' => []]; 

    function __construct() {
        $url = implode("/", 
            array_filter(
                explode("/", 
                    str_replace($_ENV['BASEDIR'], "", 
                        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
                    )
                ), 'strlen'
            )
        );
        
        if (!in_array($url, self::$urls['routes'])) {
            header('Location: '.BASEURL);
            exit(); 
        }

        if(isset(self::$urls[$_SERVER['REQUEST_METHOD']][$url])) {
            $call = self::$urls[$_SERVER['REQUEST_METHOD']][$url];
            $call();
        } else {
            echo "404 Not Found";
        }
    }

    public static function url($url, $method, $callback) {
        if ($url == '/') { $url = ''; }
        self::$urls[strtoupper($method)][$url] = $callback;
        self::$urls['routes'][] = $url;
        self::$urls['routes'] = array_unique(self::$urls['routes']);
    }
}

function urlpath($path) {
    require_once 'config/static.php';
    return BASEURL.BASEDIR.$path;
}

function freshdb() {
    require_once 'model/user_model.php';
    User::register([
        'name' => $_ENV['NAME'],
        'email' => $_ENV['EMAIL'],
        'password' => $_ENV['PASSWORD']
    ]);
}
