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

# Override Login Redirect
### Link: https://laravel-news.com/override-login-redirects-in-jetstream-fortify

<strong>Create:</strong> app/Http/Responses/LoginResponse.class

<strong>Copy:</strong> 
<pre>
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
            return redirect()->back();
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
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse as TwoFactorLoginResponseContract;

public function boot()
{
    // ...
    
    $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
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
