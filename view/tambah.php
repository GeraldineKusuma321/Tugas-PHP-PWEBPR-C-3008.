<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data</title>
    <link rel="stylesheet" href="view/styletambah.css">
</head>
<body>
    <?php ob_start(); ?>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>TAMBAH DATA 
                    <a href="<?= urlpath('dashb') ?>" class="btn btn-danger float-end">KEMBALI</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="<?= urlpath('tambah')?>" method="POST" enctype="multipart/form-data">
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
