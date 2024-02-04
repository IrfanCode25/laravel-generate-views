# Laravel generate views

A Laravel package with Artisan command to create Blade views in the resources/views directory.

## Instalation

```bash
  composer require fancoders/laravel-generate-views
```

add service providers on file config/app.php

```bash
  'providers' => [
    // ...
    Fancode\LaravelGenerateViews\GenerateViewServiceProvider::class,
  ],
```

## Usage

for generate file blade without .blade.php extentions

```bash
  php artisan generate:view login

  output : login.blade.php
```

for directly generating folders and files

```bash
  php artisan generate:view auth/login

  output : auth/login.blade.php
```

for directly generating sub folders and files

```bash
  php artisan generate:view first/second/third/hello

  output : first/second/third/hello.blade.php
```
