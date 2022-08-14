<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\News;
use App\Models\Picture;
use App\Models\NewsComment;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::latest()->paginate(25);
        $data = [];
        $i = 0;
        foreach ($news as $new) {
            $pictures = Picture::where('new_id', $new->id)->get();
            $comments = NewsComment::where('new_id', $new->id)->get();
            $data[$i]['new'] = $new;
            $data[$i]['pictures'] = $pictures;
            $data[$i]['comments'] = $comments;
            $i++;
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::create(['title' => $request->title, 'description' => $request->description, 'body' => $request->body]);
        $picture_url = $request->picture->store('public/');
        $picture_url = str_replace("public", "storage",  $picture_url);
        $picture_url = ENV('APP_URL') . $picture_url;
        $picture = Picture::create(['new_id' => $news->id, 'name' => $news->title, 'url' => $picture_url]);
        return response()->json(['new' => $news, 'picture' => $picture], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);

        return $news;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $news = News::findOrFail($id);
        $news->update($request->all());

        return response()->json($news, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::destroy($id);

        return response()->json(null, 204);
    }

    public function getFullNews($id)
    {
        $news = News::findOrFail($id);
        $pictures = Picture::where('new_id', $news->id)->get();
        $comments = NewsComment::where('new_id', $news->id)->get();
        return response()->json(['new' => $news, 'pictures' => $pictures, 'comments' => $comments], 200);
    }
}
