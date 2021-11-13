<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\news;

class NewsController extends Controller
{

    public function index()
    {
        $news = news::latest()->paginate(5);
        return view('news.index',compact('news'))->with('i',(request()->input('page',1)-1)*5);
    }


    public function create()
    {
        return view('news.create');
    }


    public function store(Request $request)
    {
        $request->validate([
           'newsCode' => 'required',
            'title'  => 'required',
            'description' => 'required',
            'image' => 'image',
            'content' => 'required',
            'createdBy' => 'required',
            'adminID' => 'required',
        ]);

        news::create($request->all());
        return redirect()->route('news.index')->with('success','Created Successful.');
    }


    public function show(news $news)
    {
        return view('news.show',compact('news'));
    }


    public function edit(news $news)
    {
        return view('news.edit',compact('news'));
    }


    public function update(Request $request, news $news)
    {
        $request->validate([
            'newsCode' => 'required',
            'title'  => 'required',
            'image' => 'required',
            'description' => 'required',
            'content' => 'required',
            'createdBy' => 'required',
            'adminID' => 'required',
        ]);
        $news->update($request->all());
        return redirect()->route('news.index')->with('success','Updated Successful');
    }


    public function destroy(news $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success','News has been deleted');
    }
}
