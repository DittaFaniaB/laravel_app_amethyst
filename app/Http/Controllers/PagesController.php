<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /*
    public function index()
    {
        $title = 'Welcome to Amethyst!';
        return view('pages.index');
    }
    */
    
    public function index()
    {
        $title = 'Welcome to Amethyst!!';
        //theres 2 ways to passing params 
        // no 1 : return view('pages.index', compact('title'));
        //no 2
        return view('pages.index')->with('title', $title);
        //rules : with('name of var what we want to call it inside view', the real var's name )
    }

    public function about()
    {
        $title = 'ABOUT US';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'OUR SERVICE',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
