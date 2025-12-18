<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - SehatKita</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

            /* Background gambar */
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* NAVBAR */
        .header {
            background-color: #4caf50;
            padding: 15px 0;
        }

        .navbar {
            width: 85%;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: white;
        }

        .logo span {
            color: #f1c40f;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .nav-links li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 8px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .nav-links li a:hover {
            background: #f39c12;
            color: white;
        }

        /* KOTAK HALAMAN */
        .page {
            width: 450px;
            margin: 70px auto;
            padding: 25px 30px;
            background: rgba(255, 255, 255, 0.85);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            backdrop-filter: blur(3px);
            font-size: 18px;
            line-height: 1.7;
        }

        .page h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4caf50;
        }

        .page ul {
            padding-left: 20px;
        }

        .page ul li {
            margin-bottom: 10px;
        }

        /* FOOTER */
        footer {
            margin-top: 200px;
            background: #4caf50;
            color: white;
            text-align: center;
            padding: 7px 0;
        }
    </style>

</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">Sehat<span>Kita</span></div>
            <ul class="nav-links">
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="kontak.php">Kontak</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="page">
        <h2>Kontak Kami</h2>
        <p>Jika kamu perlu bantuan atau informasi lebih lanjut, silakan hubungi kami melalui:</p>

        <ul>
            <li>Email: sehatkita@gmail.com</li>
            <li>Instagram: @sehatkita.id</li>
            <li>Telepon/WA: 0895621708800</li>
        </ul>
    </section>

    <footer>
        <p>© 2025 SehatKita | Kelompok 2 - Pemrograman Web</p>
    </footer>
</body>
</html>