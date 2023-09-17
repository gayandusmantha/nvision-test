# nvision_test
   - Starting time: 2023-sep-17 11.00
   - Completed time: 2023-sep-17 15.30

## This project includes 3 docker containers 
    1. Database > db_nvision
    2. Nginx > nginx_nvision
    3. Php > php_nvision
## Run the project 

   ##  Clone the project and  run command 
      `docker compose up -d`
   ## Change the .env file database credentials 
          DB_CONNECTION=mysql
          DB_HOST=db_nvision
          DB_PORT=3318
          DB_DATABASE=nvision
          DB_USERNAME=root
          DB_PASSWORD=nvision123
          
   ## Additional.env changes
         QUEUE_CONNECTION=database   ***change the existing value to the database 
         REMOTE_ENDPOINT_URL=https://wibip.free.beeceptor.com
   ## Once Container is getting up run the following commands 
       docker exec -it php_nvision composer install;
       docker exec -it php_nvision php artisan migrate;
       docker exec -it php_nvision php artisan db:seed;
       docker exec -it php_nvision php artisan passport:install;

   ## Please import postman environment and collection and execute the API (collection located root folder )    
      
     
      
