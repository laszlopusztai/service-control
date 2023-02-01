<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Response;
use Inertia\ResponseFactory;
use App\Http\Resources\CarResource;

class CarsController extends Controller
{
    /**
     * @return Response|ResponseFactory
     */
    public function index() : \Inertia\Response|\Inertia\ResponseFactory
    {
        $cars = CarResource::collection(Car::all());

        return inertia('Cars/Index', [
            'cars' => $cars
        ]);
    }
}
