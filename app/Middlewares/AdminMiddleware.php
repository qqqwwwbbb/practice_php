<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AdminMiddleware
{
    public function handle(Request $request)
    {
//Если пользователь не админ, то редирект на главную страницу
        if (app()->auth::user()->login !== 'admin') {
            app()->route->redirect('/hello');
        }
    }
}