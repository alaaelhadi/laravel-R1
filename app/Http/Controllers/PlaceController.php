<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common;

class PlaceController extends Controller
{
    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::get();
        return view('placesList', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addPlaces');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string|max:100',
            'priceFrom'=>'required|numeric',
            'priceTo'=>'required|numeric',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'
        ], $messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image'] = $fileName;
        $data['published'] = isset($request['published']);
        Place::create($data);
        return redirect('placesList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function messages()
    {
        return [
            'title.required'=>'العنوان مطلوب',
            'description.required'=> 'يجب ان يكون نص',
            'priceFrom.required'=>'الحد الادني من السعر مطلوب',
            'priceTo.required'=> 'الحد الاقصى من السعر مطلوب',
            'image.required'=> 'الصورة مطلوبة',
            'image.mimes'=> 'Extension must be png or jpg or jpeg'
        ];
    }

    public function placeMainPage()
    {
        $places = Place::take(6)->get();
        return view('place', compact('places'));
    }
}
