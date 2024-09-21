# Telegram library for Laravel

## Installation

Library requires: 

- PHP 8.1 or higher
- Laravel 10.x or higher

You can install library via composer:

```shell
composer require vbespalov/laravel-telegram
```

## Publishing config

Optionally, you can publish the package’s config file:

```shell
php artisan vendor:publish --provider="Vbespalov\LaravelTelegram\TelegramServiceProvider" --tag="telegram-config"
```

## Usage

Simple example of usage:
```php
Telegram::getMe()
```
