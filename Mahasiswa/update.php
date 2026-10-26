<?php
require_once '../lang.php';
require_once '../config.php';

if (!isset($_SESSION['login'])) { header("Location: ../auth/login.php"); exit; }

$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = htmlspecialchars(trim($_POST['nim']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $jurusan = htmlspecialchars(trim($_POST['jurusan']));

    if (empty($nim) || empty($nama) || empty($jurusan)) {
        $error = $teks[$lang]['empty_error'];
    } else {
        $update_query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id=$id";
        if (mysqli_query($conn, $update_query)) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Gagal mengubah data!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $teks[$lang]['edit']; ?></title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container form-card">
        <h2><?= $teks[$lang]['edit']; ?></h2>

        <?php if ($error): ?>
            <div class="alert-error"><?= $error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label><?= $teks[$lang]['nim']; ?></label>
                <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" required>
            </div>

            <div class="form-group">
                <label><?= $teks[$lang]['name']; ?></label>
                <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
            </div>

            <div class="form-group">
                <label><?= $teks[$lang]['major']; ?></label>
                <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn"><?= $teks[$lang]['save']; ?></button>
                <a href="dashboard.php" class="btn btn-secondary"><?= $teks[$lang]['back']; ?></a>
            </div>
        </form>
    </div>
</body>
</html>