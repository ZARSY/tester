<?php
// =================================================================
// BLOK LOGIKA & KEAMANAN
// =================================================================

// 1. Mulai sesi PHP
session_start();

// 2. Sertakan file koneksi database dan fungsi
require_once 'config/database.php'; // Pastikan path ini benar
require_once 'includes/functions.php';  // Pastikan path ini benar

// 3. Periksa apakah pengguna sudah login, jika tidak, alihkan ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// 4. Ambil data pengguna dan hak akses dari sesi
$nama_lengkap = $_SESSION['nama_lengkap'];
$role_id = $_SESSION['role_id'];

// 5. Ambil daftar menu yang diizinkan untuk peran (role) ini
// Variabel $daftar_menu ini akan digunakan di layoutTop.php
$daftar_menu = get_hierarchical_menu_for_role($role_id, $conn);

// 6. Variabel script khusus untuk halaman ini (dari file asli Anda)
$script = '<script src="assets/js/homethreeChart.js"></script>';

// =================================================================
// AKHIR BLOK LOGIKA & KEAMANAN
// =================================================================

// Sertakan bagian atas layout. File ini akan menggunakan variabel $daftar_menu
include './partials/layouts/layoutTop.php';
?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="index.php" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">eCommerce</li>
        </ul>
    </div>
    </div>

<?php
// Sertakan bagian bawah layout
include './partials/layouts/layoutBottom.php'
?>