<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }
    public function store(Request $request)
    {
        $news = new News([
            'title' => $request->input('title'),
            'descripton' => $request->input('descripton'),
        ]);
        $news->save();
        return response()->json('news created!');
    }
    public function show($id)
    {
        $contact = News::find($id);
        return response()->json($contact);
    }
    public function update(Request $request, $id)
    {
       $news = News::find($id);
       $news->update($request->all());
       return response()->json('news updated');
    }
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return response()->json(' deleted!');
    }
}
