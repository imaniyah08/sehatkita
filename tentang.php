<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang SehatKita</title>

    <style>
        body {
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* NAVBAR */
        .header {
            background-color: #4caf50;
            padding: 10px 0;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 85%;
            margin: auto;
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
            font-size: 16px;
            color: white;
            padding: 8px 14px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .nav-links li a:hover {
            background-color: #f39c12;
            color: white;
        }

        /* KOTAK VERTIKAL */
        .page {
            width: 450px; /* KOTAK TIDAK LEBAR */
            margin: 60px auto;
            padding: 25px 30px;
            font-size: 18px;
            line-height: 1.7;

            background: rgba(255, 255, 255, 0.85);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            backdrop-filter: blur(3px);
        }

        .page h2 {
            font-size: 32px;
            margin-bottom: 18px;
            color: #4caf50;
            text-align: center;
        }

        /* FOOTER */
        footer {
            margin-top: 150px;
            background-color: #4caf50;
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
        <h2>Tentang SehatKita</h2>
        <p>
            SehatKita adalah platform informasi kesehatan yang membantu masyarakat 
            mendapatkan edukasi tentang gaya hidup sehat, nutrisi, olahraga, dan 
            pemantauan status kesehatan melalui kalkulator BMI. 
            Dibangun sebagai proyek pembelajaran Pemrograman Web, 
            platform ini dikembangkan dengan fokus pada kemudahan akses, keakuratan informasi, 
            dan tampilan yang ramah pengguna.
        </p>
    </section>

    <footer>
        <p>© 2025 SehatKita | Kelompok 2 - Pemrograman Web</p>
    </footer>
</body>
</html>