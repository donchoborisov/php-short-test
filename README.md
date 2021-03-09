# PHP Developer Short Test
#### Avant

------

Create a simple application in which you can enter two postcodes and the system will return the distance between the two postcodes.

### Task

- Build a simple form to collect the `From` and `To` postcodes.
  
- On submission of the form, the application should calculate the distance between the two postcodes and provide the
  result in the measuring units defined in a config file.
  
- If the same postcode is entered for both the `From` and `To` fields, a custom exception should be thrown.

- All code should be committed to a git branch in your name.

### Setup

1. `composer install`

2. Create and configure the `.env` file 

3. `php artisan key:generate`

4. `php artisan migrate`

5. Import the postcodes.sql file into your database

### Notes
- This is a clean/new installation of laravel

- A list of all uk postcodes, with their latitude and longitude can be found in the `postcodes.sql` file.
  You can import this file into your applications database.

- To calculate distance between a pair of lat/lng you can use the formula provided on
  [geodatasource.com/developers/php](https://www.geodatasource.com/developers/php)
