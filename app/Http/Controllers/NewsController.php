<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $news = new News;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->auther = $request->author;
        if(isset($request->published)){
            $news->published = true;
            $msg = "It is published";
        }else{
            $news->published = false;
            $msg = "It is not published";
        }
        $news->save();
        return "The title is " . $request->title . ".<br>The content is " . $request->content . ".<br>The auther is " . $request->author . ".<br>$msg.";
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
}
