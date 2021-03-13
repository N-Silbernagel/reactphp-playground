# ReactPHP-Playground

## This is a small reactPHP playground for myself and everybody who might need something similar

### Requirements

- Docker

### Setup

- clone this repo
- setup docker environment ```docker-compose-up```
- install dependencies ```docker-compose run php composer install```
  
### Run
- development server ```docker-compose run php nodemon main.php```
- "production" (not really) server ```docker-compose run php php main.php```