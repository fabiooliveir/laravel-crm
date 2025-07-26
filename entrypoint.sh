#!/bin/sh

# Para a execução do script se qualquer comando falhar
set -e

# Gera a chave da aplicação, se não existir
php artisan key:generate --force

# Executa as migrações do banco de dados.
# O --force é necessário para executar em ambiente de produção sem interação.
php artisan migrate --force

# Gera o link simbólico para o armazenamento de arquivos públicos.
php artisan storage:link

# Executa o comando principal do contêiner (no nosso caso, 'php-fpm').
exec "$@"
