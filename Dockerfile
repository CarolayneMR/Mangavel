FROM php:latest as laravel12

# Instalar unzip
RUN apt update && apt install -y unzip && apt-get install zip 

# Instalar Composer de outra forma, mas com o mesmo resultado
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar as variáveis de ambiente
ENV HOME="/root"
ENV PATH="/root/.composer/vendor/bin:${PATH}:/root/.bun/bin"

# Instalar Bun
RUN curl -fsSL https://bun.sh/install | bash

# Criar alguns symlinks para o executável bun
RUN ln -s $(which bun) /usr/local/bin/npm
RUN ln -s $(which bunx) /usr/local/bin/npx

# Instalar o Laravel Installer
RUN composer global require laravel/installer

# Instalar a extensão pcntl
RUN docker-php-ext-install pcntl

RUN pecl install mongodb && docker-php-ext-enable mongodb

FROM laravel12
WORKDIR /app
COPY . /app
RUN composer install 
RUN npm install 
EXPOSE 8000
EXPOSE 5173
CMD ["composer", "run", "dev" ]