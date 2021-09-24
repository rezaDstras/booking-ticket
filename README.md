
# Booking Cinema Ticket By Laravel!

### More Information
- Using Sanctum Package 
- Defining Separated Trait For RelationShips
- Testing Features And Unit For All Models And Api's
- Using Request For Request Validation
- Using Respurce For Returning Api's
- Using PipeLine For Filtering Available Seat's in TicketController (Located in Comment Part , If you would like to use please comment out that)
- Located Postman Collection 

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Generate a new JWT authentication secret key

    php artisan jwt:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

## Database seeding

Run the database seeder and you're done

    php artisan db:seed
