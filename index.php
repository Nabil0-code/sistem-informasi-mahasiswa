<?php require_once 'lang.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $teks[$lang]['title']; ?></title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="container container-center">
        <h2><?= $teks[$lang]['title']; ?></h2>
        
        <div class="nav-bar nav-bar-center">
            <span><?= $teks[$lang]['language']; ?>: &nbsp;<a href="?lang=id">ID</a> &nbsp;|&nbsp; <a href="?lang=en">EN</a></span>
        </div>

        <?php if (isset($_SESSION['login'])): ?>
            <p style="margin-bottom: 20px;">Anda sudah masuk ke sistem.</p>
            <a href="mahasiswa/dashboard.php" class="btn">Dashboard</a>
            <a href="auth/logout.php" class="btn btn-danger"><?= $teks[$lang]['logout']; ?></a>
        <?php else: ?>
            <p style="margin-bottom: 20px;">Silakan masuk untuk mengelola data mahasiswa.</p>
            <a href="auth/login.php" class="btn"><?= $teks[$lang]['login']; ?></a>
        <?php endif; ?>
    </div>
</body>
</html>