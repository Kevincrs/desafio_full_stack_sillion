# Define a imagem base
FROM php:8.1-apache

# Atualiza a lista de pacotes e instala as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    zlib1g-dev \
    default-mysql-client \
    default-mysql-server \
    && docker-php-ext-install pdo pdo_mysql && \
    a2enmod rewrite

# Habilita o módulo de reescrita do Apache
RUN a2enmod rewrite

# Copia o arquivo de configuração do Apache
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto para o diretório de trabalho
COPY . .

# Instale as dependências necessárias para o Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
    && apt-get install -y nodejs

# Instala as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install
RUN npm install

# Copia o arquivo .env.example para .env
COPY .env.example .env

# Gera a chave de criptografia
RUN php artisan key:generate

# Expõe a porta 80 do container
EXPOSE 80

# Inicia o servidor Apache
CMD ["apache2-foreground"]
