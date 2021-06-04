<p>
<a href="https://packagist.org/packages/simaocoutinho/admin"><img src="https://img.shields.io/badge/version-0.0.1-informational" alt="Latest Stable Version"></a>
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
php artisan vendor:publish --tag="admin/public"
</pre>

Publish Plugins
<pre>
php artisan vendor:publish --tag="admin/plugins"
</pre>

Add in config/app.php
<pre>
'providers' => [
    ...
    \SimaoCoutinho\Admin\AdminServiceProvider::class
]
</pre>
