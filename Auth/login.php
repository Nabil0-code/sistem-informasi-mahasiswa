<?php
require_once '../lang.php';
require_once '../config.php';

if (isset($_SESSION['login'])) {
    header("Location: ../mahasiswa/dashboard.php");
    exit;
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = md5(trim($_POST['password'])); 

    if (empty($username) || empty($password)) {
        $error = $teks[$lang]['empty_error'];
    } else {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['login'] = true;
            header("Location: ../mahasiswa/dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - <?= $teks[$lang]['title']; ?></title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container form-card">
        <h2><?= $teks[$lang]['login']; ?></h2>
        
        <div class="nav-bar">
            <span><?= $teks[$lang]['language']; ?>:</span>
            <div><a href="?lang=id">ID</a> | <a href="?lang=en">EN</a></div>
        </div>

        <?php if ($error): ?>
            <div class="alert-error"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn"><?= $teks[$lang]['login']; ?></button>
                <a href="../index.php" class="btn btn-secondary"><?= $teks[$lang]['back']; ?></a>
            </div>
        </form>
    </div>
</body>
</html>