#!/bin/sh

# Este script é executado quando o container do Cloud Run arranca.

# 1. Altera a porta de escuta do Apache para a porta fornecida pelo Cloud Run.
# A variável ${PORT} é injetada automaticamente pelo Cloud Run. Se não existir, usa a porta 80 por defeito.
sed -i "s/Listen 80/Listen ${PORT:-80}/g" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf

# 2. Inicia o servidor Apache em primeiro plano (foreground).
# O Cloud Run precisa que o processo principal não termine.
apache2-foreground
