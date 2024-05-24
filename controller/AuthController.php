<?php
include_once 'model/user_model.php';

class AuthController {
    static function login() {
        view('auth_page/layout', ['url' => 'index']);
    }

    static function register() {
        view('auth_page/layout', ['url' => 'register']);
    }

    static function saveLogin() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::login([
            'email' => $post['email'], 
            'password' => $post['password']
        ]);

        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;

            echo "Login berhasil, mengarahkan ke halaman dashboard.<br>";
            header('Location: ' . BASEURL . 'dashb');
            exit();
        } else {
            
            echo "Login gagal.<br>";
            header('Location: ' . BASEURL . 'index?failed=true');
            exit();
        }
    }

    static function saveRegister() {
        $post = array_map('htmlspecialchars', $_POST);

        $user = User::register([
            'name' => $post['name'], 
            'email' => $post['email'], 
            'password' => $post['password']
        ]);

        if ($user) {
            header('Location: ' . BASEURL . 'index');
            exit();
        } else {
            header('Location: ' . BASEURL . 'register?failed=true');
            exit();
        }
    }

    static function logout() {
        $_SESSION = array();
        
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        
        session_destroy();
        header('Location: ' . BASEURL . 'index');
        exit(); 
    }
}
