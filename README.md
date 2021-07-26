# Book store api

## Install dependencies
`composer install`

## Migrations
Create schema named `bookstoreapi` (Or wny name specified in your .env)

`bin/console doctrine:migrations:migrate`

## Sample data
`bin/console doctrine:fixtures:load`

## Development server
Run `php -S 127.0.0.1:8000 -t public` for a dev server. Navigate to `http://localhost:8000/api`.

(You may configure the .env file accordingly)
