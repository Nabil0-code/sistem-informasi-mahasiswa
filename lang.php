<?php
session_start();

// Cek apakah ada permintaan ubah bahasa
if (isset($_GET['lang'])) {
    if ($_GET['lang'] == 'id' || $_GET['lang'] == 'en') {
        $_SESSION['lang'] = $_GET['lang'];
    }
}

// Default bahasa adalah Indonesia
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

$teks = [
    'id' => [
        'title' => 'Pengelolaan Data Mahasiswa',
        'login' => 'Masuk',
        'logout' => 'Keluar',
        'add' => 'Tambah Data',
        'nim' => 'NIM',
        'name' => 'Nama',
        'major' => 'Jurusan',
        'action' => 'Aksi',
        'edit' => 'Ubah',
        'delete' => 'Hapus',
        'save' => 'Simpan',
        'back' => 'Kembali',
        'empty_error' => 'Data tidak boleh kosong!',
        'language' => 'Bahasa'
    ],
    'en' => [
        'title' => 'Student Data Management',
        'login' => 'Login',
        'logout' => 'Logout',
        'add' => 'Add Data',
        'nim' => 'Student ID',
        'name' => 'Name',
        'major' => 'Major',
        'action' => 'Action',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'save' => 'Save',
        'back' => 'Back',
        'empty_error' => 'Data cannot be empty!',
        'language' => 'Language'
    ]
];
?>