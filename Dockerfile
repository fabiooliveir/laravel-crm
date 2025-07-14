# Use uma imagem base oficial do PHP com Apache
FROM php:8.2-apache

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Instale as dependências do sistema e as extensões PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    libicu-dev \
    gettext \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip bcmath sockets intl calendar

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ative o mod_rewrite do Apache para URLs amigáveis
RUN a2enmod rewrite

# Copie o código da aplicação para o container
COPY . .

# Copie a configuração personalizada do Apache, desative o site padrão e ative o nosso.
COPY 000-default.conf /etc/apache2/sites-available/krayin.conf
RUN a2dissite 000-default.conf && a2ensite krayin.conf

# Instale as dependências do Composer para produção
RUN composer install --no-interaction --optimize-autoloader --no-dev

# Compile os assets do frontend
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs
RUN npm install && npm run build

# Defina as permissões corretas para as pastas do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Crie o link simbólico do storage.
RUN rm -rf /var/www/html/public/storage
RUN php artisan storage:link

# Copie o script de entrypoint para o container e dê-lhe permissão de execução
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Defina o entrypoint para ser o nosso script
ENTRYPOINT ["entrypoint.sh"]

# Exponha a porta 80 (o entrypoint irá alterá-la para a porta do Cloud Run)
EXPOSE 80
