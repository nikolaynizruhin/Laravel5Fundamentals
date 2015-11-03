<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\FooRepository;

class FooController extends Controller
{
    public function foo(FooRepository $repository)
    {
        return $repository->get();
    }
}
