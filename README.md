*_Bienvenides al repositorio_*

Pasos a realizar tras la clonación del repositorio:
- Crear una base de datos dentro de MYSQL que lleve por nombre `cultuguide`
- Hacer uso de los siguientes comandos dentro de la carpeta generada al clonar el proyecto desde la terminal (preferentemente la incorporada con laragon)
   - `cp .env.example .env`
   - `php artisan key:generate`
- Dentro del archivo .env que se generó cambiar la variable de entorno `DB_PASSWORD` a su contraseña de MySQL (si no tiene contraseña dejarlo así)
- Continuar con la instalación:
   - `composer install`
   - `npm install`
   - `npm run build`
   - `php artisan migrate`
   - `php artisan db:seed --class=RolesSeeder`
   - `php artisan db:seed --class=UserSeeder`
   - `php artisan db:seed --class=MunicipioSeeder`
