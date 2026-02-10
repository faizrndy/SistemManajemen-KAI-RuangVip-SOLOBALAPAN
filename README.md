# VIP Room Monitoring System  
**PT Kereta Api Indonesia (Persero)**  
Stasiun Solo Balapan – Ruang VIP Joglo

## 📌 Deskripsi
VIP Room Monitoring System adalah aplikasi berbasis web yang digunakan untuk **mengelola, memantau, dan menampilkan jadwal penggunaan Ruang VIP Joglo Solo Balapan**.  
Sistem ini mendukung kebutuhan **administrasi internal** serta **monitoring real-time melalui display TV**.

Aplikasi dikembangkan untuk meningkatkan keteraturan jadwal, transparansi penggunaan ruang, serta kemudahan pemantauan bagi petugas dan manajemen.

---

## 🎯 Tujuan Sistem
- Mengelola jadwal penggunaan Ruang VIP secara terpusat
- Menampilkan informasi penggunaan ruang secara real-time
- Meminimalisir bentrok jadwal dan kesalahan pencatatan
- Mendukung kebutuhan laporan dan evaluasi penggunaan ruang

---

## 🧩 Fitur Utama

### 🔐 Admin Dashboard
- Login Admin
- CRUD Jadwal Penggunaan Ruang VIP
- Pengaturan status jadwal (Terjadwal / Dibatalkan)
- Riwayat penggunaan Ruang VIP
- Filter dan pengelolaan data

### 📺 Web Monitoring (Display TV)
- Tampilan khusus untuk layar TV
- Auto refresh (real-time monitoring)
- Menampilkan seluruh jadwal penggunaan Ruang VIP
- Penanda status:
  - 🟢 Terjadwal
  - 🔴 Dibatalkan
- Jam & tanggal otomatis

---

## 🛠️ Teknologi yang Digunakan
- **Framework**: Laravel 12
- **Bahasa**: PHP 8.4
- **Frontend**: Blade Template + Tailwind CSS
- **Database**: MySQL
- **Version Control**: Git & GitHub
- **Environment**: Localhost (XAMPP / Laravel Built-in Server)

---

## 🗂️ Struktur Modul
- `Admin`  
  Pengelolaan jadwal dan data Ruang VIP
- `Public / TV Monitoring`  
  Menampilkan data jadwal untuk kebutuhan display
- `Database`  
  Penyimpanan jadwal, status, media, tamu, dan keterangan

---




