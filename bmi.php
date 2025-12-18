<?php
session_start();

// Cek Login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// Inisialisasi Variabel
$hasil = "";
$status = "";
$warna_status = "";
$penyebab = "";
$solusi = "";
$rekomendasi = "";

// LOGIKA HITUNG
if (isset($_POST['hitung'])) {
    $berat = $_POST['berat'];
    $tinggi = $_POST['tinggi'];

    if ($berat > 0 && $tinggi > 0) {
        $tinggi_meter = $tinggi / 100; 
        $bmi = $berat / ($tinggi_meter * $tinggi_meter);
        $hasil = number_format($bmi, 1);

        if ($bmi < 18.5) {
            $status = "Kekurangan Berat Badan (Kurus)";
            $warna_status = "#f39c12"; 
            $penyebab = "Metabolisme cepat, kurang asupan kalori, atau stres.";
            $solusi = "Fokus surplus kalori. Makan lebih sering dengan porsi kecil tapi padat gizi.";
            $rekomendasi = "🥑 Alpukat, Kacang-kacangan, Susu, Daging Merah, Telur.";
            
        } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
            $status = "Berat Badan Normal (Ideal)";
            $warna_status = "#27ae60"; 
            $penyebab = "Gaya hidup seimbang dan aktif.";
            $solusi = "Pertahankan! Lakukan olahraga ringan rutin 30 menit sehari.";
            $rekomendasi = "🥗 Sayuran hijau, Buah-buahan, Ikan, Ayam tanpa kulit.";

        } elseif ($bmi >= 25 && $bmi <= 29.9) {
            $status = "Kelebihan Berat Badan (Gemuk)";
            $warna_status = "#d35400"; 
            $penyebab = "Kalori masuk > keluar, sering ngemil manis, kurang gerak.";
            $solusi = "Defisit kalori ringan. Kurangi gula/karbohidrat, perbanyak serat.";
            $rekomendasi = "🍎 Apel, Oatmeal, Dada Ayam Rebus, Tahu/Tempe.";

        } else {
            $status = "Obesitas";
            $warna_status = "#c0392b"; 
            $penyebab = "Genetik, hormon, atau pola makan tidak sehat jangka panjang.";
            $solusi = "Konsultasi ke Dokter Gizi. Hindari diet ekstrem, fokus ubah kebiasaan kecil.";
            $rekomendasi = "🐟 Ikan kukus, Sayur rebus, Hindari gorengan & santan.";
        }
    }
}
?>

<?php include "header.php"; ?>

<section class="bmi-section">
    
    <h1 class="bmi-title">Kalkulator BMI</h1>
    <p class="bmi-subtitle">Cek kesehatanmu dan dapatkan saran ahli di sini.</p>

    <div class="bmi-wrapper">

        <div class="bmi-card">
            <h3 style="margin-bottom: 20px; color: #333;">Masukkan Data</h3>
            <form method="POST" class="bmi-form">
                <label>Berat Badan (kg)</label>
                <input type="number" name="berat" placeholder="0" required>

                <label>Tinggi Badan (cm)</label>
                <input type="number" name="tinggi" placeholder="0" required>

                <button type="submit" name="hitung" class="btn-bmi-submit">Hitung Sekarang</button>
            </form>
        </div>

        <?php if ($hasil != ""): ?>
        <div class="bmi-card result-card">
            
            <div class="bmi-result-header" style="background-color: <?php echo $warna_status; ?>;">
                <p>Angka BMI Kamu</p>
                <h1><?php echo $hasil; ?></h1>
                <h3><?php echo $status; ?></h3>
            </div>

            <div class="bmi-result-body">
                <p>
                    <strong style="color: <?php echo $warna_status; ?>;">❓ Penyebab:</strong><br>
                    <?php echo $penyebab; ?>
                </p>
                <p>
                    <strong style="color: <?php echo $warna_status; ?>;">💡 Solusi:</strong><br>
                    <?php echo $solusi; ?>
                </p>
                <p>
                    <strong style="color: <?php echo $warna_status; ?>;">🍽️ Rekomendasi:</strong><br>
                    <?php echo $rekomendasi; ?>
                </p>
            </div>
            
            <a href="bmi.php" class="bmi-reset">🔄 Reset Hitungan</a>

        </div>
        <?php endif; ?>

    </div>
</section>

<?php include "footer.php"; ?>