<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function userLogin(){
        $this->setPageTitle('User Login Page', 'User Login Page','User Login Page');
        return view('frontend.page.user.login');
    }
}
