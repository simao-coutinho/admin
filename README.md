<p>
<a href="https://packagist.org/packages/simaocoutinho/admin"><img src="https://img.shields.io/badge/version-0.3.1-informational" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/simaocoutinho/admin"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Instalation

# Install Jetstream

## Follow link: https://jetstream.laravel.com/2.x/installation.html

# Install LaravelDebugbar

<pre>
composer require barryvdh/laravel-debugbar --dev
</pre>

<pre>
composer require simaocoutinho/admin
</pre>

Publish Public Assets
<br>
<small>Assets that will change according the project</small>
<pre>
php artisan vendor:publish --tag="admin-public"
</pre>

Publish Views
<pre>
php artisan vendor:publish --tag="admin-views" --force
</pre>

<strong>In file: </strong>config/filesystem.php
<br>
<strong>Replace:</strong>
<pre>
'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],
</pre>

by:

<pre>
'public' => [
            'driver' => 'local',
            'root' => public_path('uploads'),
            'url' => env('APP_URL').'/uploads',
            'visibility' => 'public',
        ],
</pre>

## Debug Only for developer
<strong>In file: </strong>config/app.php
<br>
<strong>Replace:</strong>

<pre>
    'debug' => (bool) env('APP_DEBUG', false),
</pre>

by:

<pre>
    'debug' => value(function() {
        if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] == 'IP')
            return true;

        return false;
    }),
</pre>

# Override Redirect on PageExpired

<strong>In file: </strong>app/Exceptions/Handler.php

<strong>Add:</strong>

<pre>
public function render($request, Throwable $e)
    {
        if ($e instanceof TokenMismatchException) {

            return redirect('/login');

        }

        return parent::render($request, $e);
    }
</pre>

# Override Login & Register Redirect

### Link: https://laravel-news.com/override-login-redirects-in-jetstream-fortify

<strong>Create:</strong> app/Http/Responses/LoginResponse.class

<strong>Copy:</strong>
<pre>
namespace App\Http\Responses;

use Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        if (Auth::user()->type == 'client') {
            return redirect()->route('home');
        } else {
            return  redirect()->route('dashboard');
        }
    }
}
</pre>

<strong>Create:</strong> app/Http/Responses/RegisterResponse.class

<strong>Copy:</strong>

<pre>
namespace App\Http\Responses;

use Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{

    public function toResponse($request)
    {
        if (Auth::user()->type == 'client') {
            return redirect()->route('home');
        } else {
            return  redirect()->route('dashboard');
        }
    }
}
</pre>

<strong>In file: </strong> FortifyServiceProvider.class

<strong>Add:</strong>
<pre>
use App\Http\Responses\LoginResponse;
use App\Http\Responses\RegisterResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;

public function boot()
{
    // ...
    
    $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    $this->app->singleton(RegisterResponseContract::class, RegisterResponse::class);
    $this->app->singleton(TwoFactorLoginResponseContract::class, LoginResponse::class);
}
</pre>

# Check if user is active on login

<strong>In file: </strong>app/Providers/JetstreamServiceProvider.php

<strong>Add:</strong>

<pre>
public function boot()
    {
        ...

        // Verifica se o user está ativo
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->state == 1) {
                    return $user;
                }
            }

            return null;
        });
    }
</pre>

# Force HTTPS via htaccess

<pre>
# Force HTTPS
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</pre>
