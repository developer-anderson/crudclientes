# Projeto de Cadastro de Clientes

Este é um projeto de cadastro de clientes desenvolvido em Laravel.

## Pré-requisitos

Certifique-se de ter o seguinte instalado no seu ambiente:

- PHP (recomendado 7.4 ou superior)
- Composer (https://getcomposer.org/)
- MySQL ou outro banco de dados compatível
- XAMPP, WAMP, ou outra solução de servidor local (opcional)

## Instalação

cd projeto-cadastro-clientes
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=ClientesTableSeeder
php artisan serve
