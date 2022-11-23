## Requirement

- PHP > 8.0
- Nodejs > 14
- MySql > 5.7

## Cara Installasi

1. Download atau Clone Project Ini
2. Jalankan command : composer install
3. Copy file .env.example menjadi .env
4. Sesuaikan config DATABASE dan EMAIL pada file .env
5. Jalankan command : php artisan key:generate
6. Jalankan command : php artisan optimize:clear
7. Buat database dengan nama loops_id
8. Jalankan command : php artisan migrate --seed
9. Jalankan command : npm install

## Cara Running Aplikasi

Jalankan aplikasi dengan command : npm run dev
Copy link yang tersedia pada terminal di browser

## Untuk Unit Test Dengan Dusk

Jalankan command : php artisan dusk

## Queue and Task Schedule for Expired Member

Untuk menjalankan queue dan cron job. Langkah pertama adalah :
1. Ubah QUEUE_DRIVER pada .env menjadi "database"
2. Jalankan command : php artisan queue:work (Untuk melakukan pengiriman email pengingat member expired H-7)
3. Jalankan command : php artisan schedule:work (Untuk merubah status member menjadi Expired secara otomatis ketika melewati tanggalnya)
