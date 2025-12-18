<?php
include "header.php";

$id_artikel = isset($_GET['id']) ? $_GET['id'] : 0;

$list_artikel = [
    1 => [
        "judul" => "Manfaat Minum Air Putih",
        "gambar" => "https://images.unsplash.com/photo-1540420773420-3366772f4999?w=800",
        "isi" => "Tahukah Anda? Tubuh manusia terdiri dari 60% air. Minum air putih yang cukup (8 gelas sehari) dapat membantu menjaga konsentrasi, melembapkan kulit, dan membuang racun dalam tubuh. <br><br> Jangan tunggu haus untuk minum, karena haus adalah tanda tubuh sudah mulai dehidrasi!"
    ],
    2 => [
        "judul" => "Bahaya Begadang bagi Kesehatan",
        "gambar" => "https://images.unsplash.com/photo-1498837167922-ddd27525d352?w=800",
        "isi" => "Tidur kurang dari 7 jam sehari dapat menurunkan sistem kekebalan tubuh. Orang yang sering begadang lebih rentan terkena penyakit jantung, obesitas, dan diabetes. <br><br> Usahakan tidur jam 10 malam agar hormon tubuh dapat bekerja memperbaiki sel-sel yang rusak."
    ],
    3 => [
        "judul" => "Gerakan Olahraga Ringan di Rumah",
        "gambar" => "https://images.unsplash.com/photo-1544367563-12123d8965cd?w=800",
        "isi" => "Tidak perlu ke gym! Cukup lakukan: <br> 1. Jumping Jack (30 detik) <br> 2. Plank (30 detik) <br> 3. Squat (15 kali) <br><br> Lakukan rutin setiap pagi untuk hasil maksimal."
    ]
];

$data = isset($list_artikel[$id_artikel]) ? $list_artikel[$id_artikel] : null;
?>

<section class="read-section">
    
    <?php if($data): ?>
        <h1 class="read-title"><?php echo $data['judul']; ?></h1>
        
        <img src="<?php echo $data['gambar']; ?>" class="read-img">
        
        <div class="read-content">
            <?php echo $data['isi']; ?>
        </div>
        
        <a href="user_dashboard.php" class="btn-login btn-back">&larr; Kembali ke Dashboard</a>

    <?php else: ?>
        <center>
            <h2 class="section-title">Maaf, artikel tidak ditemukan!</h2>
            <a href="user_dashboard.php" class="btn-login btn-back">Kembali</a>
        </center>
    <?php endif; ?>

</section>

<?php include "footer.php"; ?>