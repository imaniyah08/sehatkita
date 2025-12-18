<?php
session_start();
require "koneksi.php";

// Cek Admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>

<?php include "header.php"; ?>

<section class="hero hero-user">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="hero-text">
            <h1>Halo Admin, <span class="text-highlight"><?php echo htmlspecialchars($_SESSION['user']); ?>!</span></h1>
            <p class="text-shadow">Pantau dan kelola seluruh konten artikel SehatKita di sini.</p>
            
            <div style="margin-top: 20px;">
                <a href="tambah_artikel.php" class="btn-hero" style="background: #e67e22; border:none;">+ Upload Artikel Baru</a>
            </div>
        </div>
    </div>
</section>

<section id="area-artikel" class="section">
    
    <h2 class="section-title">Kelola Artikel (Edit & Hapus)</h2>

    <div class="search-container">
        <input type="text" id="inputCari" onkeyup="filterArtikel()" placeholder="🔍 Cari judul artikel..." class="input-search">
        <select id="inputKategori" onchange="filterArtikel()" class="input-kategori">
            <option value="all">Semua Kategori</option>
            <option value="olahraga">🏃‍♂️ Olahraga</option>
            <option value="gizi">🍎 Gizi & Nutrisi</option>
            <option value="medis">🩺 Medis</option>
        </select>
    </div>
    
    <div class="artikel-container" id="listArtikel">
        
        <?php
        // Menampilkan SEMUA artikel (punya sendiri maupun orang lain)
        $query = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY id DESC");

        while ($data = mysqli_fetch_array($query)) {
            $badge_class = "";
            if ($data['kategori'] == 'gizi') $badge_class = "badge-gizi";
            elseif ($data['kategori'] == 'medis') $badge_class = "badge-medis";
            else $badge_class = "badge-olahraga";
        ?>

            <div class="artikel-card" data-kategori="<?php echo $data['kategori']; ?>">
                
                <span class="kategori-badge <?php echo $badge_class; ?>">
                    <?php echo ucfirst($data['kategori']); ?>
                </span>
                
                <h3><?php echo $data['judul']; ?></h3>
                
                <p><?php echo substr(strip_tags($data['isi']), 0, 60); ?>...</p>
                
                <div class="card-action-group">
                    <a href="baca_artikel.php?id=<?php echo $data['id']; ?>" class="btn-login btn-small" title="Lihat Tampilan">👁️</a>
                    
                    <a href="edit_artikel.php?id=<?php echo $data['id']; ?>" class="btn-login btn-small btn-yellow" title="Edit Data">✏️ Edit</a>
                    
                    <a href="hapus_artikel.php?id=<?php echo $data['id']; ?>" 
                       class="btn-login btn-small btn-red"
                       onclick="return confirm('Yakin mau menghapus artikel ini?')" title="Hapus Permanen">🗑️</a>
                </div>

            </div>

        <?php } ?>

    </div>

    <p id="pesanKosong" class="pesan-kosong">Artikel tidak ditemukan.</p>

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