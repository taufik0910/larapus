<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserShouldVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       // return $next($request);
       $response = $next($request);
if (Auth::check() && !Auth::user()->is_verified) {
Auth::logout();
Session::flash("flash_notification", [
"level"
=> "warning",
<<<<<<< HEAD
"message" => "Akun Anda belum aktif. Silahkan klik pada link aktivasi yang telah kami
=======
"message" => "Akun Anda belum aktif. Silahkan klik pada link aktivasi yang telah kami\
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
kirim."
]);
return redirect('/login');
}
return $response;
    }
}
<<<<<<< HEAD

=======
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
