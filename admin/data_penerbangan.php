<?php
include_once "../src/koneksi.php";

$query = mysqli_query($koneksi, "
    SELECT
        p.*,
        m.nama_maskapai,
        a.nama_bandara AS bandara_asal,
        t.nama_bandara AS bandara_tujuan
    FROM penerbangan p
    INNER JOIN maskapai m
        ON p.id_maskapai = m.id_maskapai
    INNER JOIN bandara a
        ON p.id_bandara_asal = a.id_bandara
    INNER JOIN bandara t
        ON p.id_bandara_tujuan = t.id_bandara
    ORDER BY p.tanggal ASC, p.jam ASC
");

if (!$query) {
    echo '<div class="flight-error">Database error: '
        . htmlspecialchars(mysqli_error($koneksi))
        . '</div>';
    return;
}

$total = mysqli_num_rows($query);
?>

<style>
.flight-page {
    font-family: Arial, sans-serif;
    color: #243650;
    padding: 25px;
    background: #f1f6fc;
    min-height: 80vh;
    border-radius: 15px;
}

.flight-hero {
    padding: 30px;
    border-radius: 16px;
    color: white;
    background: linear-gradient(120deg, #103568, #168bd2);
    margin-bottom: 24px;
    box-shadow: 0 8px 20px rgba(16, 53, 104, .15);
}

.flight-hero h1 {
    margin: 0 0 10px;
    font-size: 29px;
}

.flight-hero p {
    margin: 0;
    line-height: 1.7;
    color: #e2f2ff;
}

.flight-stats {
    display: flex;
    gap: 18px;
    margin-bottom: 24px;
}

.flight-stat {
    flex: 1;
    padding: 22px;
    background: white;
    border-radius: 13px;
    border: 1px solid #e0eaf5;
    box-shadow: 0 4px 15px rgba(30, 60, 100, .05);
}

.flight-stat span {
    display: block;
    color: #71839b;
    font-size: 13px;
    margin-bottom: 9px;
}

.flight-stat strong {
    font-size: 27px;
    color: #1769bd;
}

.flight-card {
    background: white;
    border-radius: 15px;
    padding: 23px;
    box-shadow: 0 5px 20px rgba(30, 60, 100, .06);
    border: 1px solid #e3ebf5;
}

.flight-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 22px;
}

.flight-heading h2 {
    margin: 0 0 7px;
    font-size: 21px;
    color: #173d6d;
}

.flight-heading p {
    margin: 0;
    color: #8391a5;
    font-size: 13px;
}

.flight-btn {
    display: inline-block;
    padding: 12px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: bold;
    border: none;
    cursor: pointer;
}

.flight-add {
    color: white;
    background: #1476cf;
}

.flight-add:hover {
    background: #0d5599;
}

.flight-back {
    background: #e7f1fc;
    color: #175da4;
}

.flight-search {
    width: 100%;
    max-width: 360px;
    padding: 12px 14px;
    border: 1px solid #d7e3f1;
    border-radius: 8px;
    font-size: 13px;
    outline: none;
    box-sizing: border-box;
}

.flight-search:focus {
    border-color: #168bd2;
    box-shadow: 0 0 0 3px rgba(22, 139, 210, .12);
}

.flight-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-bottom: 18px;
}

.flight-table-wrap {
    width: 100%;
    overflow-x: auto;
    border-radius: 10px;
    border: 1px solid #e0e9f4;
}

.flight-table {
    width: 100%;
    min-width: 1050px;
    border-collapse: collapse;
    font-size: 13px;
}

.flight-table thead {
    background: #173e6e;
    color: white;
}

.flight-table th {
    padding: 16px 13px;
    text-align: left;
    white-space: nowrap;
}

.flight-table td {
    padding: 15px 13px;
    border-bottom: 1px solid #eaf0f7;
    white-space: nowrap;
}

.flight-table tbody tr:nth-child(even) {
    background: #f5f9fe;
}

.flight-table tbody tr:hover {
    background: #e6f3ff;
}

.flight-code {
    color: #1469bd;
    font-weight: bold;
}

.flight-airport {
    color: #35516f;
    font-weight: bold;
}

.flight-badge {
    display: inline-block;
    padding: 7px 10px;
    border-radius: 20px;
    background: #dff7e8;
    color: #147c43;
    font-weight: bold;
    font-size: 11px;
}

.flight-delay {
    background: #fff0cf;
    color: #9a6500;
}

.flight-cancel {
    background: #ffe2e4;
    color: #c12735;
}

.flight-other {
    background: #e5ecff;
    color: #3656a6;
}

.flight-actions {
    display: flex;
    gap: 7px;
}

.flight-edit,
.flight-delete {
    display: inline-block;
    padding: 8px 10px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    font-size: 12px;
}

.flight-edit {
    background: #e0efff;
    color: #1769bd;
}

.flight-delete {
    background: #ffe6e6;
    color: #c72e3b;
}

.flight-empty {
    padding: 35px !important;
    text-align: center;
    color: #7d8ca1;
}

.flight-error {
    background: #ffe6e6;
    color: #a51f2b;
    padding: 20px;
    border-radius: 10px;
    font-family: Arial, sans-serif;
    overflow-wrap: anywhere;
}

.flight-footer {
    text-align: center;
    margin-top: 22px;
    font-size: 12px;
    color: #8492a6;
}

@media (max-width: 650px) {
    .flight-page {
        padding: 12px;
    }

    .flight-hero {
        padding: 23px;
    }

    .flight-hero h1 {
        font-size: 23px;
    }

    .flight-stats {
        flex-direction: column;
    }

    .flight-card {
        padding: 14px;
    }
}
</style>

<div class="flight-page">

    <div class="flight-hero">
        <h1>✈ DATA PENERBANGAN</h1>
        <p>
            Sistem Informasi Manajemen Bandara<br>
            Kelola jadwal, rute, maskapai, dan status penerbangan.
        </p>
    </div>

    <div class="flight-stats">
        <div class="flight-stat">
            <span>✈ TOTAL PENERBANGAN</span>
            <strong><?php echo $total; ?></strong>
        </div>

        <div class="flight-stat">
            <span>🛫 BANDARA ASAL</span>
            <strong>RUTE</strong>
        </div>

        <div class="flight-stat">
            <span>🛬 BANDARA TUJUAN</span>
            <strong>JADWAL</strong>
        </div>
    </div>

    <div class="flight-card">

        <div class="flight-heading">
            <div>
                <h2>Daftar Jadwal Penerbangan</h2>
                <p>Informasi penerbangan yang tersimpan di database.</p>
            </div>

            <a href="tambah_penerbangan.php"
               class="flight-btn flight-add">
                + Tambah Penerbangan
            </a>
        </div>

        <div class="flight-toolbar">
            <input
                type="text"
                id="flightSearch"
                class="flight-search"
                placeholder="🔍 Cari penerbangan..."
            >

            <a href="informasi_utama.php"
               class="flight-btn flight-back">
                ← Menu Utama
            </a>
        </div>

        <div class="flight-table-wrap">
            <table class="flight-table" id="flightTable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Penerbangan</th>
                        <th>Maskapai</th>
                        <th>Bandara Asal</th>
                        <th>Bandara Tujuan</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Terminal</th>
                        <th>Status</th>
                        <th>Tools</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                $no = 1;

                if ($total > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                        $statusAsli = $data['status'] ?? '';
                        $status = strtolower(trim($statusAsli));

                        if (
                            strpos($status, 'batal') !== false ||
                            strpos($status, 'cancel') !== false
                        ) {
                            $badge = 'flight-cancel';
                        } elseif (
                            strpos($status, 'delay') !== false ||
                            strpos($status, 'tunda') !== false ||
                            strpos($status, 'terlambat') !== false
                        ) {
                            $badge = 'flight-delay';
                        } elseif (
                            strpos($status, 'tepat waktu') !== false ||
                            strpos($status, 'berangkat') !== false ||
                            strpos($status, 'tiba') !== false ||
                            strpos($status, 'sesuai jadwal') !== false
                        ) {
                            $badge = '';
                        } else {
                            $badge = 'flight-other';
                        }
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>

                        <td class="flight-code">
                            <?php echo htmlspecialchars($data['kode_penerbangan'] ?? ''); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($data['nama_maskapai'] ?? ''); ?>
                        </td>

                        <td class="flight-airport">
                            🛫 <?php echo htmlspecialchars($data['bandara_asal'] ?? ''); ?>
                        </td>

                        <td class="flight-airport">
                            🛬 <?php echo htmlspecialchars($data['bandara_tujuan'] ?? ''); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($data['tanggal'] ?? ''); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($data['jam'] ?? ''); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($data['terminal'] ?? ''); ?>
                        </td>

                        <td>
                            <span class="flight-badge <?php echo $badge; ?>">
                                <?php echo htmlspecialchars($statusAsli); ?>
                            </span>
                        </td>

                        <td>
                            <div class="flight-actions">
                                <a class="flight-edit"
                                   href="edit_penerbangan.php?id=<?php echo urlencode($data['id_penerbangan']); ?>">
                                    Edit
                                </a>

                                <a class="flight-delete"
                                   href="hapus_penerbangan.php?id=<?php echo urlencode($data['id_penerbangan']); ?>"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="10" class="flight-empty">
                            Belum ada data penerbangan. Klik
                            "+ Tambah Penerbangan" untuk menambahkan data.
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="flight-footer">
        Sistem Informasi Manajemen Bandara &copy; <?php echo date('Y'); ?>
    </div>

</div>

<script>
(function () {
    var search = document.getElementById('flightSearch');
    var table = document.getElementById('flightTable');

    if (!search || !table) return;

    search.addEventListener('input', function () {
        var keyword = this.value.toLowerCase();
        var rows = table.querySelectorAll('tbody tr');

        rows.forEach(function (row) {
            row.style.display =
                row.innerText.toLowerCase().includes(keyword) ? '' : 'none';
        });
    });
})();
</script>
