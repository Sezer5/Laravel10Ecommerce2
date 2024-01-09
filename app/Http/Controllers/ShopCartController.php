<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\ShopCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShopCartController extends Controller
{

    protected $appends = [
        'cart_situtaion'
    ];
    public static function cart_situtaion(){
        $cart = DB::table('shop_carts')->where('user_id', '=', Auth::user()->id)->sum('quantity');
        return $cart;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_items = Shopcart::where('user_id', '=', Auth::id())->get();
        $settings=Settings::find(1);
        return view("home.shopcartdetail ",[
            'cart_items' => $cart_items,
            'settings' => $settings,
        ]);
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

        $data = ShopCart::where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
        if($data){
            $data->quantity=$data->quantity +  $request->input('quantity');
        }else{

        $data=new ShopCart();
        $data->product_id = $request->product_id;
        $data->quantity = $request->quantity;
        $data->user_id = Auth::user()->id;
        }
        $data->save();
        return back();
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
    public function destroy(Request $request)
    {
        $id=$request->cart_id;
        $data=ShopCart::find($id);
        $data->delete();
        return back();
    }

    public function addone(Request $request)
    {
        $data = ShopCart::where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
        $data->quantity=$data->quantity +  1;
        $data->save();
        return back();
    }

    public function minusone(Request $request)
    {
        $data = ShopCart::where('product_id',$request->product_id)->where('user_id',Auth::id())->first();
        $data->quantity=$data->quantity -  1;
        $data->save();
        return back();
    }
    
}
