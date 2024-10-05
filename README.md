# Steamy Sips Laravel

A port of the Steamy Sips admin website to Laravel.

## Installation guide

Download project and navigate to root directory:

```bash
git clone git@github.com:steamysips/steamy-sips-laravel.git
cd steamy-sips-laravel
```

In the root directory, create a `.env` file with the following content:

```
APP_NAME=steamy_sips_admin_laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=steamy_laravel
DB_USERNAME=root
DB_PASSWORD=
```

Modify the database credentials `DB_USERNAME` and `DB_PASSWORD` as needed.

Run:

```bash
php artisan key:generate
composer install
npm run build
```


## Usage guide

Start your MySQL database:

```bash
sudo service mysql start
```

To run application:

```bash
php artisan serve
```