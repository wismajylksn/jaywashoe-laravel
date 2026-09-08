# Jaywashoe Platform

Aplikasi manajemen layanan cuci sepatu (*Full-Stack Web Application*) yang berfokus pada efisiensi pemesanan dan otomatisasi sinkronisasi status pembayaran secara *real-time*.

**Tech Stack**
* Framework: PHP & Laravel
* Database: MySQL 
* Payment Gateway: Midtrans (Core API & Webhook)
* Architecture: MVC (Model-View-Controller)

**Fitur Utama**
* **Automated Payment Synchronization:** Implementasi logika *webhook* Midtrans untuk memperbarui status pesanan dari "Unpaid" menjadi "Paid" secara otomatis tanpa intervensi manual.
* **Relational Database Design:** Merancang arsitektur basis data relasional untuk manajemen *Services* (layanan) dan *Orders* (pesanan).
* **Secure CRUD Operations:** Sistem manajemen pemesanan yang aman dengan validasi data yang ketat.

**Cara Menjalankan Lokal**
1. Clone repositori ini: `git clone [URL_REPO_ANDA]`
2. Instal dependensi: `composer install`
3. Salin `.env.example` ke `.env` dan konfigurasi koneksi database Anda serta kredensial Midtrans Server Key.
4. Buat *App Key*: `php artisan key:generate`
5. Jalankan migrasi: `php artisan migrate`
6. Mulai server lokal: `php artisan serve`

**Arsitektur & Alur Sistem (System Architecture)**

Aplikasi ini dibangun menggunakan arsitektur Monolith (MVC) yang terintegrasi dengan layanan pihak ketiga (Midtrans) untuk memproses transaksi. Berikut adalah komponen utama yang menggerakkan sistem:

* **Client Interface (View):** Dibangun menggunakan Laravel Blade dan CSS untuk memfasilitasi pelanggan dalam memilih layanan cuci sepatu dan menampilkan halaman *checkout*.
* **Core Backend (Controller):** Otak dari aplikasi yang menangani logika bisnis, validasi *input* pengguna, dan pembentukan pesanan (Order).
* **Database (Model):** Menggunakan MySQL untuk menyimpan data relasional seperti detail layanan (`Services`) dan riwayat transaksi pelanggan (`Orders`).
* **Payment Gateway (Midtrans):** Bertindak sebagai prosesor pembayaran yang menyediakan antarmuka pembayaran (Snap API) dan mengirimkan notifikasi balik ke server kita (Webhook/HTTP Notification).

**Alur Pembayaran Otomatis (Webhook Flow)**

Nilai jual utama dari sistem ini adalah kemampuannya menangani perubahan status pembayaran tanpa campur tangan admin. Berikut adalah alur logikanya:

1. **Inisiasi Pesanan:** Pelanggan membuat pesanan di *website*. Server Laravel menyimpan data ke MySQL dengan status awal `Unpaid` dan meminta Token Pembayaran ke Midtrans.
2. **Proses Pembayaran:** Pelanggan menyelesaikan pembayaran (misal: via QRIS atau Virtual Account) melalui antarmuka Midtrans Snap.
3. **Trigger Webhook:** Segera setelah dana diterima, server Midtrans menembakkan *HTTP POST Request* secara asinkron ke *endpoint* API (Webhook) yang ada di aplikasi Laravel kita.
4. **Validasi & Eksekusi:** Server Laravel menerima notifikasi tersebut, memvalidasi *Signature Key* untuk memastikan data benar-benar berasal dari Midtrans (keamanan), lalu secara otomatis memperbarui kolom `PaymentStatus` di *database* menjadi `Paid`.
   
<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 56 58" src="https://github.com/user-attachments/assets/f3a9443e-10f6-406d-84f8-7b469c9326c3" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 57 13" src="https://github.com/user-attachments/assets/47dcf8ce-141d-4fa8-af52-a5db9e623a64" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 57 46" src="https://github.com/user-attachments/assets/d18a371f-dac4-41ea-af16-a9ee36d61aee" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 12 01 21" src="https://github.com/user-attachments/assets/87676a75-e6cc-403d-9c3a-69db883e7eed" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 12 01 55" src="https://github.com/user-attachments/assets/6847a7f4-bcb7-466a-a92a-6bc3f04c57a9" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 57 55" src="https://github.com/user-attachments/assets/e89fe50b-90ea-4e21-bda9-ef13d2e4baa7" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 58 12" src="https://github.com/user-attachments/assets/74866fd0-b58a-472e-982b-2ea93bd70dbd" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 58 26" src="https://github.com/user-attachments/assets/6822063b-8a4f-4403-90ea-63eced2647f1" />


<img width="1440" height="900" alt="Screenshot 2026-09-08 at 11 59 10" src="https://github.com/user-attachments/assets/ca62d754-fb3f-45a0-88f5-86e42d0bf113" />





