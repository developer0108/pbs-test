# PBS test development log
**Laurent Duquesnoy**

## Installing 
- Created project using laravel installer 5.23.2
- Node package manager and bundler: bun 1.2.21

## Setting up database
- Laravel runs migrations
- Create models 
- Seed data (DatabaseSeeder.php)

## Setting up openexchange
- Create account, store app id in env

## Creating controllers
- Ordercontroller fetches orders from db and calculates exchange rates from app
- OrderService queries data, passes to Exchange service to get rates and parses data
- OrderController passes data to view

## Frontend
- Iterate columns
- Use simple js function to filter columns and set display to none if there is no match
