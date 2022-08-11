<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\StrongPassword;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Registration Page', 'Registration Page','Registration Page');
        return view('frontend.page.user.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name'           => ['required','max:60'],
            // 'last_name'            => ['required','max:60'],
            // 'email'                => ['required','email','unique:users,email'],
            // 'phone_number'         => ['required','unique:users,phone_no','max:17'],
            // 'password'             => ['required','confirmed'],
            // 'company_name'         => ['required','unique:users,company_name'],
            // 'company_website'      => ['nullable','unique:users,company_website'],
            // 'address'              => ['required','string']
        ]);
        User::create([
            'fname'           => $request->fname,
            'lname'           => $request->lname,
            'email'           => $request->email,
            'password'        => Hash::make($request->password),
            'company_name'    => $request->company_name,
            'company_website' => $request->company_website,
            'phone_no'        => $request->phone
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
