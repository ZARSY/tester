<?php
require_once 'config/database.php';
require_once 'includes/functions.php';
if (!isset($_SESSION['user_id']) || !has_permission($_SESSION['role_id'], 'profil.php', $conn)) {
    header("Location: dashboard.php?error=Akses Ditolak");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Profil Saya</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
<div class="container mt-4"><h1>Profil Saya</h1><p class="alert alert-info">Halaman ini bisa diakses oleh semua peran yang login.</p><a href="dashboard.php" class="btn btn-primary">Kembali</a></div>
</body>
</html>