<?php
session_start();
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $role     = $_POST['role'];

    $stmt = mysqli_prepare($koneksi, "SELECT username, password, role FROM users WHERE username=? AND role=?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $role);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($data = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['user'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] === "admin") {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit;
        } else {
            echo "<script>alert('Password salah!');window.location.href='login.php';</script>";
        }
    } else {
        echo "<script>alert('User tidak ditemukan atau Role salah!');window.location.href='login.php';</script>";
    }
}
?>

<?php include "header.php"; ?>

<section class="login-section">
    <div class="login-container">
        <h2>Login Pengguna</h2>
        <p>Masuk untuk mengakses layanan</p>
        
        <form class="login-form" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <select name="role" required>
                <option value="" disabled selected>-- Masuk Sebagai --</option>
                <option value="user">User (Pengunjung)</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Login</button>
        </form>

        <p class="login-note">
            Belum punya akun? <a href="signup.php">Daftar disini</a>
        </p>
    </div>
</section>

<?php include "footer.php"; ?>