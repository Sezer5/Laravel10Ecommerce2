<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $active_slider = DB::table('sliders')->first();
        $other_slider = Slider::all()->skip(1);
        $products=Product::all();
        return view('home.index', ['active_slider' => $active_slider,'other_slider'=>$other_slider,'products'=>$products]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function productdetail(string $id)
    {
        $data=Product::find($id);
        $gallery = DB::table('images')->where('product_id', '=', $id)->get();
        return view("home.productdetail ",[
            'data' => $data,
            'gallery' => $gallery
        ]);
    }
}
