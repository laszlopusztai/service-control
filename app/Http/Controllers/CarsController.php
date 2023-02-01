<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Inertia\ResponseFactory;

class CarsController extends Controller
{
    /**
     * @return Response|ResponseFactory
     */
    public function index() : \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('Car/Index');
    }
}
