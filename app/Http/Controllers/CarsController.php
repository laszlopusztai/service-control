<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Inertia\Response;
use App\Models\CarType;
use Inertia\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use Illuminate\Http\RedirectResponse;

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

    /**
     * @return Response|ResponseFactory
     */
    public function create() : Response|ResponseFactory
    {
        return inertia('Cars/Create', [
            'carTypes' => CarType::all()->pluck('type', 'id')->toArray(),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request) : RedirectResponse
    {
        Car::create([
            'plate_number' => $request->get('plate_number'),
            'type_id' => $request->get('type_id'),
            'user_id' => 1,
        ]);

        return to_route('cars.index');
    }
}
