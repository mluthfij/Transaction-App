## Development requirements
- PHP Version 8.4.1
- Laravel Version 5.14.0
- Sqlite3 Version 3.43.2

## Transaction Application

Running locally:
- run this command `composer dump-autoload && php artisan migrate:reset && php artisan migrate && php artisan db:seed --class=ProdukSeeder`
- then run the server `php artisan serve --port=8000`
- and open this link in the browser `http://localhost:8000/produks`
