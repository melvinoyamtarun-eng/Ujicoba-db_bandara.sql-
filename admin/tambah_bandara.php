<?php

include_once "../src/koneksi.php";

if (isset($_POST['btnSimpan'])) {

    $kode_bandara = $_POST['kode_bandara'];
    $nama_bandara = $_POST['nama_bandara'];
    $kota = $_POST['kota'];

    $query = mysqli_query($koneksi,
        "INSERT INTO bandara
        (kode_bandara, nama_bandara, kota)
        VALUES
        ('$kode_bandara', '$nama_bandara', '$kota')"
    );

    if ($query) {
        echo "<script>
                alert('Data bandara berhasil disimpan');
                window.location='data_bandara.php';
              </script>";
    } else {
        echo "Data gagal disimpan : " . mysqli_error($koneksi);
    }
}

?>

<h1>Tambah Data Bandara</h1>

<form method="post">

<table>

<tr>
    <td>Kode Bandara</td>
    <td>
        <input type="text" name="kode_bandara" required>
    </td>
</tr>

<tr>
    <td>Nama Bandara</td>
    <td>
        <input type="text" name="nama_bandara" required>
    </td>
</tr>

<tr>
    <td>Kota</td>
    <td>
        <input type="text" name="kota" required>
    </td>
</tr>

<tr>
    <td></td>
    <td>
        <button type="submit" name="btnSimpan">
            Simpan
        </button>

        <a href="data_bandara.php">
            Batal
        </a>
    </td>
</tr>

</table>

</form>