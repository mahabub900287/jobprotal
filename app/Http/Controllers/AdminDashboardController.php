<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    public function dashboard(){
        // breadcrumb
        $breadcrumb = ['Dashboard' => ''];
        $this->setPageTitle('Admin Dashboard');
        return view('backend.pages.dashboard.index',compact('breadcrumb'));
    }
    public function userDashboard(){
        $this->setPageTitle('User Dashboard');
        return view('frontend.page.user.profile',compact('breadcrumb'));
    }
}
