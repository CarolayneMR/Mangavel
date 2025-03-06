FROM php:latest

# Instalar unzip
RUN apt update && apt install -y unzip

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

# Instalar a extensão mongodb
RUN pecl install mongodb && docker-php-ext-enable mongodb

# Defina o diretório de trabalho no container
WORKDIR /var/www

# Copie os arquivos da aplicação Laravel para o container
COPY . .

# Instale as dependências do Laravel via Composer
RUN composer install --no-dev --optimize-autoloader

# Ajuste as permissões do diretório para o Nginx e Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponha a porta 8000 para o PHP
EXPOSE 8000

#Exponhe a porta do VITE < front
EXPOSE 5173

# Padrãozinho para rodar
CMD ["composer" , "run" , "dev"]