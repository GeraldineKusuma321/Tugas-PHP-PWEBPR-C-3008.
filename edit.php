<?php
session_start();
require 'config.php';
    
if(isset($_POST['update'])) {
    $id = $_POST['student_id'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $hp = $_POST['hp'];
    $deskripsi = $_POST['deskripsi'];
    $ammount = $_POST['ammount'];
    $status = $_POST['status'];

    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $image_folder = "kosmetik/" . $image;
        move_uploaded_file($image_temp, $image_folder);


        $query = "UPDATE crud SET date='$date', name='$name', hp='$hp', deskripsi='$deskripsi', ammount='$ammount', status='$status', image='$image_folder' WHERE id='$id'";
    } else {

        $query = "UPDATE crud SET date='$date', name='$name', hp='$hp', deskripsi='$deskripsi', ammount='$ammount', status='$status' WHERE id='$id'";
    }

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data berhasil diupdate";
        header("Location: dashboard.php");
    } else {
        $_SESSION['message'] = "Gagal mengupdate data";
        header("Location: edit.php?id=$id");
    }
} else {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM crud WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run) > 0) {
            $crud = mysqli_fetch_assoc($query_run);
        } else {
            $_SESSION['message'] = "Record not found!";
            header("Location: edit.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "ID not specified!";
        header("Location: edit.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="styleedit.css">
</head>
<body>
    <div class="container">
        <?php include('message.php'); ?>
        <div class="card">
            <div class="card-header">
                <h4>EDIT DATA 
                    <a href="dashboard.php" class="btn btn-danger float-end">KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $crud['id']; ?>">
                    <div class="mb-3">
                        <label for="date">Date</label>
                        <input type="date" name="date" value="<?= $crud['date']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= $crud['name']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="hp">No HP</label>
                        <input type="text" name="hp" value="<?= $crud['hp']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?= $crud['deskripsi']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ammount">Ammount</label>
                        <input type="text" name="ammount" value="<?= $crud['ammount']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" name="status" value="<?= $crud['status']; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-primary">EDIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
