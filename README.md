<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Latino's Club API

This API was made with Laravel, it contains the business logic for the Latino club.

## How to install and run this API (UNIX SYSTEMS)

Before continuing with the installation process, you should have already installed PHP (above V8.1) and Composer (above V2.3).

1- Clone this project, on your local machine:

```bash
$ git clone https://github.com/jefferson10147/latino-api.git
```

2- Navigate to the folder and install composer
```bash
$ cd latino-api/
$ composer install
```

3- Copy the .env file from .env.example:

```bash
$ cat .env.example >> .env
```

4- Add the following environment variables:

```env
ID_ROLE_ADMIN=1
ID_ROLE_USER=2
```

5- You might need to add the database configuration:

```env
DB_CONNECTION=mysql
DB_HOST=your_db_host
DB_PORT=port_number
DB_DATABASE=your_db_name
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

6- Run the following commands:

```bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan storage:link
```

7- You may run some seeders to feed your database (optional):

```bash
$ php artisan db:seed --class=RoleSeeder
$ php artisan db:seed --class=UserSeeder
$ php artisan db:seed --class=WageSeeder
$ php artisan db:seed --class=AssociateMemberSeeder
$ php artisan db:seed --class=AreaSeeder
$ php artisan db:seed --class=ReservationSeeder
$ php artisan db:seed --class=ReservedAreaSeeder
$ php artisan db:seed --class=NewsSeeder
$ php artisan db:seed --class=NewsCommentSeeder
$ php artisan db:seed --class=PictureSeeder
$ php artisan db:seed --class=SportClubSeeder
```

8- Launch the server:

```bash
$ php artisan serve
```