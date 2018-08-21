# Laravel Model Metadata

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/badges/build.png?b=master)](https://scrutinizer-ci.com/g/wearetherobots/laravel-metadatable/build-status/master)
[![StyleCI](https://github.styleci.io/repos/143773998/shield?branch=master)](https://github.styleci.io/repos/143773998/shield?branch=master)

## Introduction

This package provides a very simple manage for metadata on models with a morphTo eloquent relationship for Laravel.

## Installation

Install the package via composer:

```bash
composer require watr/laravel-metadatable
```

## Setup

In order to setup this package, the next steps are needed.

### 1) Service Provider

If you don't use auto-discovery (Laravel 5.5+), add the MetadatableServiceProvider to the
providers array in `config/app.php`.

```php
WATR\Metadatable\MetadatableServiceProvider::class
```

### 2) Configuration file

Publish the `metadatable.php` configuration file under `app/config` using the following command:

```php
php artisan vendor:publish --provider="WATR\Metadatable\MetadatableServiceProvider"
```

The configuration like `table_name` and `model` can be changed.

### 3) Migrate

After configuring the table name, run migrations.

```php
php artisan migrate
```

## Usage

After the setup simple import the trait `WATR\Metadatable\Traits\HasMetadata` and use it in the model you want to have metadata.

```php
use Illuminate\Database\Eloquent\Model;
use WATR\Metadatable\Traits\HasMetadata;

class YourModel extends Model
{
    use HasMetadata;
}
```

The available methods are listed above:

```php
$model->metadata->set($key, $value): $this

$model->metadata->get($key, $default = null): mixed

$model->metadata->remove($key): $this

$model->metadata->has($key): boolean
```

## Note

This package does not provide magic functionality, for the metadata to work it is really important to save previously the related
model and the accessing the metadata.


## License

Laravel Sepomex is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
