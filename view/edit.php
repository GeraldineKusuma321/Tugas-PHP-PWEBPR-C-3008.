<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="view/styleedit.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>EDIT DATA 
                    <a href="<?= urlpath('dashb') ?>" class="btn btn-danger float-end">KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="<?php urlpath('edit?id='.$kosmetik[0]['id']); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="date">Date</label>
                        <input type="text" name="date" value="<?= $kosmetik[0]['date'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="<?= $kosmetik[0]['name'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="hp">No HP</label>
                        <input type="text" name="hp" value="<?= $kosmetik[0]['hp'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" value="<?= $kosmetik[0]['deskripsi'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ammount">Ammount</label>
                        <input type="text" name="ammount" value="<?= $kosmetik[0]['ammount'] ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="text" name="status" value="<?= $kosmetik[0]['status'] ?>" class="form-control">
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
