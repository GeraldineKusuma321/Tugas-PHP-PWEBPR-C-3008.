<?php
include_once 'model/KosmetikModel.php';

class KosmetikController{
    static function add() {
        view('tambah', ['url' => 'tambah']);
    }

    static function saveAdd() {
        $post = array_map('htmlspecialchars', $_POST);
        $targetDir = "kosmetik/";
        $file = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($file, $targetFilePath)) {
            $kosmetik = KosmetikModel::insert([
                'date' => $post['date'],
                'name' => $post['name'],
                'hp' => $post['hp'],
                'deskripsi' => $post['deskripsi'],
                'ammount' => $post['ammount'],
                'status' => $post['status'],
                'image' => $fileName,
            ]);

            if ($kosmetik) {
                header('Location: ' . BASEURL.BASEDIR . 'dashb');
            } else {
                echo 'error';
            }
        } else {
            echo 'error';
        }
    }

    static function edit() {
        view('edit', [
            'url' => 'edit',
            'kosmetik' => KosmetikModel::select()
        ]);
    }

    static function saveEdit() {
        $post = array_map('htmlspecialchars', $_POST);
        $targetDir = "kosmetik/";
        $file = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($file, $targetFilePath)) {
            $kosmetik = KosmetikModel::insert([
                'date' => $post['date'],
                'name' => $post['name'],
                'hp' => $post['hp'],
                'deskripsi' => $post['deskripsi'],
                'ammount' => $post['ammount'],
                'status' => $post['status'],
                'image' => $fileName,
            ]);
            if ($kosmetik) {
                header('Location: ' . BASEURL.BASEDIR . 'dashb');
            }
            else {
                echo 'gagal update data';
            }
            }
    }

    static function remove() {
        $kosmetik = KosmetikModel::delete($_GET['id']);
        if ($kosmetik) {
            header('Location: ' . BASEURL.BASEDIR . 'dashb');
        }
        else {
            echo 'gagal';
        }
    }

    static function kosmetik() {
        view('dashb', ['url' => 'kosmetik', 'kosmetik' => KosmetikModel::select()]);
    }
}
