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
