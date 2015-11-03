<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function about() 
    {	
    	return view('pages.about', ['title'=>'About']);
    }

    public function contact() 
    {	
    	$title = 'Contact';
    	$contacts = ['phone', 'email', 'social'];
    	
    	return view('pages.contact', compact('title', 'contacts'));
    }

}
