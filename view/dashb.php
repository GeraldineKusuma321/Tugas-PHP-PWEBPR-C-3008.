<?php
// Lakukan proses logout jika tombol logout ditekan
if(isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: index.php"); 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="view/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
    <?php ob_start(); ?>
    <header class="header">
        <div class="logo">
            <a href="#">Beauty Charm</a>
            <div class="search_box">
                <input type="text" placeholder="Searching in here">
                <i class="fas fa-search"></i> 
            </div>
        </div>

        <div class="header-icons">
            <i class="fas fa-bell"></i>
            <div class="account">
                <img src="profile (1).png" alt="" class="profile">
                <h3>Admin</h3>
            </div>
        </div>
    </header>

    <div class="container">
        <nav>
            <div class="side_navbar" id="sidebar">
                <span>Menu</span>
                <a href="#" class="active">Dashboard</a>
                <a href="#">Profile</a>
                <a href="#">History</a>
            </div>
            <div class="logout-section">
                <form action="<?= urlpath('logout') ?>" method="POST">
                    <button type="submit" name="logout" class="logout-btn">Logout</button>
                </form>
            </div>
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>
            <div class="welcome">
                <h1>Welcome to Beauty Charm</h1>
                <span>Kecantikan sejatimu terpancar dari dalam dirimu</span>
            </div>
            <div class="history_lists">
                <div class="list1">
                    <!-- <?php include('message.php'); ?> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>DATA</h4>
                                    <a href="<?= BASEURL.BASEDIR ?>tambah" class="btn-primary">Tambah</a><br>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>No ID</th>
                                            <th>Dates</th>
                                            <th>Name</th>
                                            <th>No HP</th>
                                            <th>Deskripsi</th>
                                            <th>Ammount</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if(isset($kosmetik)) {
                                            foreach($kosmetik as $kosm) {
                                        ?>
                                        <tr>
                                            <td><?= $kosm['id']; ?></td>
                                            <td><?= $kosm['date']; ?></td>
                                            <td><?= $kosm['name']; ?></td>
                                            <td><?= $kosm['hp']; ?></td>
                                            <td><?= $kosm['deskripsi']; ?></td>
                                            <td><?= $kosm['ammount']; ?></td>
                                            <td><?= $kosm['status']; ?></td>
                                            <td><img src="<?= BASEURL.BASEDIR . 'kosmetik/' . $kosm['image']; ?>" width="50" height="50"></td>
                                            <td>
                                                <input type="hidden" name="id" value="<?= $kosm['id']; ?>">
                                                <form action="<?= urlpath('edit?id='.$kosm['id']) ?>" method="GET">
                                                    <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                                </form>
                                                <a href="<?= urlpath('dashb/remove?id='.$kosm['id']) ?>">
                                                    <button type="submit" name="delete" value="<?= $kosm['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
