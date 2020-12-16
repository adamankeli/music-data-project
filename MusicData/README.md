
## About the project
Create a simple database schema and an import script to take the CSV and import the data into the database created.

The store also wants to provide their data to their affiliates, so you need to also create a simple API endpoint for them to retrieve all the album information in JSON format by using the SKU ID. EG http://localhost/api/album/1

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
    
to create the "album, artist and genre" tables in the database

** Next, start up the Laravel server using:

    cd into MusicData
    php artisan serve 

    Once that's done, you can navigate to http://127.0.0.1:8000/import-excel to see the 'Import Music Record' Page.


The album API has the following endpoints:

GET /api/album will return all album records and will be accepting GET requests.

GET /api/album/{id} will return a album record by referencing its id and will be accepting GET requests.

POST /api/album/create will create a new album record and will be accepting POST requests.

PUT /api/album/update/{id} will update an existing album record by referencing its id and will be accepting PUT requests.

DELETE /api/album/{id} will delete a album record by referencing its id and will be accepting DELETE requests.



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
