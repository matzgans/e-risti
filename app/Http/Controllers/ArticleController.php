<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::get();
        return response()->json(['message'=> 'success','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'author'=>['required'],
            'published'=>['required'],
            'thumbnail_img'=>['required'],
        ]);

        $article = Article::create($request->all());
        return response()->json(['message'=>'success','data'=>$article]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Article::FindOrFail($id);
        return response()->json(['message'=> 'success','data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'title'=>['required'],
        //     'description'=>['required'],
        //     'author'=>['required'],
        //     'published'=>['required'],
        //     'thumbnail_img'=>['required'],
        // ]);
        $data = Article::FindOrFail($id);
        $data->update($request->all());
        return response()->json(['message'=>'success','data'=>$data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::FindOrFail($id);
        $data->delete();
        return response()->json(['message'=>'success','data'=>[]]);
    }
}
