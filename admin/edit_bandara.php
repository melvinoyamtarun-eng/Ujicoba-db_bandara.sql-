<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "SELECT * FROM bandara
     WHERE id_bandara='$id'"
);

$data = mysqli_fetch_array($query);

if (isset($_POST['btnSimpan'])) {

    $kode_bandara = $_POST['kode_bandara'];
    $nama_bandara = $_POST['nama_bandara'];
    $kota = $_POST['kota'];

    mysqli_query($koneksi,
        "UPDATE bandara SET
        kode_bandara='$kode_bandara',
        nama_bandara='$nama_bandara',
        kota='$kota'
        WHERE id_bandara='$id'"
    );

    echo "<script>
            alert('Data berhasil diubah');
            window.location='data_bandara.php';
          </script>";
}

?>

<h1>Edit Data Bandara</h1>

<form method="post">

<table>

<tr>
    <td>Kode Bandara</td>
    <td>
        <input type="text"
               name="kode_bandara"
               value="<?php echo $data['kode_bandara']; ?>"
               required>
    </td>
</tr>

<tr>
    <td>Nama Bandara</td>
    <td>
        <input type="text"
               name="nama_bandara"
               value="<?php echo $data['nama_bandara']; ?>"
               required>
    </td>
</tr>

<tr>
    <td>Kota</td>
    <td>
        <input type="text"
               name="kota"
               value="<?php echo $data['kota']; ?>"
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