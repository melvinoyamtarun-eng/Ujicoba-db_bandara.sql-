<?php

include_once "../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {

    $kode_penerbangan = $_POST['kode_penerbangan'];
    $id_maskapai = $_POST['id_maskapai'];
    $id_bandara_asal = $_POST['id_bandara_asal'];
    $id_bandara_tujuan = $_POST['id_bandara_tujuan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $terminal = $_POST['terminal'];
    $status = $_POST['status'];

    $query = mysqli_query($koneksi,

        "INSERT INTO penerbangan
        (
            kode_penerbangan,
            id_maskapai,
            id_bandara_asal,
            id_bandara_tujuan,
            tanggal,
            jam,
            terminal,
            status
        )

        VALUES
        (
            '$kode_penerbangan',
            '$id_maskapai',
            '$id_bandara_asal',
            '$id_bandara_tujuan',
            '$tanggal',
            '$jam',
            '$terminal',
            '$status'
        )"

    );

    if ($query) {

        echo "<script>
                alert('Data penerbangan berhasil disimpan');
                window.location='data_penerbangan.php';
              </script>";

    } else {

        echo "Gagal menyimpan data : "
             . mysqli_error($koneksi);

    }
}

?>

<h1>Tambah Data Penerbangan</h1>

<form method="post">

<table>

<tr>
    <td>Kode Penerbangan</td>

    <td>
        <input type="text"
               name="kode_penerbangan"
               placeholder="Contoh: GA-123"
               required>
    </td>
</tr>


<tr>
    <td>Maskapai</td>

    <td>

        <select name="id_maskapai" required>

            <option value="">
                - Pilih Maskapai -
            </option>

            <?php

            $maskapai = mysqli_query($koneksi,
                "SELECT * FROM maskapai
                 ORDER BY nama_maskapai ASC"
            );

            while ($m = mysqli_fetch_array($maskapai)) {

            ?>

            <option value="<?php echo $m['id_maskapai']; ?>">

                <?php
                echo $m['kode_maskapai']
                     . " - "
                     . $m['nama_maskapai'];
                ?>

            </option>

            <?php

            }

            ?>

        </select>

    </td>
</tr>


<tr>
    <td>Bandara Asal</td>

    <td>

        <select name="id_bandara_asal" required>

            <option value="">
                - Pilih Bandara Asal -
            </option>

            <?php

            $bandara = mysqli_query($koneksi,
                "SELECT * FROM bandara
                 ORDER BY nama_bandara ASC"
            );

            while ($b = mysqli_fetch_array($bandara)) {

            ?>

            <option value="<?php echo $b['id_bandara']; ?>">

                <?php
                echo $b['kode_bandara']
                     . " - "
                     . $b['nama_bandara']
                     . " (" . $b['kota'] . ")";
                ?>

            </option>

            <?php

            }

            ?>

        </select>

    </td>
</tr>


<tr>
    <td>Bandara Tujuan</td>

    <td>

        <select name="id_bandara_tujuan" required>

            <option value="">
                - Pilih Bandara Tujuan -
            </option>

            <?php

            $bandara = mysqli_query($koneksi,
                "SELECT * FROM bandara
                 ORDER BY nama_bandara ASC"
            );

            while ($b = mysqli_fetch_array($bandara)) {

            ?>

            <option value="<?php echo $b['id_bandara']; ?>">

                <?php
                echo $b['kode_bandara']
                     . " - "
                     . $b['nama_bandara']
                     . " (" . $b['kota'] . ")";
                ?>

            </option>

            <?php

            }

            ?>

        </select>

    </td>
</tr>


<tr>
    <td>Tanggal</td>

    <td>
        <input type="date"
               name="tanggal"
               required>
    </td>
</tr>


<tr>
    <td>Jam</td>

    <td>
        <input type="time"
               name="jam"
               required>
    </td>
</tr>


<tr>
    <td>Terminal</td>

    <td>
        <input type="text"
               name="terminal"
               placeholder="Contoh: 1A"
               required>
    </td>
</tr>


<tr>
    <td>Status</td>

    <td>

        <select name="status" required>

            <option value="Terjadwal">
                Terjadwal
            </option>

            <option value="Boarding">
                Boarding
            </option>

            <option value="Berangkat">
                Berangkat
            </option>

            <option value="Selesai">
                Selesai
            </option>

            <option value="Ditunda">
                Ditunda
            </option>

            <option value="Dibatalkan">
                Dibatalkan
            </option>

        </select>

    </td>
</tr>


<tr>

    <td></td>

    <td>

        <button type="submit"
                name="btnSimpan">
            Simpan
        </button>

        <a href="data_penerbangan.php">
            Batal
        </a>

    </td>

</tr>

</table>

</form>