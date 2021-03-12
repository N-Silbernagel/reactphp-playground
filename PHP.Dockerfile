FROM php:8.0.3-buster
LABEL Name=reactphptest Version=0.0.1
RUN apt -y update
RUN apt install -y zip unzip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt install -y nodejs
RUN npm i -g nodemon
WORKDIR /app
