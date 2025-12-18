<?php
session_start();
require "koneksi.php";

// 1. Cek Admin (Wajib)
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// 2. Proses Simpan ke Database
if (isset($_POST['simpan'])) {
    $judul    = htmlspecialchars($_POST['judul']);
    $kategori = $_POST['kategori'];
    $gambar   = $_POST['gambar']; 
    $isi      = $_POST['isi'];

    $query = "INSERT INTO artikel (judul, kategori, gambar, isi) VALUES ('$judul', '$kategori', '$gambar', '$isi')";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Artikel Berhasil Diupload!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal Upload: " . mysqli_error($koneksi) . "');</script>";
    }
}
?>

<?php include "header.php"; ?>

<section class="section admin-section">
    <h1 class="section-title">Tambah Artikel Baru</h1>
    <p style="margin-bottom: 30px;">Silakan isi formulir di bawah ini untuk memposting artikel.</p>

    <div class="admin-container">
        <div class="form-container">
            
            <form method="POST">
                
                <div class="form-group">
                    <label class="form-label">Judul Artikel</label>
                    <input type="text" name="judul" class="form-input" placeholder="Contoh: Tips Diet Sehat..." required>
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="gizi">Gizi & Nutrisi</option>
                        <option value="olahraga">Olahraga</option>
                        <option value="medis">Medis / Kesehatan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Link Gambar (URL)</label>
                    <input type="text" name="gambar" class="form-input" placeholder="https://..." required>
                    <span class="form-note">*Tips: Cari gambar di Google, Klik Kanan > Copy Image Address</span>
                </div>

                <div class="form-group">
                    <label class="form-label">Isi Artikel</label>
                    <textarea name="isi" class="form-textarea" placeholder="Tulis isi artikel lengkap di sini..." required></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" name="simpan" class="btn-login btn-orange" style="width: 100%; border: none; cursor: pointer;">Simpan Artikel</button>
                    <a href="admin_dashboard.php" class="btn-login btn-cancel" style="width: 100%;">Batal</a>
                </div>

            </form>

        </div>
    </div>
</section>

<?php include "footer.php"; ?>