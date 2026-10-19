<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Sistem Informasi Bandara</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body {
        background: #f4f7fb;
        color: #1f2937;
    }

    /* HEADER */
    header {
        background: linear-gradient(135deg, #003b73, #0074b7);
        color: white;
        padding: 20px 7%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .logo-icon {
        width: 50px;
        height: 50px;
        background: white;
        color: #0066a1;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 25px;
    }

    .logo h2 {
        font-size: 20px;
        letter-spacing: 1px;
    }

    .logo p {
        font-size: 12px;
        opacity: 0.85;
        margin-top: 4px;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin-left: 25px;
        font-size: 14px;
        font-weight: bold;
    }

    nav a:hover {
        color: #bde7ff;
    }

    /* HERO */
    .hero {
        min-height: 390px;
        background:
            linear-gradient(rgba(0, 42, 80, 0.72), rgba(0, 76, 130, 0.65)),
            url("https://images.unsplash.com/photo-1436491865332-7a61a109cc05?auto=format&fit=crop&w=1600&q=80");

        background-size: cover;
        background-position: center;

        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 40px 20px;
    }

    .hero-content {
        max-width: 800px;
    }

    .hero h1 {
        font-size: 44px;
        margin-bottom: 15px;
        letter-spacing: 1px;
    }

    .hero p {
        font-size: 17px;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .btn {
        display: inline-block;
        background: #ffffff;
        color: #0066a1;
        text-decoration: none;
        padding: 13px 28px;
        border-radius: 30px;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn:hover {
        background: #dff4ff;
        transform: translateY(-2px);
    }

    /* SEARCH */
    .search-box {
        width: 86%;
        max-width: 1100px;
        margin: -45px auto 40px;
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.12);
        position: relative;
    }

    .search-title {
        font-size: 20px;
        color: #003b73;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .search-form {
        display: flex;
        gap: 12px;
    }

    .search-form input {
        flex: 1;
        padding: 14px;
        border: 1px solid #d5dce5;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
    }

    .search-form input:focus {
        border-color: #0074b7;
    }

    .search-form button {
        background: #0066a1;
        color: white;
        border: none;
        padding: 0 25px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
    }

    .search-form button:hover {
        background: #004b78;
    }

    /* MENU */
    .container {
        width: 86%;
        max-width: 1100px;
        margin: auto;
    }

    .section-title {
        text-align: center;
        margin-bottom: 30px;
    }

    .section-title h2 {
        color: #003b73;
        font-size: 28px;
        margin-bottom: 8px;
    }

    .section-title p {
        color: #6b7280;
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 50px;
    }

    .card {
        background: white;
        border-radius: 15px;
        padding: 30px 25px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: 0.3s;
        border-top: 4px solid #0074b7;
    }

    .card:hover {
        transform: translateY(-7px);
        box-shadow: 0 12px 30px rgba(0,0,0,0.14);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        margin: auto auto 18px;
        border-radius: 50%;
        background: #e6f4fb;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 32px;
    }

    .card h3 {
        color: #003b73;
        margin-bottom: 10px;
    }

    .card p {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .card a {
        display: inline-block;
        background: #0066a1;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 7px;
        font-size: 13px;
        font-weight: bold;
    }

    .card a:hover {
        background: #004b78;
    }

    /* FLIGHT STATUS */
    .flight-section {
        background: #003b73;
        color: white;
        padding: 45px 7%;
        margin-top: 20px;
    }

    .flight-content {
        max-width: 1100px;
        margin: auto;
    }

    .flight-title {
        text-align: center;
        margin-bottom: 25px;
    }

    .flight-title h2 {
        font-size: 27px;
        margin-bottom: 8px;
    }

    .flight-title p {
        opacity: 0.8;
    }

    .flight-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        color: #1f2937;
        border-radius: 10px;
        overflow: hidden;
    }

    .flight-table th {
        background: #0074b7;
        color: white;
        padding: 15px;
        text-align: left;
    }

    .flight-table td {
        padding: 14px 15px;
        border-bottom: 1px solid #e5e7eb;
    }

    .status {
        color: #15803d;
        font-weight: bold;
    }

    /* FOOTER */
    footer {
        background: #002b50;
        color: white;
        padding: 30px 7%;
    }

    .footer-content {
        max-width: 1100px;
        margin: auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer-content p {
        font-size: 13px;
        opacity: 0.8;
    }

    .footer-menu a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-size: 13px;
    }

    .footer-menu a:hover {
        color: #9ddcff;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {

        header {
            flex-direction: column;
            gap: 15px;
        }

        nav a {
            margin: 0 7px;
            font-size: 12px;
        }

        .hero h1 {
            font-size: 32px;
        }

        .hero p {
            font-size: 14px;
        }

        .search-form {
            flex-direction: column;
        }

        .search-form button {
            padding: 13px;
        }

        .cards {
            grid-template-columns: 1fr;
        }

        .flight-table {
            font-size: 12px;
        }

        .flight-table th,
        .flight-table td {
            padding: 10px;
        }

        .footer-content {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .footer-menu a {
            margin: 0 8px;
        }
    }
</style>
```

</head>

<body>

<!-- HEADER -->

<header>

```
<div class="logo">

    <div class="logo-icon">
        ✈
    </div>

    <div>
        <h2>BANDARA INDONESIA</h2>
        <p>Sistem Informasi Manajemen Bandara</p>
    </div>

</div>

<nav>
    <a href="data_bandara.php">Bandara</a>
    <a href="data_maskapai.php">Maskapai</a>
    <a href="data_penerbangan.php">Penerbangan</a>
</nav>
```

</header>

<!-- HERO -->

<section class="hero">

```
<div class="hero-content">

    <h1>Selamat Datang di Bandara</h1>

    <p>
        Pusat informasi penerbangan yang membantu Anda
        mendapatkan informasi bandara, maskapai, dan jadwal
        penerbangan dengan cepat dan mudah.
    </p>

    <a href="data_penerbangan.php" class="btn">
        Lihat Penerbangan
    </a>

</div>
```

</section>

<!-- SEARCH -->

<div class="search-box">

```
<div class="search-title">
    🔎 Cari Informasi Penerbangan
</div>

<form class="search-form" action="data_penerbangan.php" method="get">

    <input
        type="text"
        name="cari"
        placeholder="Masukkan nomor penerbangan, maskapai, atau tujuan..."
    >

    <button type="submit">
        CARI
    </button>

</form>
```

</div>

<!-- MENU UTAMA -->

<div class="container">

```
<div class="section-title">

    <h2>Layanan Informasi</h2>

    <p>
        Pilih layanan yang ingin Anda akses
    </p>

</div>


<div class="cards">

    <!-- BANDARA -->
    <div class="card">

        <div class="card-icon">
            🏢
        </div>

        <h3>Data Bandara</h3>

        <p>
            Informasi mengenai data bandara,
            lokasi, kode bandara, dan informasi
            lainnya.
        </p>

        <a href="data_bandara.php">
            Lihat Data
        </a>

    </div>


    <!-- MASKAPAI -->
    <div class="card">

        <div class="card-icon">
            ✈️
        </div>

        <h3>Data Maskapai</h3>

        <p>
            Informasi maskapai penerbangan
            yang tersedia dalam sistem.
        </p>

        <a href="data_maskapai.php">
            Lihat Data
        </a>

    </div>


    <!-- PENERBANGAN -->
    <div class="card">

        <div class="card-icon">
            🛫
        </div>

        <h3>Data Penerbangan</h3>

        <p>
            Lihat informasi penerbangan,
            jadwal, asal, tujuan, dan maskapai.
        </p>

        <a href="data_penerbangan.php">
            Lihat Data
        </a>

    </div>

</div>
```

</div>

<!-- STATUS PENERBANGAN -->

<section class="flight-section">

```
<div class="flight-content">

    <div class="flight-title">

        <h2>✈ Status Penerbangan</h2>

        <p>
            Informasi penerbangan yang tersedia dalam sistem
        </p>

    </div>


    <table class="flight-table">

        <tr>
            <th>No</th>
            <th>Nomor Penerbangan</th>
            <th>Maskapai</th>
            <th>Tujuan</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>1</td>
            <td>GA-123</td>
            <td>Garuda Indonesia</td>
            <td>Jakarta</td>
            <td class="status">● Terjadwal</td>
        </tr>

        <tr>
            <td>2</td>
            <td>JT-456</td>
            <td>Lion Air</td>
            <td>Surabaya</td>
            <td class="status">● Terjadwal</td>
        </tr>

        <tr>
            <td>3</td>
            <td>QZ-789</td>
            <td>AirAsia</td>
            <td>Bali</td>
            <td class="status">● Terjadwal</td>
        </tr>

    </table>

</div>
```

</section>

<!-- FOOTER -->

<footer>

```
<div class="footer-content">

    <p>
        © 2026 Sistem Informasi Manajemen Bandara
    </p>

    <div class="footer-menu">
        <a href="data_bandara.php">Bandara</a>
        <a href="data_maskapai.php">Maskapai</a>
        <a href="data_penerbangan.php">Penerbangan</a>
    </div>

</div>
```

</footer>

</body>
</html>
