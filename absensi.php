<?php
require_once 'config/database.php';
require_once 'includes/functions.php';
if (!isset($_SESSION['user_id']) || !has_permission($_SESSION['role_id'], 'absensi.php', $conn)) {
    header("Location: dashboard.php?error=Akses Ditolak");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Lakukan Absensi</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-4"><h1>Halaman Absensi</h1><p class="alert alert-info">Halaman ini hanya bisa diakses oleh Karyawan.</p><a href="dashboard.php" class="btn btn-primary">Kembali</a></div>
</body>
</html>