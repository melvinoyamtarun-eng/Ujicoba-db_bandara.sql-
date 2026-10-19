<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "SELECT * FROM maskapai
     WHERE id_maskapai='$id'"
);

$data = mysqli_fetch_array($query);

if (isset($_POST['btnSimpan'])) {

    $kode_maskapai = $_POST['kode_maskapai'];
    $nama_maskapai = $_POST['nama_maskapai'];

    mysqli_query($koneksi,
        "UPDATE maskapai SET
        kode_maskapai='$kode_maskapai',
        nama_maskapai='$nama_maskapai'
        WHERE id_maskapai='$id'"
    );

    echo "<script>
            alert('Data berhasil diubah');
            window.location='data_maskapai.php';
          </script>";
}

?>

<h1>Edit Data Maskapai</h1>

<form method="post">

<table>

<tr>
    <td>Kode Maskapai</td>
    <td>
        <input type="text"
               name="kode_maskapai"
               value="<?php echo $data['kode_maskapai']; ?>"
               required>
    </td>
</tr>

<tr>
    <td>Nama Maskapai</td>
    <td>
        <input type="text"
               name="nama_maskapai"
               value="<?php echo $data['nama_maskapai']; ?>"
               required>
    </td>
</tr>

<tr>
    <td></td>
    <td>
        <button type="submit" name="btnSimpan">
            Simpan Perubahan
        </button>
    </td>
</tr>

</table>

</form>