<?php
require_once 'config/database.php';
require_once 'includes/functions.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
$nama_lengkap = $_SESSION['nama_lengkap'];
$role_id = $_SESSION['role_id'];
$daftar_menu = get_hierarchical_menu_for_role($role_id, $conn);
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="UTF-8"><title>Dashboard</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container"><a class="navbar-brand" href="dashboard.php">Sistem Pro</a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"><span class="navbar-toggler-icon"></span></button><div class="collapse navbar-collapse" id="navbarNavDropdown"><ul class="navbar-nav me-auto">
        <?php foreach ($daftar_menu as $menu): ?>
            <?php if (empty($menu['sub_menu'])): ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars($menu['url']); ?>"><?php echo htmlspecialchars($menu['nama_menu']); ?></a></li>
            <?php else: ?>
                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo htmlspecialchars($menu['nama_menu']); ?></a><ul class="dropdown-menu">
                <?php foreach ($menu['sub_menu'] as $sub_menu): ?>
                    <li><a class="dropdown-item" href="<?php echo htmlspecialchars($sub_menu['url']); ?>"><?php echo htmlspecialchars($sub_menu['nama_menu']); ?></a></li>
                <?php endforeach; ?>
                </ul></li>
            <?php endif; ?>
        <?php endforeach; ?>
        </ul><div class="d-flex align-items-center"><span class="navbar-text text-white-50 me-3">Halo, <?php echo htmlspecialchars($nama_lengkap); ?></span><a href="auth/logout.php" class="btn btn-outline-danger">Logout</a></div></div></div>
    </nav>
    <div class="container mt-4"><h1>Dashboard Utama</h1><p>Selamat datang di sistem manajemen Anda.</p><?php if(isset($_GET['error'])): ?><div class="alert alert-danger mt-3"><?php echo htmlspecialchars($_GET['error']); ?></div><?php endif; ?></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>