<?php
session_start();
require "koneksi.php";

// Cek Admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil Data Lama dari Database
$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id = '$id'");
$data = mysqli_fetch_array($query);

// 3. Proses Update Data
if (isset($_POST['update'])) {
    $judul    = htmlspecialchars($_POST['judul']);
    $kategori = $_POST['kategori'];
    $gambar   = $_POST['gambar']; 
    $isi      = $_POST['isi'];

    // Perintah Update SQL
    $update = mysqli_query($koneksi, "UPDATE artikel SET 
        judul = '$judul',
        kategori = '$kategori',
        gambar = '$gambar',
        isi = '$isi'
        WHERE id = '$id'");
    
    if ($update) {
        echo "<script>alert('Artikel Berhasil Diperbaiki!'); window.location.href='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal Update!');</script>";
    }
}
?>

<?php include "header.php"; ?>

<section class="section admin-section">
    <h1>Edit Artikel</h1>
    <p>Silakan perbaiki data artikel di bawah ini.</p>

    <div class="admin-container">
        <div class="form-container">
            
            <form method="POST">
                
                <div class="form-group">
                    <label class="form-label">Judul Artikel</label>
                    <input type="text" name="judul" class="form-input" value="<?php echo $data['judul']; ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="gizi" <?php if($data['kategori']=='gizi') echo 'selected'; ?>>Gizi & Nutrisi</option>
                        <option value="olahraga" <?php if($data['kategori']=='olahraga') echo 'selected'; ?>>Olahraga</option>
                        <option value="medis" <?php if($data['kategori']=='medis') echo 'selected'; ?>>Medis / Kesehatan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Link Gambar (URL)</label>
                    <input type="text" name="gambar" class="form-input" value="<?php echo $data['gambar']; ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Isi Artikel</label>
                    <textarea name="isi" class="form-textarea" required><?php echo $data['isi']; ?></textarea>
                </div>

                <div class="btn-group">
                    <button type="submit" name="update" class="btn-login btn-yellow" style="width: 100%; border: none; cursor: pointer;">Simpan Perubahan</button>
                    <a href="admin_dashboard.php" class="btn-login btn-cancel" style="width: 100%;">Batal</a>
                </div>

            </form>

        </div>
    </div>
</section>

<?php include "footer.php"; ?>