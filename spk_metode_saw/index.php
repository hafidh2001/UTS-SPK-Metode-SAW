<?php

// MENGHUBUNGKAN KONEKSI DATABASE
require "koneksi.php";

// CEK COOKIE
checkCookie();

// JIKA SUDAH LOGIN MASUKKAN KEDALAM SHOWDATA
if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
} else {
    if (isset($_SESSION['id_user'])) {
        // var_dump($_SESSION['id_user']); die;
        $my_id = $_SESSION['id_user'];
    } else {
        $my_id = $_COOKIE['id_user'];
    }

    // QUERY MAHASISWA
    $user = query("SELECT * FROM tb_user WHERE id_user = '$my_id' ")[0];
}
?>

<?php
// APABILA TOMBOL CONFIRM DITEKAN
if (isset($_POST["submit"])) {

    if (tambah_data($_POST) > 0) {
        echo "<script>
			alert ('Data baru berhasil ditambahkan');
		 	document.location.href = 'tambah.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

$bobot = query("SELECT * FROM tb_bobot ORDER BY id_bobot ASC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Kriteria | HF-Cascade</title>

    <!-- Link Icon -->
    <link rel="icon" href="asset/icons/oke.png" type="image/gif" sizes="16x16">
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css">
    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="asset/fontawesome-free-5.15.3/css/all.css">
    <!--load all styles -->
    <link rel="stylesheet" href="asset/style/index.css">

</head>

<body>
    <!-- Start Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand">
                <img src="asset/icons/hf_cascade_white.png" alt="hf-cascade" title="hf-cascade" width="120px">
            </a>

            <!-- DROPDOWN -->
            <div class="fa-pull-right">
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Kriteria</a>
                        </li>

                        <p style="color: white; margin-left: 10px; margin-right: 10px; margin-top: 6px;">|</p>

                        <li class="nav-item">
                            <a class="nav-link" href="penilaian.php">Penilaian</a>
                        </li>

                        <p style="color: white; margin-left: 10px; margin-right: 10px; margin-top: 6px;">|</p>

                        <li class="nav-item">
                            <a class="nav-link" href="keputusan.php">Keputusan</a>
                        </li>

                        <p style="color: white; margin-left: 10px; margin-right: 10px; margin-top: 6px;">|</p>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $user["email"] ?></a>
                        </li>

                        <p style="color: white; margin-left: 10px; margin-right: 10px; margin-top: 6px;">|</p>

                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="fa fa-power-off"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- DROPDOWN -->

        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Content -->
    <div class="container">
        <h2 class="text-center">Kriteria Keputusan</h2>
        <h3 class="text-center">“Penentuan Lulusan Terbaik Dari Kegiatan Bootcamp Sanbercode”</h3>
        <br><br>

        <div class="row justify-content-center">

            <!-- START ABSENSI KEHADIRAN -->
            <div class="col-10 mt-2 mb-2">
                <h4 style="font-weight: bold;">Absensi Kehadiran (K1)</h4>
                <table class="table table-bordered text-center align-middle">
                    <thead style="background-color: yellow;">
                        <tr>
                            <th>KRITERIA</th>
                            <th>RENTANG</th>
                            <th>BOBOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">Absensi Kehadiran</td>
                            <td>1 Minggu</td>
                            <td>0.2</td>
                        </tr>
                        <tr>
                            <td>2 Minggu</td>
                            <td>0.4</td>
                        </tr>
                        <tr>
                            <td>3 Minggu</td>
                            <td>0.6</td>
                        </tr>
                        <tr>
                            <td>4 Minggu</td>
                            <td>0.8</td>
                        </tr>
                        <tr>
                            <td>5 Minggu</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END ABSENSI KEHADIRAN -->

            <!-- START PENILAIAN TUGAS HARIAN -->
            <div class="col-10 mt-2 mb-2">
                <h4 style="font-weight: bold;">Penilaian Tugas Harian (K2)</h4>
                <table class="table table-bordered text-center align-middle">
                    <thead style="background-color: yellow;">
                        <tr>
                            <th>KRITERIA</th>
                            <th>RENTANG</th>
                            <th>SKALA PENILAIAN</th>
                            <th>BOBOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">Penilaian Tugas Harian</td>
                            <td>
                                <50% (Kurang) </td>
                            <td>1</td>
                            <td>0.2</td>
                        </tr>
                        <tr>
                            <td>
                                50% - <70% (Cukup) </td>
                            <td>2</td>
                            <td>0.4</td>
                        </tr>
                        <tr>
                            <td>
                                70% - <80% (Baik) </td>
                            <td>3</td>
                            <td>0.6</td>
                        </tr>
                        <tr>
                            <td>
                                80% - <99% (Sangat Baik) </td>
                            <td>4</td>
                            <td>0.8</td>
                        </tr>
                        <tr>
                            <td>
                                100% (Cumlaude) </td>
                            <td>5</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END PENILAIAN TUGAS HARIAN -->

            <!-- START PENILAIAN QUIZ MINGGUAN DAN FINAL PROJECT -->
            <div class="col-10 mt-2 mb-2">
                <h4 style="font-weight: bold;">Penilaian Quiz Mingguan dan Final Project (K3)</h4>
                <table class="table table-bordered text-center align-middle">
                    <thead style="background-color: yellow;">
                        <tr>
                            <th>KRITERIA</th>
                            <th>RENTANG</th>
                            <th>SKALA PENILAIAN</th>
                            <th>BOBOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="5">Penilaian Tugas Harian</td>
                            <td>
                                <50% (Kurang) </td>
                            <td>1</td>
                            <td>0.2</td>
                        </tr>
                        <tr>
                            <td>
                                50% - <70% (Cukup) </td>
                            <td>2</td>
                            <td>0.4</td>
                        </tr>
                        <tr>
                            <td>
                                70% - <80% (Baik) </td>
                            <td>3</td>
                            <td>0.6</td>
                        </tr>
                        <tr>
                            <td>
                                80% - <99% (Sangat Baik) </td>
                            <td>4</td>
                            <td>0.8</td>
                        </tr>
                        <tr>
                            <td>
                                100% (Cumlaude) </td>
                            <td>5</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END PENILAIAN QUIZ MINGGUAN DAN FINAL PROJECT -->

            <!-- START BOBOT -->
            <div class="col-10 mt-2 mb-2">
                <h4 style="font-weight: bold;">Bobot</h4>
                <table class="table table-bordered text-center align-middle">
                    <thead style="background-color: yellow;">
                        <tr>
                            <th>PREFERENSI</th>
                            <th>PENILAIAN</th>
                            <th>BOBOT</th>
                            <th>KONVERSI BOBOT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_bobot = [];
                        $total_konversi_bobot = [];

                        foreach ($bobot as $bt) :
                            array_push($total_bobot, $bt['nilai_bobot']);
                            $nilai_total = array_sum($total_bobot);
                        endforeach;
                        ?>

                        <?php foreach ($bobot as $bt) : ?>
                            <?php $konversi_bobot = $bt['nilai_bobot'] / $nilai_total;  ?>
                            <tr>
                                <td>W<?= $no; ?></td>
                                <td class="text-start align-middle"><?= $bt['kriteria']; ?></td>
                                <td><?= $bt['nilai_bobot']; ?></td>
                                <td><?= $konversi_bobot; ?></td>
                            </tr>

                            <?php
                            array_push($total_konversi_bobot, $konversi_bobot);
                            $nilai_total_konversi = array_sum($total_konversi_bobot);

                            $no++;
                            ?>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">TOTAL POINT</td>
                            <td><?= $nilai_total; ?></td>
                            <td><?= $nilai_total_konversi; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END BOBOT -->

            <!-- START BENEFIT OR COST -->
            <div class="col-10 mt-2 mb-2">
                <h4 style="font-weight: bold;">Benefit Or Cost</h4>
                <table class="table table-bordered text-center align-middle">
                    <thead style="background-color: yellow;">
                        <tr>
                            <th>KRITERIA</th>
                            <th>BENEFIT</th>
                            <th>COST</th>
                        </tr>
                    </thead>
                    <!-- <i class="fas fa-check"></i> -->
                    <tbody>
                        <?php foreach ($bobot as $bt) : ?>
                            <tr>
                                <td class="text-start align-middle"><?= $bt['kriteria']; ?></td>

                                <?php if ($bt['keterangan'] == "benefit") : ?>
                                    <td><i class="fas fa-check"></i></td>
                                <?php elseif ($bt['keterangan'] == "cost") : ?>
                                    <td>-</td>
                                <?php endif; ?>

                                <?php if ($bt['keterangan'] == "cost") : ?>
                                    <td><i class="fas fa-check"></i></td>
                                <?php elseif ($bt['keterangan'] == "benefit") : ?>
                                    <td>-</td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- END BENEFIT OR COST -->
        </div>
    </div>
    <!-- End Content -->

    <!-- Link Bootstrap JavaScript -->
    <script src="asset/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>