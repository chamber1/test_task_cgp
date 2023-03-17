composer install <br>

php artisan migrate<br>
php artisan db:seed<br>
php artisan key:generate<br>
php artisan jwt:secret<br>

Admin login page<br>
/login<br>

API<br>
/api/auth/login

/api/get_companies?page=1&per_page=5<br>
/api/get_clients?company_id=6040<br>
/api/get_client_companies?client_id=2<br>


Google Authorization <br>
add following Parameters <br>
GOOGLE_CLIENT_ID= <br>
GOOGLE_CLIENT_SECRET= <br>
GOOGLE_REDIRECT=http://localhost/login/google/callback <br>


