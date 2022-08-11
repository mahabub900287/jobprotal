<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getData = JobType::latest('id')->get();
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Job Post'=>'',];
        $this->setPageTitle('Job Post');
        return view('backend.pages.job-post.index',compact('getData','breadcrumb'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job_post = JobType::find($id);
        $breadcrumb = ['Dashboard' => route('admin.dashboard'),'Job Post'=>'','Edit'=>''];
        $this->setPageTitle('Job Post');
        return view('backend.pages.job-post.form',compact('job_post','breadcrumb'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job_post = JobType::find($id);
        $job_post->update([
            'status' =>$request->status
        ]);
        toastr()->success('Update Successfully.', 'Success');
        return redirect()->route('admin.job-post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
