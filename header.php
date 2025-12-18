<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SehatKita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="header">
        <nav class="navbar">
            <div class="logo">Sehat<span>Kita</span></div>
            <ul class="nav-links">
                
                <?php 
                // --- LOGIKA PENENTUAN LINK (DITARUH DI SINI BIAR RAPI) ---
                
                // 1. Link Dashboard/Beranda
                $link_dashboard = "index.php"; // Default buat tamu
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin') {
                        $link_dashboard = "admin_dashboard.php";
                    } else {
                        $link_dashboard = "user_dashboard.php";
                    }
                }

                // 2. Link Artikel
                // Default buat tamu (ke login dulu kalau mau baca lengkap)
                $link_artikel = "login.php"; 
                if (isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'admin') {
                        // Admin ke dashboard admin bagian bawah
                        $link_artikel = "admin_dashboard.php#area-artikel";
                    } else {
                        // User ke dashboard user bagian bawah
                        $link_artikel = "user_dashboard.php#area-artikel";
                    }
                }
                ?>

                <li><a href="<?php echo $link_dashboard; ?>">Dashboard</a></li>
                
                <li><a href="<?php echo $link_artikel; ?>">Artikel</a></li>
                
                <li><a href="bmi.php">Kalkulator BMI</a></li>

                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <li><a href="tambah_artikel.php" style="color: #e67e22; font-weight: bold;">+ Upload</a></li>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])): ?>
                    <li><a href="logout.php" class="btn-login btn-red">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php" class="btn-login">Login</a></li>
                <?php endif; ?>

            </ul>
        </nav>
    </header>