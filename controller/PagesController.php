<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$title = "welcome to index page";
    	return view("pages.index", compact('title'));
    }

    public function about(){
    	$title = "welcome to about page";
    	return view("pages.about")->with('title',$title);
    }

    public function services(){
    	$data = array('title' => "welcome to services page",
                      'services' => ['webdesign', 'webdev', 'prog']);
    	
    	return view("pages.services")->with($data);
    }
}
