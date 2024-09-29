<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Descrição

Sistema em Laravel com o objetivo de gerenciar clientes de forma eficiente, validando os dados e os mantendo em um banco de dados.

## Instalação

- Instale o servidor PHP XAMPP.
- Instale o Composer, necessário para instalar o Laravel.
- Clone este repositório:
```
git clone https://github.com/CarlosECarneiro/Desafio-Laravel
```
- No XAMPP, inicie o MySQL e crie o banco de dados.
- Crie o arquivo .env com base no .env.example modificando a parte do banco de dados.
- No local do projeto, instale as dependências do composer:
```
composer install
```
- Execute as migrações do banco de dados:
```
php artisan migrate
```
- Inicie o servidor local:
```
php artisan serve
```
- Acesse o sistema pelo navegador. (Endereço padrão: http://127.0.0.1:8000)
