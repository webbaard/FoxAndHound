install
change your local DB settings in .env file (see .env.dist)
* docker-compose up
* docker-compose exec php bin/console doctrine:database:create
* docker-compose exec php bin/console doctrine:migrations:migrate
* docker-compose exec php bin/console event-store:event-stream:create

later
docker-compose exec php bin/console event-store:projection:run tab_projection
