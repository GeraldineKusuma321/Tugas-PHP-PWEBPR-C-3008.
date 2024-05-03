<?php
session_start();
require 'config.php';

if(isset($_POST['delete'])) {
    $crud_id = mysqli_real_escape_string($conn, $_POST['delete']);
    $query = "DELETE FROM crud WHERE id='$crud_id' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run) {
        $_SESSION['message'] = "Data Deleted Successfully";
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed to delete data";
        header("Location: dashboard.php");
        exit();
    }
}

if(isset($_POST['update'])) {
    $crud_id = mysqli_real_escape_string($conn, $_POST['student_id']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $hp = mysqli_real_escape_string($conn, $_POST['hp']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $ammount = mysqli_real_escape_string($conn, $_POST['ammount']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $query = "UPDATE crud SET date='$date', name='$name', hp='$hp', deskripsi='$deskripsi', ammount='$ammount', status='$status' WHERE id='$crud_id' ";
    $query_run = mysqli_query($conn, $query);
    if($query_run) {
        $_SESSION['message'] = "Data Updated Successfully";
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed to update data";
        header("Location: dashboard.php");
        exit();
    }
}

if(isset($_POST['tambah'])) {
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $hp = mysqli_real_escape_string($conn, $_POST['hp']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $ammount = mysqli_real_escape_string($conn, $_POST['ammount']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $query = "INSERT INTO crud (date, name, hp, deskripsi, ammount, status) VALUES ('$date','$name','$hp','$deskripsi','$ammount','$status')";
    $query_run = mysqli_query($conn, $query);
    if($query_run) {
        $_SESSION['message'] = "Data Created Successfully";
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Failed to create data";
        header("Location: tambah.php");
        exit();
    }
}
?>