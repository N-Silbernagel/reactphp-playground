# ReactPHP-Test

## This is a small reactPHP playground for myself and everybody who might need something similar

### Requirements

- Docker

### Setup

- clone this repo
- setup docker environment ```docker-compose build```
- install dependencies ```docker-compose run php composer install```
  
### Run
- development server ```docker-compose up```
- "production" (not really) server ```docker-compose -f docker-compose.yml -f docker-compose.prod.yml up```