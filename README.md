
## About the project
Create a simple database schema and an import script to take the CSV and import the data into the database created.

The store also wants to provide their data to their affiliates, so you need to also create a simple API endpoint for them to retrieve all the album information in JSON format by using the SKU ID. EG http://localhost/api/music/1

##Prerequisites
 - PHP 7.1 or Higher
 - Composer
 - MySql
 - Laravel 5.6 or Higher

## Instructions

** Open .env file and specify the host, database name, username, and password.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=music_data
DB_USERNAME=root
DB_PASSWORD=root

** execute the migrate Artisan command: 

    artisan migrate 
    
to create the "music" table in the database

** Next, start up the Laravel server using:

    php artisan serve 


The music API has the following endpoints:

GET /api/music will return all music records and will be accepting GET requests.

GET /api/music/{id} will return a music record by referencing its id and will be accepting GET requests.

POST /api/music/create will create a new music record and will be accepting POST requests.

PUT /api/musics/update/{id} will update an existing music record by referencing its id and will be accepting PUT requests.

DELETE /api/music/{id} will delete a music record by referencing its id and will be accepting DELETE requests.



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
