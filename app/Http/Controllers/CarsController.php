<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Inertia\Response;
use App\Models\CarType;
use App\Mail\CarDeleted;
use Inertia\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Resources\CarResource;
use Illuminate\Support\Facades\Mail;
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

    /**
     * @param Car $car
     * @return Response|ResponseFactory
     */
    public function show(Car $car) : Response|ResponseFactory
    {
        return inertia('Cars/Show', [
            'car' => new CarResource($car)
        ]);
    }

    /**
     * @param Car $car
     * @return RedirectResponse
     */
    public function destroy(Car $car) : RedirectResponse
    {
        $car->delete();

        Mail::to(auth()->user())->queue(new CarDeleted());

        return to_route('cars.index');
    }
}
