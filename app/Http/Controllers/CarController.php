<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use Illuminate\Support\Facades\Redirect;

class CarController extends Controller
{
    private $columns = ['carTitle', 'description','published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    { 
        $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:100'
        ]);  
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        Car::create($data);        
        return redirect('cars');
        // $cars = new Car;
        // $cars->carTitle = $request->carTitle;
        // $cars->description = $request->description;
        // if(isset($request->remember)){
        //     $cars->published = true;
        // }else{
        //     $cars->published = false;
        // }
        // $cars->save();
        // return "Car Data Added Successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('carDetail', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('updateCar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        Car::where('id', $id)->update($data);        
        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();        
        return redirect('cars');
    }

    public function trashed()
    {
        $cars = Car::onlyTrashed()->get();        
        return view('trashed', compact('cars'));
    }

    public function restore(string $id): RedirectResponse
    {
        Car::where('id', $id)->restore();        
        return redirect('cars');
    }

    public function delete(string $id): RedirectResponse
    {
        Car::where('id', $id)->forceDelete();
        return redirect('cars');
    }
}
