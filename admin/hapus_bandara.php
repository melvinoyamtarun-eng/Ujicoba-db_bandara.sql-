<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,
    "DELETE FROM bandara
     WHERE id_bandara='$id'"
);

if ($query) {
    header("Location: data_bandara.php");
} else {
    echo "Data gagal dihapus";
}

?>