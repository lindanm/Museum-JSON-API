<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!------ Include the above in your HEAD tag ---------->
    <title>List Museum Indonesia</title>
    <style>
    body,html{
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    background: #FFE4B5;
    font-family: arial;
    }

    .searchbar{
    margin-bottom: auto;
    margin-top: auto;
    height: 60px;
    background-color: #FFA07A;
    border-radius: 30px;
    padding: 10px;
    }

    .search_input{
    color: white;
    border: 0;
    outline: 0;
    background: none;
    width: 0;
    caret-color:transparent;
    line-height: 40px;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_input{
    padding: 0 10px;
    width: 450px;
    caret-color:red;
    transition: width 0.4s linear;
    }

    .searchbar:hover > .search_icon{
    background: white;
    color: #e74c3c;
    }

    .search_icon{
    height: 40px;
    width: 40px;
    float: right;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    }

    </style>
</head>

<body>
    <!-- form pencarian data -->
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="searchbar">
        <form method="post" action="client.php?op=search">
        <input type="text" name="key" placeholder="Input Museum Location">
        <input type="submit" name="submit" value="Search">
        </form>
        </div>
      </div>
    </div>  

    <?php
    // proses pencarian data
    if (isset($_GET['op'])) {
        if ($_GET['op'] == 'search') {
            //require_once('museum.json');
            // baca keyword pencarian dari form
            $key = $_POST['key'];


            // instansiasi obyek untuk class nusoap client, arahkan URL ke script server.php di server A
            //$client = new nusoap_client('http://serverA/.../server.php');
            // proses call method 'search' dengan parameter key di script server.php yang ada di server A
            $result = file_get_contents("museum.json");
            $data = json_decode($result, $key);

            echo "<br><table border='1'>";
            echo "<th>Museum ID</th>";
            echo "<th>Kode Pengelolaan</th>";
            echo "<th>Nama</th>";
            echo "<th>SDM</th>";
            echo "<th>Alamat</th>";
            echo "<th>Desa Kelurahan</th>";
            echo "<th>Kecamatan</th>";
            echo "<th>Kabupaten Kota</th>";
            echo "<th>Provinsi</th>";
            echo "<th>Lintang</th>";
            echo "<th>Bujur</th>";
            echo "<th>Koleksi</th>";
            echo "<th>Sumber Dana</th>";
            echo "<th>Pengelola</th>";
            echo "<th>Tipe</th>";
            echo "<th>Standar</th>";
            echo "<th>Tahun Bediri</th>";
            echo "<th>Bangunan</th>";
            echo "<th>Luas Tanah</th>";
            echo "<th>Status Kepemilikan</th></tr>";
            for ($i = 0; $i < sizeof($data['data']); $i++) {
                if (strpos(strtolower($data['data'][$i]['kabupaten_kota']), strtolower($key))) {
                    echo "<tr><td>".$data['data'][$i]['museum_id']."</td>";
                    echo "<td>".$data['data'][$i]['kode_pengelolaan']."</td>";
                    echo "<td>".$data['data'][$i]['nama']."</td>";
                    echo "<td>".$data['data'][$i]['sdm']."</td>";
                    echo "<td>".$data['data'][$i]['alamat_jalan']."</td>";
                    echo "<td>".$data['data'][$i]['desa_kelurahan']."</td>";
                    echo "<td>".$data['data'][$i]['kecamatan']."</td>";
                    echo "<td>".$data['data'][$i]['kabupaten_kota']."</td>";
                    echo "<td>".$data['data'][$i]['propinsi']."</td>";
                    echo "<td>".$data['data'][$i]['lintang']."</td>";
                    echo "<td>".$data['data'][$i]['bujur']."</td>";
                    echo "<td>".$data['data'][$i]['koleksi']."</td>";
                    echo "<td>".$data['data'][$i]['sumber_dana']."</td>";
                    echo "<td>".$data['data'][$i]['pengelola']."</td>";
                    echo "<td>".$data['data'][$i]['tipe']."</td>";
                    echo "<td>".$data['data'][$i]['standar']."</td>";
                    echo "<td>".$data['data'][$i]['tahun_berdiri']."</td>";
                    echo "<td>".$data['data'][$i]['bangunan']."</td>";
                    echo "<td>".$data['data'][$i]['luas_tanah']."</td>";
                    echo "<td>".$data['data'][$i]['status_kepemilikan']."</td></tr>";
                }
            }
            echo "</table>";
        }
    }
    ?>

</body>

</html>