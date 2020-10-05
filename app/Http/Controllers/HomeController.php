<?php

namespace App\Http\Controllers;
use \App\contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function index1($contact)
    {
        return view('contact',['contact'=> $contact]);
    }
    public function store(Request $request ,$contact)
    {
        Contact::create([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'contact_id'=>$contact,
        ]);
        return redirect('/about');
    }
}
