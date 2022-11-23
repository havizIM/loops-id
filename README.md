## Requirement

- PHP > 8.0
- Nodejs > 14
- MySql > 5.7

## Cara Installasi

1. Download atau Clone Project Ini
2. Jalankan command : composer install
3. Copy file .env.example menjadi .env
4. Sesuaikan config database dan email pada file .env
5. Jalankan command : php artisan key:generate
6. Jalankan command : php artisan optimize:clear
7. Buat database dengan nama loops_id
8. Jalankan command : php artisan migrate --seed
9. Jalankan command : npm install

## Cara Running Aplikasi

Jalankan aplikasi dengan command : npm run dev
