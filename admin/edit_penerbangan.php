<?php

include_once "../src/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($koneksi,

    "SELECT * FROM penerbangan
     WHERE id_penerbangan='$id'"

);

$data = mysqli_fetch_array($query);


if (isset($_POST['btnSimpan'])) {

    $kode_penerbangan = $_POST['kode_penerbangan'];
    $id_maskapai = $_POST['id_maskapai'];
    $id_bandara_asal = $_POST['id_bandara_asal'];
    $id_bandara_tujuan = $_POST['id_bandara_tujuan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $terminal = $_POST['terminal'];
    $status = $_POST['status'];

    mysqli_query($koneksi,

        "UPDATE penerbangan SET

        kode_penerbangan='$kode_penerbangan',
        id_maskapai='$id_maskapai',
        id_bandara_asal='$id_bandara_asal',
        id_bandara_tujuan='$id_bandara_tujuan',
        tanggal='$tanggal',
        jam='$jam',
        terminal='$terminal',
        status='$status'

        WHERE id_penerbangan='$id'"

    );

    echo "<script>
            alert('Data berhasil diubah');
            window.location='data_penerbangan.php';
          </script>";
}

?>

<h1>Edit Data Penerbangan</h1>

<form method="post">

<table>

<tr>
    <td>Kode Penerbangan</td>

    <td>
        <input type="text"
               name="kode_penerbangan"
               value="<?php echo $data['kode_penerbangan']; ?>"
               required>
    </td>
</tr>


<tr>
    <td>Maskapai</td>

    <td>

        <select name="id_maskapai" required>

            <?php

            $maskapai = mysqli_query($koneksi,
                "SELECT * FROM maskapai
                 ORDER BY nama_maskapai ASC"
            );

            while ($m = mysqli_fetch_array($maskapai)) {

                $selected = "";

                if ($m['id_maskapai'] ==
                    $data['id_maskapai']) {

                    $selected = "selected";
                }

            ?>

            <option
                value="<?php echo $m['id_maskapai']; ?>"
                <?php echo $selected; ?>>

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

            <?php

            $bandara = mysqli_query($koneksi,
                "SELECT * FROM bandara
                 ORDER BY nama_bandara ASC"
            );

            while ($b = mysqli_fetch_array($bandara)) {

                $selected = "";

                if ($b['id_bandara'] ==
                    $data['id_bandara_asal']) {

                    $selected = "selected";
                }

            ?>

            <option
                value="<?php echo $b['id_bandara']; ?>"
                <?php echo $selected; ?>>

                <?php
                echo $b['kode_bandara']
                     . " - "
                     . $b['nama_bandara'];
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

            <?php

            $bandara = mysqli_query($koneksi,
                "SELECT * FROM bandara
                 ORDER BY nama_bandara ASC"
            );

            while ($b = mysqli_fetch_array($bandara)) {

                $selected = "";

                if ($b['id_bandara'] ==
                    $data['id_bandara_tujuan']) {

                    $selected = "selected";
                }

            ?>

            <option
                value="<?php echo $b['id_bandara']; ?>"
                <?php echo $selected; ?>>

                <?php
                echo $b['kode_bandara']
                     . " - "
                     . $b['nama_bandara'];
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
               value="<?php echo $data['tanggal']; ?>"
               required>
    </td>
</tr>


<tr>
    <td>Jam</td>

    <td>
        <input type="time"
               name="jam"
               value="<?php echo $data['jam']; ?>"
               required>
    </td>
</tr>


<tr>
    <td>Terminal</td>

    <td>
        <input type="text"
               name="terminal"
               value="<?php echo $data['terminal']; ?>"
               required>
    </td>
</tr>


<tr>
    <td>Status</td>

    <td>

        <select name="status">

            <?php

            $status = [
                "Terjadwal",
                "Boarding",
                "Berangkat",
                "Selesai",
                "Ditunda",
                "Dibatalkan"
            ];

            foreach ($status as $s) {

                $selected = "";

                if ($s == $data['status']) {
                    $selected = "selected";
                }

                echo "<option value='$s' $selected>
                        $s
                      </option>";
            }

            ?>

        </select>

    </td>
</tr>


<tr>
    <td></td>

    <td>

        <button type="submit"
                name="btnSimpan">
            Simpan Perubahan
        </button>

        <a href="data_penerbangan.php">
            Batal
        </a>

    </td>
</tr>

</table>

</form>