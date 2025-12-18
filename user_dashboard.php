<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit;
}
?>

<?php include "header.php"; ?>

<section class="hero hero-user">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-text">
            <h1>Halo, <span class="text-highlight"><?php echo htmlspecialchars($_SESSION['user']); ?>!</span></h1>
            <p class="text-shadow">Selamat datang! Yuk cari artikel kesehatan sesuai kebutuhanmu.</p>
            <a href="#area-artikel" class="btn-hero">Mulai Membaca</a>
        </div>
    </div>
</section>

<section id="area-artikel" class="section">
    
    <h2 class="section-title">Cari Artikel Kesehatan</h2>

    <div class="search-container">
        
        <input type="text" id="inputCari" onkeyup="filterArtikel()" placeholder="🔍 Cari judul artikel..." 
               class="input-search">

        <select id="inputKategori" onchange="filterArtikel()" class="input-kategori">
            <option value="all">Semua Kategori</option>
            <option value="olahraga">🏃‍♂️ Olahraga</option>
            <option value="gizi">🍎 Gizi & Nutrisi</option>
            <option value="medis">🩺 Medis</option>
        </select>

    </div>
    
    <div class="artikel-container" id="listArtikel">
        
        <div class="artikel-card" data-kategori="gizi">
            <span class="kategori-badge badge-gizi">Gizi</span>
            <h3>Manfaat Minum Air</h3>
            <p>Air putih sangat penting untuk tubuh...</p>
            <br>
            <a href="baca_artikel.php?id=1" class="btn-login btn-small">Baca Selengkapnya</a>
        </div>

        <div class="artikel-card" data-kategori="medis">
            <span class="kategori-badge badge-medis">Medis</span>
            <h3>Bahaya Begadang</h3>
            <p>Kurang tidur bisa menurunkan imun...</p>
            <br>
            <a href="baca_artikel.php?id=2" class="btn-login btn-small">Baca Selengkapnya</a>
        </div>
        
        <div class="artikel-card" data-kategori="olahraga">
            <span class="kategori-badge badge-olahraga">Olahraga</span>
            <h3>Olahraga Ringan</h3>
            <p>Cukup jalan kaki 30 menit sehari...</p>
            <br>
            <a href="baca_artikel.php?id=3" class="btn-login btn-small">Baca Selengkapnya</a>
        </div>

         <div class="artikel-card" data-kategori="gizi">
            <span class="kategori-badge badge-gizi">Gizi</span>
            <h3>Sayur Hijau Terbaik</h3>
            <p>Daftar sayuran yang wajib kamu konsumsi...</p>
            <br>
            <a href="baca_artikel.php?id=1" class="btn-login btn-small">Baca Selengkapnya</a>
        </div>

    </div>

    <p id="pesanKosong" class="pesan-kosong">Yah, artikel yang kamu cari tidak ditemukan :(</p>

</section>

<script>
function filterArtikel() {
    var inputCari = document.getElementById('inputCari').value.toLowerCase();
    var inputKategori = document.getElementById('inputKategori').value;
    var cards = document.getElementsByClassName('artikel-card');
    var adaHasil = false;

    for (var i = 0; i < cards.length; i++) {
        var judul = cards[i].getElementsByTagName("h3")[0].innerText.toLowerCase();
        var kategoriCard = cards[i].getAttribute('data-kategori');

        var cocokJudul = judul.indexOf(inputCari) > -1;
        var cocokKategori = (inputKategori === 'all') || (inputKategori === kategoriCard);

        if (cocokJudul && cocokKategori) {
            cards[i].style.display = "";
            adaHasil = true;
        } else {
            cards[i].style.display = "none";
        }
    }
    document.getElementById('pesanKosong').style.display = adaHasil ? "none" : "block";
}
</script>

<?php include "footer.php"; ?>