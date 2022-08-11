<?php

namespace App\Http\Controllers\Frontend;

use App\Models\JobType;
use Illuminate\Http\Request;
use App\Models\JobApplycation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function indexPage(){
        $datas    = JobType::latest('id')->where('status','1')->get();
        $this->setPageTitle('Home', 'Mamurbeta Home','Mamurbeta Home');
        return view('frontend.page.index',compact('datas'));
    }
    public function userProfile(){
        $this->setPageTitle('User Profile', 'User Profile','Mamurbeta Home');
        return view('frontend.page.user.profile');
    }
    public function jobSingle($id){
        $single_job = JobType::with('user')->where('id','=',$id)->first();
        $user = DB::table('job_applycations')->select('user_id')->get();
        $this->setPageTitle('Single Page', 'Single Page','Single Page');
        return view('frontend.page.singleJob',compact('single_job'));
    }
    public function jobApply($id){
        $id = JobType::where('id','=',$id)->first();
        $this->setPageTitle('Apply Job', 'Apply Job','Apply Job');
        return view('frontend.page.jobApply',compact('id'));
    }
    public function search(Request $request){
        $search = $request->input('jobpost');
        $posts  = JobType::query()
        ->where('category', 'LIKE', "%{$search}%")
        ->get();
        $this->setPageTitle('Home', 'Mamurbeta Home','Mamurbeta Home');
        return view('frontend.page.search',compact('posts'));
    }
}
