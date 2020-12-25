## Instrucciones

***Crear la base de datos y modificar el archivo .env.example****
- CREATE DATABASE IF NOT EXISTS agenda;
- renombrar el archivo como `.env` y poner los datos de tu servidor


***Ejecuar los siguientes comandos dentro del proyecto***
- `composer install`
- `sudo chmod -R 777 storage/`
- `php artisan key:generate`
- `php artisan config:cache`
- `php artisan migrate`
