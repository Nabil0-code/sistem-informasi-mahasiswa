# Sistem Informasi Pengelolaan Data Mahasiswa

Aplikasi Sistem Informasi Manajemen Data Sederhana berbasis web murni (Native PHP & MySQL/MariaDB) yang dibangun untuk memenuhi Tugas Mata Kuliah **Penerapan Teknologi Internet**.

---

## 🚀 Fitur Utama

- **Authentication System**: Proteksi halaman administrasi menggunakan `$_SESSION`.
- **Dual Language (Bahasa Indonesia & English)**: Dukungan multi-bahasa berbasis *session* yang konsisten saat berpindah halaman.
- **CRUD Operations**:
  - **Create**: Menambah data mahasiswa baru dengan validasi form.
  - **Read**: Menampilkan seluruh data mahasiswa dalam tabel HTML yang rapi.
  - **Update**: Memperbarui data mahasiswa yang sudah ada berdasarkan identitas unik (`id`).
  - **Delete**: Menghapus data mahasiswa dari database.
- **Data Security & Sanitization**: 
  - Sanitasi input menggunakan `htmlspecialchars()` dan `trim()` untuk mencegah serangan XSS.
  - Validasi keberadaan data menggunakan struktur kontrol percabangan `if-else`.

---

## 🛠️ Teknologi yang Digunakan

- **Language**: PHP (Native)
- **Database**: MySQL / MariaDB
- **Styling**: Pure CSS (Tanpa Framework)
- **Server**: Apache (via XAMPP)

---

## 📂 Struktur Folder Proyek

```text
Sistem Informasi Pengelolaan Data Mahasiswa/
├── Auth/
│   ├── login.php
│   └── logout.php
├── Mahasiswa/
│   ├── dashboard.php
│   ├── create.php
│   ├── update.php
│   └── delete.php
├── style/
│   └── style.css
├── config.php
├── lang.php
├── index.php
└── database.sql