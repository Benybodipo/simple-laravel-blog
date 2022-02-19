## About Simple Laravel Blog
This is a mini blog built with Laravel, with basic functionalities, such as:
- Authenticate users (register and login)
- CRUD posts depending on your authorisation
- Like posts
- Comment post

## Technologies
- PHP/Laravel
- SQLite
- Bootstrap

## Setup
1. Clone or download the repository
2. Extract (if downloaded)
3. Access the project folder from the terminal or the IDE
4. Run ```Composer install``` to install the dependencies
5. Configure the .env file. If you choose to use SQLite, access to the database folder and create a file named database.sqlite
6. For seeding the database, run ```php artisan migrate:fresh --seed ```
7. 
## Run
From the root folder of the project run ```php artisan serve``` to run the application.
* Note: The ndefault url is http://127.0.0.1:8000/
* If you have the "No application encryption key has been specified." error, run ``` php artisan key:generate ```


