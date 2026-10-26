<?php
require_once '../lang.php';
require_once '../config.php';

if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $teks[$lang]['title']; ?> - Dashboard</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <div class="container">
        <h2>Dashboard - <?= $teks[$lang]['title']; ?></h2>
        
        <div class="nav-bar">
            <div>
                <?= $teks[$lang]['language']; ?>: <a href="?lang=id">ID</a> | <a href="?lang=en">EN</a>
            </div>
            <div>
                <a href="../index.php">Home</a> &nbsp;|&nbsp;
                <a href="../auth/logout.php" class="nav-link-logout"><?= $teks[$lang]['logout']; ?></a>
            </div>
        </div>

        <a href="create.php" class="btn"><?= $teks[$lang]['add']; ?></a>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th><?= $teks[$lang]['nim']; ?></th>
                        <th><?= $teks[$lang]['name']; ?></th>
                        <th><?= $teks[$lang]['major']; ?></th>
                        <th><?= $teks[$lang]['action']; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= htmlspecialchars($row['nim']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['jurusan']); ?></td>
                            <td>
                                <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-sm"><?= $teks[$lang]['edit']; ?></a>
                                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?');"><?= $teks[$lang]['delete']; ?></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data mahasiswa.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>