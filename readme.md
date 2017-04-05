# E-registrasi
Contoh sistem e-registrasi menggunakan framework CodeIgniter 3.x.

## Latar belakang
Ini adalah soal yang saya dapat waktu seleksi tes pegawai non kontrak di sebuah universitas.
Source code ini adalah pembahasan dari soal tersebut.

## Hal yang di dapat
Hal-hal yang saya dapatkan:
  1. Cara mengimport database berukuran > 2MB ke dalam database server lokal. Silahkan baca [cara import sql berukuran besar](https://github.com/satyakresna/catatan-penjelajahtekno/import-sql-besar.md)
  2. Membuat paging untuk menghandle lebih dari 1000 rows (lebih tepatnya 210549 rows) agar tidak menyebabkan memory
      exhausted.
  3. Membuat opsi filter dengan tujuan agar data bisa
  dicari sesuai dengan kebutuhan user.

## Prasyarat
Minimal anda telah belajar PHP, MySQL dan framework CodeIgniter 3.x

# Cara menjalankan
  1. Karena menggunakan CodeIgniter 3.x, cukup download repository ini dan download framework CodeIgniter 3.x terbaru dan kemudian `copy + paste` folder **system** ke root folder `e-registrasi`. Sehingga susunannya seperti ini:
  ```
  .e-registrasi
  +--- application
  +--- assets
  +--- system
  +--- db
  +--- .gitignore
  +--- .htaccess
  +--- index.php
  +--- readme.md
  ```
  2. Buat database bernama e-registrasi.sql di PHPmyadmin / MySQL command line / SQL yog. Extract `e-registrasi.zip` dari folder **db** dan import database `e-registrasi.sql`.
  3. Silahkan buka file **database.php** yang berada di dalam `e-registrasi/application/config/database.php`. Saya telah mengisi **nama host, nama database, username dan password**. Silahkan sesuaikan dengan kebutuhan anda.
  4. Jalankan `localhost/e-registrasi` di browser anda dan sistem akan menampilkan data yang sudah ter-paging.
  5. Silahkan buka dan baca file:<br>
      a.`e-registrasi/application/controllers/Registrasi.php` untuk mempelajari system paging dan searching. <br>
      b.`e-registrasi/application/models/Registrasi_model.php` untuk mempelajari perintah mendapatkan data yang dibutuhkan di function `get_all` dan jumlah baris di function `total_record`. <br>
      c. `e-registrasi/application/views/registrasi/list.php` untuk mempelajari tampilan data yang ditampilkan di browser.

## TO-DO
  - [ ] Membuat filter untuk mencari nama Mahasiswa menggunakan text field.
  - [ ] Sinkronisasi dengan framework Bootstrap agar tampil cantik.
  - [ ] Membuat fitur cetak report total pembayaran per semester per  tahun per fakultas dan dikelompokkan sesuai dengan status_trx dilengkapi
  dengan filter pencarian tahun, semster,status_trx dan fakultas
