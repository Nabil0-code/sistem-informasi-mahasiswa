<?php
session_start();
require_once '../config.php';

if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
}
header("Location: dashboard.php");
exit;
?>