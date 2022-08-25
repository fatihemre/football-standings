<?php

namespace Standings\Controller;

use Standings\Model\User;
use Standings\Model\FixtureView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login()
    {
        return $this->view('login');
    }

    public function logout()
    {
        session('user', -1);
        return redirectTo('/');
    }

    public function check(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        $user = (new User())->exists($email, $password);

        if(!$user) {
            flash('warning', 'User not found');
            redirectTo('/auth/login');
        }

        session('user', $user);

        return redirectTo('/manage');

    }
}
