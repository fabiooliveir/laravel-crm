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

# CORREÇÃO: Cria o arquivo 'installed' para evitar o redirecionamento para a instalação.
# Este comando garante que a aplicação saiba que já foi instalada.
touch storage/installed

# Executa o comando principal do contêiner (neste caso, o supervisor).
exec "$@"

