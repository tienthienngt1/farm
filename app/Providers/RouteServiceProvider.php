<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
  /**
  * The path to the "home" route for your application.
  *
  * This is used by Laravel authentication to redirect users after login.
  *
  * @var string
  */
  public const HOME = '/home';

  /**
  * The controller namespace for the application.
  *
  * When present, controller route declarations will automatically be prefixed with this namespace.
  *
  * @var string|null
  */
  // protected $namespace = 'App\\Http\\Controllers';

  /**
  * Define your route model bindings, pattern filters, etc.
  *
  * @return void
  */
  public function boot() {
    /**
    $gettime = get_headers("https://google.com")[3];
    $gethour = explode(' ', $gettime)[5];
    $D = (int)explode(' ', $gettime)[2];
    $M = 5;
    $Y = (int)explode(' ', $gettime)[4];
    $h = (int)explode(':', $gethour)[0] + 7;
    $m = (int)explode(':', $gethour)[1];
    $s = (int)explode(':', $gethour)[2];
    $timeint = mktime($h, $m, $s, $M, $D, $Y);
    $time = date("Y-m-d H:i:s", $timeint);
    $addtime = date("Y-m-d H:i:s", strtotime('+2 hour', $timeint));
    echo \Carbon\Carbon::now()->add(2, 'hour');
    echo '<br />';
    echo $addtime;
    return;
    dd($addtime);
    dd(\Carbon\Carbon::now()->add(3, 'hour'));
    */
    //
    $this->configureRateLimiting();

    $this->routes(function () {
      Route::prefix('api')
      ->middleware('api')
      ->namespace($this->namespace)
      ->group(base_path('routes/api.php'));

      Route::middleware('web')
      ->namespace($this->namespace)
      ->group(base_path('routes/web.php'));
    });
  }

  /**
  * Configure the rate limiters for the application.
  *
  * @return void
  */
  protected function configureRateLimiting() {
    RateLimiter::for ('api', function (Request $request) {
      return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
    });
  }
}