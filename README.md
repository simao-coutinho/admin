<p>
<a href="https://packagist.org/packages/simaocoutinho/admin"><img src="https://img.shields.io/badge/version-0.3.1-informational" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/simaocoutinho/admin"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Instalation

<pre>
composer require simaocoutinho/admin
</pre>

Publish Public Assets
<br>
<small>Assets that will change according the project</small>
<pre>
php artisan vendor:publish --tag="admin-public"
</pre>

Publish Migrations
<pre>
php artisan vendor:publish --tag="admin-migrations"
</pre>

Publish Views
<pre>
php artisan vendor:publish --tag="admin-views"
</pre>

Remove from app.css
<pre>
max-width: 65ch;

on

.prose {
  color: #374151;
  max-width: 65ch;
}
</pre>

Add to .env
<pre>
APP_LOGO="${APP_URL}/img/image.png"
APP_LOGO_SQUARE="${APP_URL}/img/image.png"
</pre>


config/filesystem.php
substituir
<pre>
'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
</pre>

por:

<pre>
'public' => [
            'driver' => 'local',
            'root' => public_path('uploads'),
            'url' => env('APP_URL').'/uploads',
            'visibility' => 'public',
        ],
</pre>
