<?php
    session_start();
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>
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
        </nav>

        <div class="main-body">
            <h2>Dashboard</h2>
            <div class="welcome">
                <h1>Welcome to Beauty Charm</h1>
                <span>Kecantikan sejatimu terpancar dari dalam dirimu</span>
            </div>
            <div class="history_lists">
                <div class="list1">
                    <?php include('message.php'); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>DATA</h4>
                                    <a href="tambah.php" class="btn-primary">Tambah</a><br>
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
                                            $query = "SELECT * FROM crud";
                                            $query_run = mysqli_query($conn, $query);

                                            if(mysqli_num_rows($query_run) > 0) {
                                                foreach($query_run as $crud) {
                                        ?>
                                        <tr>
                                            <td><?= $crud['id']; ?></td>
                                            <td><?= $crud['date']; ?></td>
                                            <td><?= $crud['name']; ?></td>
                                            <td><?= $crud['hp']; ?></td>
                                            <td><?= $crud['deskripsi']; ?></td>
                                            <td><?= $crud['ammount']; ?></td>
                                            <td><?= $crud['status']; ?></td>
                                            <td><img src="<?= $crud['image']; ?>" width="50" height="50"></td>
                                            <td>
                                                <form action="edit.php" method="GET">
                                                    <input type="hidden" name="id" value="<?= $crud['id']; ?>">
                                                    <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                                </form>
                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete" value="<?= $crud['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan='9'><h5>No Record Found</h5></td></tr>";
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
