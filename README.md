
## About Project
This project use Repository Design Pattern for the coding style. So the flow code is like the explained below:
> Route
>> Controller
>>> Repository


## Project Requirement
- PHP 8.1 or newer
- Laravel 10
- PostgreSQL


## Installation
1. Clone repository
    ```
    git clone https://github.com/dinafauzyh/sagala-back-end-test.git

    cd sagala-back-end-test
    ```

2. Install all the dependencies
    ```
    composer install
    ```

3. Copy the example env file and set the database connection

    `DB_CONNECTION`=pgsql

    `DB_HOST`=127.0.0.1

    `DB_PORT`=5432 (***Note:*** I'm Assuming you use default postgreSQL port)

    `DB_DATABASE`=***Your database name***

    `DB_USERNAME`=***Database username***

    `DB_PASSWORD`=***Database password***

4. Generate new application key
    ```
    php artisan key:generate
    ```

5. Run database migration
    ```
    php artisan migrate
    ```

6. Run local development server
    ```
    php artisan serve
    ```

## Testing Guide
### Manual Testing
1. Run database seeder

    ```
    php artisan db:seed
    ```
2. Click postman documentation link <a href="https://documenter.getpostman.com/view/18321467/2sA3rzJBzB">here</a>

3. Click button 'Run in Postman' on the top right corner of the page

4. Import the collection to the workplace do you want

5. After import completed, see available example by click right arrow in one of the request

6. Choose and double click the example and click button try


### PHPUnit
1. Run laravel testing command

    ```
    php artisan test
    ```

2. If all the tests pass, then all done 🎉
