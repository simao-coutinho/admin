Instalation

<pre>
composer require simaocoutinho/admin
</pre>

Publish Assets
<pre>
php artisan vendor:publish --tag="admin-public"
</pre>

Add in config/app.php
<pre>
'providers' => [
    ...
    \SimaoCoutinho\Admin\AdminServiceProvider::class
]
</pre>
