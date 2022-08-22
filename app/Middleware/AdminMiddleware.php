<?php

namespace Standings\Middleware;

use Buki\Router\Http\Middleware;
use Symfony\Component\HttpFoundation\Request;

class AdminMiddleware extends Middleware
{
    public function handle(Request $request)
    {
        if(!session('user') || session('user') === '')
        {
            return redirectTo('/manage/login');
        }

        return true;
    }
}