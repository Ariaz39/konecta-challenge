<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

- Laravel version: 8.83.26
- MySql version: 7.4

# Categories, Products and Sales management application

This application creates categories, products and makes sales, it also counts the products with the most sales and the largest quantity in stock

## Clone the repository

[https://github.com/Ariaz39/konecta-challenge.git](https://github.com/Ariaz39/konecta-challenge.git)

Create the .env file in the project root based on the .env.example file in order to set the environment variables.
In case of requiring the local database, it is hosted in the location below. 
> app/_devtools/konecta_challenge.sql


1. To install the dependencies of Laravel/Breeze (Authentication required) run  
```php 
node install && npm run watch
``` 



## Note 

> The database used for the project is MySql

### Migrations

Run the following command to run startup migrations.

```php
php artisan migrate
```

### Run Laravel project
```php
php artisan serve
```

## Finally
1. Register as a new user
2. Register a new Category
3. Register a new Product
4. Go to sales view to sell a product
5. Enjoy!

***
### Additionally, the requested statements are attached in .txt format in the path folder. And in the email sent 
> app/_devtools/requested_statements.txt


Autor: [Jorge Alejandro Arias Villalba © 2022](https://github.com/Ariaz39)
