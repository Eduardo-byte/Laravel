Install composer and npm dependencies from the root directory using the following command:

composer install -d ./application/ && npm --prefix ./application/ install ./application/

Copy ./application/.env.example to ./application/.env from the root directory using the following command:

cp ./application/.env.example ./application/.env

Run docker from the root directory using the following command:

docker-compose up --build

In a new terminal window run:

docker exec -it register-php-fpm bash
php artisan key:generate && php artisan migrate:fresh --seed && php artisan storage:link
