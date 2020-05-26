<?php 
$data = file_get_contents('museum.json');
$menu = json_decode($data, true);
$menu = $menu["data"];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>List Mueseum Indonesia</title>
    <style type="text/css">
        body{
            background-color: sandybrown;
        }
    </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">    
        <a class="navbar-brand" href="latihan1.php">
            <img src="museum.png" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="https://www.google.com/search?q=museum+di+indonesia&oq=museum+di+indonesia&aqs=chrome.0.0j69i60j0l2j69i60j0.3035j0j4&sourceid=chrome&ie=UTF-8">List Museum Indonesia</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">

    <div class="row mt-3">
        <div class="col">
            <h1>List Museum Indonesia</h1>
            <!-- form pencarian data -->
            <form method="post" action="client.php">
                Pencarian Museum berdasar Kota <input type="submit" name="submit" value="Search"><br><br>
            </form>
        </div>
    </div>

    <div class="row">
        <?php foreach ($menu as $row) : ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["nama"]; ?></h5>
                        <p class="card-text">Alamat : <?= $row["alamat_jalan"]; ?></p>
                        <p class="card-text">Desa : <?= $row["desa_kelurahan"]; ?></p>
                        <p class="card-text">Kabupaten/Kota : <?= $row["kabupaten_kota"]; ?></p>
                        <p class="card-text">Propinsi : <?= $row["propinsi"]; ?></p>
                        <p class="card-text">Lintang : <?= $row["lintang"]; ?></p>
                        <p class="card-text">Bujur : <?= $row["bujur"]; ?></p>
                        <p class="card-text">Koleksi : <?= $row["koleksi"]; ?></p>
                        <p class="card-text">Sumber dana : <?= $row["sumber_dana"]; ?></p>
                        <p class="card-text">Pengelola : <?= $row["pengelola"]; ?></p>
                        <p class="card-text">Tipe : <?= $row["tipe"]; ?></p>
                        <p class="card-text">Standar : <?= $row["standar"]; ?></p>
                        <p class="card-text">Tahun berdiri : <?= $row["tahun_berdiri"]; ?></p>
                        <p class="card-text">Bangunan : <?= $row["bangunan"]; ?></p>
                        <p class="card-text">Luas tanah : <?= $row["luas_tanah"]; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>