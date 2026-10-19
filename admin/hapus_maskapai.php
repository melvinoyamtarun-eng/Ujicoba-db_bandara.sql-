<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "DELETE FROM maskapai
     WHERE id_maskapai='$id'"
);

if ($query) {
    header("Location: data_maskapai.php");
} else {
    echo "Data gagal dihapus";
}

?>