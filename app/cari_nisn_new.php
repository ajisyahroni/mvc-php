<?php
// Koneksi langsung ke database (tanpa init.php)
$host = 'localhost';
$dbname = 'hi_mulia';
$username = 'root';
$password = ''; // default XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

$nisn = isset($_GET['nisn']) ? trim($_GET['nisn']) : '';
$peserta = $mcu = $kunjungan = [];
$peserta_table = '';

if (!empty($nisn)) {
    // Cek di peserta_uks
    $stmt = $pdo->prepare("SELECT *, 'peserta_uks' as sumber FROM peserta_uks WHERE NISN = ?");
    $stmt->execute([$nisn]);
    $peserta = $stmt->fetchAll();
    $peserta_table = 'peserta_uks';

    // Jika tidak ditemukan, cek di peserta_smp
    if (empty($peserta)) {
        $stmt = $pdo->prepare("SELECT *, 'peserta_smp' as sumber FROM peserta_smp WHERE NISN = ?");
        $stmt->execute([$nisn]);
        $peserta = $stmt->fetchAll();
        $peserta_table = 'peserta_smp';
    }

    // Jika masih tidak ditemukan, cek di peserta_sma
    if (empty($peserta)) {
        $stmt = $pdo->prepare("SELECT *, 'peserta_sma' as sumber FROM peserta_sma WHERE NISN = ?");
        $stmt->execute([$nisn]);
        $peserta = $stmt->fetchAll();
        $peserta_table = 'peserta_sma';
    }

    // --- Pengambilan Data MCU Tahunan ---
    $stmt = $pdo->prepare("SELECT * FROM mcu_tahunan WHERE NISN = ? ORDER BY Tanggal DESC");
    $stmt->execute([$nisn]);
    $mcu = $stmt->fetchAll();

    // --- Pengambilan Data Kunjungan UKS ---
    $stmt = $pdo->prepare("SELECT * FROM kunjungan_uks WHERE NISN = ? ORDER BY Tanggal DESC");
    $stmt->execute([$nisn]);
    $kunjungan = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cek Data NISN</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="shortcut icon" href="http://localhost/hi-mulia/assets/images/favicon.png" />
    <meta name="theme-color" content="#000000" />
    <meta name="author" content="" />
    <meta name="keyword" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/animate.css" />
    <link rel="stylesheet" href="../assets/css/blueimp-gallery.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-theme-literia-seagreen-rounded.css" />
    <link rel="stylesheet" href="../assets/css/custom-style.css" />
    <link rel="stylesheet" href="../assets/css/flatpickr.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap-editable.css" />
    <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
</head>

<body id="main" class="with-login">
    <div id="page-wrapper">
        <div id="main-content">
            <div id="page-content">
                <section class="page" id="list-page-custom">
                    <div class="bg-light p-3 mb-3">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <h4 class="record-title">Pencarian Data NISN</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" animated fadeIn page-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 comp-grid">
                                    <div class="page-report-body">
                                        <form method="get" class="mb-4 d-flex">
                                            <input type="text" name="nisn" class="form-control mr-2" placeholder="Masukkan NISN" value="<?= htmlentities($nisn) ?>">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </form>

                                        <?php if (!empty($nisn)): ?>
                                            <hr class="mb-4">
                                            <h4>👤 Peserta (<?= strtoupper($peserta_table) ?>)</h4>
                                            <?php if (!empty($peserta)): ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-sm text-left">
                                                        <tr>
                                                            <th>Nama</th>
                                                            <td><?= $peserta[0]['Nama'] ?? '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Kelas</th>
                                                            <td><?= $peserta[0]['Kelas'] ?? '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Jenis Kelamin</th>
                                                            <td><?= $peserta[0]['Jenis_Kelamin'] ?? '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>TTL</th>
                                                            <td><?= $peserta[0]['TTL'] ?? '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alergi</th>
                                                            <td><?= $peserta[0]['Alergi'] ?? '-' ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <td><?= $peserta[0]['Alamat'] ?? '-' ?></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            <?php else: ?>
                                                <p class="text-danger">❌ Data peserta tidak ditemukan.</p>
                                            <?php endif; ?>

                                            <h4 class="mt-4">📋 MCU Tahunan</h4>
                                            <?php if (!empty($mcu)): ?>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-bordered table-striped text-left">
                                                        <thead class="table-header bg-light">
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>TB</th>
                                                                <th>BB</th>
                                                                <th>Goldar</th>
                                                                <th>Anggota Tubuh</th>
                                                                <th>Masalah</th>
                                                                <th>Riwayat Kesehatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($mcu as $row): ?>
                                                                <tr>
                                                                    <td><?= $row['Tanggal'] ?></td>
                                                                    <td><?= $row['TB'] ?></td>
                                                                    <td><?= $row['BB'] ?></td>
                                                                    <td><?= $row['Goldar'] ?></td>
                                                                    <td><?= $row['Anggota_tubuh'] ?></td>
                                                                    <td><?= $row['Masalah'] ?></td>
                                                                    <td><?= $row['Riwayat_kesehatan'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php else: ?>
                                                <p class="text-warning">⚠️ Tidak ada data MCU.</p>
                                            <?php endif; ?>

                                            <h4 class="mt-4">🩺 Kunjungan UKS</h4>
                                            <?php if (!empty($kunjungan)): ?>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-bordered table-striped text-left">
                                                        <thead class="table-header bg-light">
                                                            <tr>
                                                                <th>Tanggal</th>
                                                                <th>Subjective</th>
                                                                <th>Objective</th>
                                                                <th>Assesment</th>
                                                                <th>Plan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($kunjungan as $row): ?>
                                                                <tr>
                                                                    <td><?= $row['Tanggal'] ?></td>
                                                                    <td><?= $row['Subjective'] ?></td>
                                                                    <td><?= $row['Objective'] ?></td>
                                                                    <td><?= $row['Assesment'] ?></td>
                                                                    <td><?= $row['Plan'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php else: ?>
                                                <p class="text-warning">⚠️ Tidak ada kunjungan UKS.</p>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <footer class="footer border-top">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="copyright">All Rights Reserved | &copy; HI-Mulia - 2025</div>
                    </div>
                    <div class="col">
                        <div class="footer-links text-right">
                            <a href="http://localhost/hi-mulia/info/about">About us</a> |
                            <a href="http://localhost/hi-mulia/info/help">Help and FAQ</a> |
                            <a href="http://localhost/hi-mulia/info/contact">Contact us</a> |
                            <a href="http://localhost/hi-mulia/info/privacy_policy">Privacy Policy</a> |
                            <a href="http://localhost/hi-mulia/info/terms_and_conditions">Terms and Conditions</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        var siteAddr = 'http://localhost/hi-mulia/';
        var defaultPageLimit = 20;
        var csrfToken = 'bc477aa11adc4b26d45d20c693949386';
    </script>
    <script type="text/javascript" src="../assets/js/popper.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-4.3.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/flatpickr.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-editable.js"></script>
    <script type="text/javascript" src="../assets/js/plugins.js"></script>
    <script type="text/javascript" src="../assets/js/plugins-init.js"></script>
    <script type="text/javascript" src="../assets/js/page-scripts.js"></script>
</body>

</html>