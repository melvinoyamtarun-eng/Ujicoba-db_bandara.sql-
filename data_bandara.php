<?php
include_once "../src/koneksi.php";

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM bandara ORDER BY id_bandara ASC"
);

$total_bandara = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bandara | Sistem Informasi Bandara</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f5ff;
            color: #263554;
        }

        .header {
            background: linear-gradient(135deg, #0759c7, #168bff, #36c5f0);
            padding: 35px 6%;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::after {
            content: "✈";
            position: absolute;
            right: 7%;
            top: 0;
            font-size: 130px;
            opacity: 0.15;
            transform: rotate(-15deg);
        }

        .header small {
            letter-spacing: 2px;
            font-size: 12px;
            font-weight: 600;
            opacity: 0.9;
        }

        .header h1 {
            margin: 12px 0 8px;
            font-size: 30px;
            font-weight: 800;
        }

        .header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .container {
            max-width: 1250px;
            width: 92%;
            margin: 30px auto;
        }

        .breadcrumb {
            font-size: 13px;
            margin-bottom: 22px;
            color: #71809d;
        }

        .breadcrumb a {
            color: #0878e8;
            text-decoration: none;
        }

        .stat-card {
            background: white;
            padding: 22px 25px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            gap: 18px;
            width: 280px;
            max-width: 100%;
            box-shadow: 0 8px 25px rgba(40, 75, 130, 0.07);
            border: 1px solid #e5edfb;
            margin-bottom: 28px;
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            background: #e1efff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .stat-card p {
            font-size: 12px;
            color: #7a89a5;
        }

        .stat-card h2 {
            color: #0759c7;
            font-size: 28px;
            margin-top: 2px;
        }

        .table-card {
            background: white;
            border-radius: 18px;
            padding: 25px;
            box-shadow: 0 8px 30px rgba(40, 75, 130, 0.07);
            border: 1px solid #e5edfb;
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 22px;
        }

        .table-heading h2 {
            font-size: 20px;
            color: #17345f;
        }

        .table-heading p {
            color: #8390a9;
            font-size: 12px;
            margin-top: 5px;
        }

        .btn {
            display: inline-block;
            padding: 11px 17px;
            text-decoration: none;
            border-radius: 9px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-add {
            background: linear-gradient(135deg, #0878ed, #0759c7);
            color: white;
            box-shadow: 0 5px 12px rgba(8, 120, 237, 0.2);
        }

        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(8, 120, 237, 0.3);
        }

        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 700px;
        }

        thead {
            background: #eaf3ff;
        }

        th {
            color: #24558e;
            padding: 16px 14px;
            font-size: 12px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 15px 14px;
            font-size: 13px;
            border-bottom: 1px solid #edf1f8;
        }

        tbody tr:nth-child(even) {
            background: #f8fbff;
        }

        tbody tr:hover {
            background: #edf6ff;
        }

        .number {
            color: #8190aa;
            font-weight: 600;
        }

        .code-badge {
            display: inline-block;
            background: #dff8ef;
            color: #07835e;
            padding: 5px 11px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 700;
        }

        .airport-name {
            color: #243e65;
            font-weight: 600;
        }

        .city {
            color: #63728e;
        }

        .action {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        .btn-edit {
            background: #fff3d6;
            color: #b77900;
            padding: 7px 12px;
        }

        .btn-delete {
            background: #ffe5e7;
            color: #d83243;
            padding: 7px 12px;
        }

        .btn-edit:hover {
            background: #ffe6a8;
        }

        .btn-delete:hover {
            background: #ffcbd0;
        }

        .empty {
            text-align: center;
            padding: 45px 15px;
            color: #8090aa;
        }

        .empty div {
            font-size: 45px;
            margin-bottom: 12px;
        }

        .empty p {
            font-size: 13px;
            margin: 8px 0 18px;
        }

        .footer {
            text-align: center;
            color: #8b98af;
            padding: 25px 10px;
            font-size: 12px;
        }

        @media (max-width: 600px) {
            .header {
                padding: 28px 5%;
            }

            .header h1 {
                font-size: 23px;
            }

            .header::after {
                font-size: 85px;
                right: 2%;
                top: 15px;
            }

            .container {
                width: 94%;
                margin-top: 22px;
            }

            .table-card {
                padding: 17px;
            }

            .table-heading h2 {
                font-size: 17px;
            }

            .stat-card {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <small>✈ AIRPORT MANAGEMENT SYSTEM</small>
        <h1>SISTEM INFORMASI MANAJEMEN BANDARA</h1>
        <p>Kelola data bandara dengan mudah, cepat, dan terorganisir.</p>
    </header>

    <main class="container">

        <div class="breadcrumb">
            <a href="informasi_utama.php">Beranda</a>
            &nbsp; / &nbsp; Data Bandara
        </div>

        <section class="stat-card">
            <div class="stat-icon">🛫</div>
            <div>
                <p>Total Bandara Terdaftar</p>
                <h2><?php echo $total_bandara; ?></h2>
            </div>
        </section>

        <section class="table-card">

            <div class="table-heading">
                <div>
                    <h2>🏢 Data Bandara</h2>
                    <p>Daftar seluruh bandara yang tersimpan di sistem.</p>
                </div>

                <a href="tambah_bandara.php" class="btn btn-add">
                    + Tambah Data Bandara
                </a>
            </div>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Bandara</th>
                            <th>Kode Bandara</th>
                            <th>Nama Bandara</th>
                            <th>Kota</th>
                            <th>Tools</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $no = 1;

                    if ($total_bandara > 0) {
                        mysqli_data_seek($query, 0);

                        while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td class="number">
                                <?php echo $no++; ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($data['id_bandara']); ?>
                            </td>

                            <td>
                                <span class="code-badge">
                                    <?php echo htmlspecialchars($data['kode_bandara']); ?>
                                </span>
                            </td>

                            <td class="airport-name">
                                <?php echo htmlspecialchars($data['nama_bandara']); ?>
                            </td>

                            <td class="city">
                                📍 <?php echo htmlspecialchars($data['kota']); ?>
                            </td>

                            <td>
                                <div class="action">
                                    <a class="btn btn-edit"
                                       href="edit_bandara.php?id=<?php echo urlencode($data['id_bandara']); ?>">
                                        ✏ Edit
                                    </a>

                                    <a class="btn btn-delete"
                                       href="hapus_bandara.php?id=<?php echo urlencode($data['id_bandara']); ?>"
                                       onclick="return confirm('Yakin ingin menghapus data bandara ini?')">
                                        🗑 Hapus
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                    ?>
                        <tr>
                            <td colspan="6">
                                <div class="empty">
                                    <div>🛫</div>
                                    <strong>Belum Ada Data Bandara</strong>
                                    <p>Silakan tambahkan data bandara untuk mulai mengisi daftar.</p>
                                    <a href="tambah_bandara.php" class="btn btn-add">
                                        + Tambah Bandara Pertama
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </section>

        <div style="margin-top: 22px;">
            <a href="informasi_utama.php" class="btn"
               style="background:#dce9fa;color:#24558e;">
                ← Kembali ke Menu Utama
            </a>
        </div>

    </main>

    <footer class="footer">
        © <?php echo date('Y'); ?> Sistem Informasi Manajemen Bandara
        <br>Pelayanan Informasi Bandara
    </footer>

</body>
</html>
```