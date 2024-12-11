# Getting started

## Installation

After uncompress project folder you need to do the following 

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Create New database in your Mysql server 

change database name in your .env with all credential


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

## Testing
  you can  use this command to run test cases 
      php artisan test
  
## Use Apis
 you need to change base url with your local server url 
 to test apis you can find  Ads Manager.postman_collection in root folder 
