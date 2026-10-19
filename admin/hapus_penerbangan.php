<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,

    "DELETE FROM penerbangan
     WHERE id_penerbangan='$id'"

);

if ($query) {

    header("Location: data_penerbangan.php");

} else {

    echo "Data gagal dihapus";

}

?>