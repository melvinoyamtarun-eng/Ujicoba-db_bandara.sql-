<?php

include_once "../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {

    $kode_maskapai = $_POST['kode_maskapai'];
    $nama_maskapai = $_POST['nama_maskapai'];

    $query = mysqli_query($koneksi,
        "INSERT INTO maskapai
        (kode_maskapai, nama_maskapai)
        VALUES
        ('$kode_maskapai', '$nama_maskapai')"
    );

    if ($query) {
        echo "<script>
                alert('Data maskapai berhasil disimpan');
                window.location='data_maskapai.php';
              </script>";
    } else {
        echo "Gagal menyimpan data";
    }
}

?>

<h1>Tambah Data Maskapai</h1>

<form method="post">

<table>

<tr>
    <td>Kode Maskapai</td>
    <td>
        <input type="text" name="kode_maskapai" required>
    </td>
</tr>

<tr>
    <td>Nama Maskapai</td>
    <td>
        <input type="text" name="nama_maskapai" required>
    </td>
</tr>

<tr>
    <td></td>
    <td>
        <button type="submit" name="btnSimpan">
            Simpan
        </button>

        <a href="data_maskapai.php">Batal</a>
    </td>
</tr>

</table>

</form>