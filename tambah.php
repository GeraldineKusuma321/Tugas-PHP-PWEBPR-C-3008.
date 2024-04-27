<?php
session_start();
include 'config.php';

if (isset($_POST['tambah'])) {
    $date = $_POST['date'];
    $name = $_POST['name'];
    $hp = $_POST['hp'];
    $deskripsi = $_POST['deskripsi'];
    $ammount = $_POST['ammount'];
    $status = $_POST['status'];
    
    // Unggah gambar
    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($image_temp, "kosmetik/".$image);

    $query = "INSERT INTO crud (date, name, hp, deskripsi, ammount, status, image) 
              VALUES ('$date', '$name', '$hp', '$deskripsi', '$ammount', '$status', '$image_temp')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['message'] = "Data berhasil ditambahkan";
        header("Location: dashboard.php");
    } else {
        $_SESSION['message'] = "Gagal menambahkan data";
        header("Location: tambah.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data</title>
    <link rel="stylesheet" href="styletambah.css">
</head>
<body>
    <div class="container">
        <?php include('message.php'); ?>
        <div class="card">
            <div class="card-header">
                <h4>TAMBAH DATA 
                    <a href="dashboard.php" class="btn btn-danger float-end">KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="date">Date</label>
                        <input type="text" name="date" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="hp">No HP</label>
                        <input type="text" name="hp" id="hp">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="ammount">Ammount</label>
                        <input type="text" name="ammount" id="ammount">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status">
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="tambah" class="btn">SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
