<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    private $columns = ['title', 'content', 'published', 'auther'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showNews = News::get();
        return view('news', compact('showNews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        News::create($data);        
        return redirect('news');
        //return dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('newsDetail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('updateNews', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;
        News::where('id', $id)->update($data);        
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::where('id', $id)->delete();        
        return redirect('news');
    }
}
