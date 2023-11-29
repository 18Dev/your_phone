## SETUP PROJECT

- Clone git
````
git clone https://github.com/18Dev/your_phone.git
````

- Setup
    - Cd project
    ````
     cd your_phone
    ````
    - Setup docker
    ````
    docker-compose bulid
    docker-compose up -d
    ````
    - Create database
    ````
    docker exec -it [CONTAINER ID] bash
    php artisan migrate
    ````  
    - Fake data
    ````
    php artisan db:seed
    ````  
    - Make link storage
    ````
    php artisan storage:link
    ````  

    
