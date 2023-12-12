<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common;
use Illuminate\Support\Facades\Redirect;

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
        $place = Place::findOrFail($id);
        return view('placeDetail', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::findOrFail($id);
        return view('updatePlace', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string|max:100',
            'priceFrom'=>'required|numeric',
            'priceTo'=>'required|numeric',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048'
        ], $messages);

        // Update image if new file selected
        if ($request->hasFile('image')) {
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image'] = $fileName;
        }
        $data['published'] = isset($request['published']);
        Place::where('id', $id)->update($data);
        return redirect('placesList');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Place::where('id', $id)->delete();
        return redirect('placesList');
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
