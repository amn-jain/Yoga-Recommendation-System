# Made using Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Installation procedure

1. Install PHP 7.4
2. Install MySQL
3. Install NodeJs and NPM
4. Install Composer (Change path of composer link)
5. Install Laravel 8
6. Install Python (version 3.6 or above)
7. Install Tensorflow (2.2.1 version)
8. Set up MySQL
    - Create a database
    - Grant All privileges to the user created using root
9. Clone the Project
10. cd into your project
11. Run the following commands in the project directory
    - composer install
    - npm install
    - cp .env.example .env
    - Setup the .env file (set
        - DB_NAME,
        - DB_USERNAME,
        - DB_PASSWORD,
        - Mail_Trap - Sign up on mailtrap and paste mail credentials provided by it in .env)
    - php artisan key:generate
    - php artisan migrate:fresh
    - mkdir /public/storage/profile_images/ (this folder stores profile images)
    - php artisan storage:link
    - mysql -u DB_USERNAME -p DB_NAME < asanas_data.sql
    - mysql -u DB_USERNAME -p DB_NAME < disease_data.sql
    - php artisan serve
