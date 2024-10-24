
# Sistem Manajemen Sekolah

"Sistem Manajemen Sekolah" adalah aplikasi berbasis web yang dikembangkan menggunakan framework Laravel. Aplikasi ini menyediakan fitur untuk mengelola data operator, guru, siswa, kelas, fasilitas kelas, serta jadwal pelajaran setiap kelas. Aplikasi ini dirancang untuk mempermudah administrasi sekolah dalam melakukan CRUD (Create, Read, Update, Delete) data tersebut.

## Fitur

### 1. Manajemen Data Operator, Guru, dan Siswa
- **CRUD Operator**: Mengelola data operator yang bertanggung jawab atas pengelolaan sistem.
- **CRUD Guru**: Mengelola data guru yang ada di sekolah.
- **CRUD Siswa**: Mengelola data siswa yang terdaftar di sekolah.

### 2. Manajemen Kelas
- **CRUD Kelas**: Mengelola data kelas yang tersedia di sekolah.
- **CRUD Fasilitas Kelas**: Setiap kelas dapat memiliki fasilitas seperti proyektor, AC, papan tulis, dll., yang bisa dikelola melalui fitur ini.

### 3. Jadwal Pelajaran
- **CRUD Jadwal Pelajaran**: Mengelola jadwal pelajaran untuk setiap kelas, termasuk hari, jam, dan mata pelajaran yang diajarkan.

## Cara Menggunakan

1. Clone repositori ini ke dalam direktori lokal Anda.
2. Jalankan perintah `composer install` untuk menginstal semua dependencies.
3. Lakukan konfigurasi database pada file `.env`.
4. Jalankan migrasi dan seeding database dengan perintah berikut:
    ```
    php artisan migrate --seed
    ```
5. Login ke sistem menggunakan akun berikut:
    - Username: `admin`
    - Password: `password`

6. Setelah login, Anda dapat mulai menggunakan fitur-fitur yang disediakan.

## Teknologi yang Digunakan
- Laravel 10
- MySQL
- Bootstrap 5
- Admin dashboard: Stisla

## License
Proyek ini dilisensikan di bawah MIT License.
