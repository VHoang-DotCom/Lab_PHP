<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function index()
    {
        $furnitures = Furniture::latest()->paginate(5);
        return view('furnitures.index',compact('furnitures'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('furnitures.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'productCode' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'avatar' => 'image',

        ]);

        Furniture::create($request->all());
        return redirect()->route('furnitures.index')->with('success','Created Successful.');
    }


    public function show(Furniture $furniture )
    {
        return view('furnitures.show',compact('furniture'));
    }


    public function edit(Furniture $furniture)
    {
        return view('furnitures.edit',compact('furniture'));
    }


    public function update(Request $request, Furniture $furniture)
    {
        $request->validate([
            'productCode' => 'required',
            'name'  => 'required',
            'price' => 'required',
            'avatar' => 'image',

        ]);
        $furniture->update($request->all());
        return redirect()->route('furnitures.index')->with('success','Updated Successful');
    }


    public function destroy(Furniture $furniture)
    {
        $furniture->delete();
        return redirect()->route('furnitures.index')->with('success','Blog has been deleted');
    }
}
