<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Settings;
use App\Models\ShopCart;
use App\Models\OrderProduct;
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

    public function order(Request $request)
    {

        $cart_items = Shopcart::where('user_id', '=', Auth::id())->get();
        $settings=Settings::find(1);
        $total = $request->total;
        return view("home.order ",[
            'cart_items' => $cart_items,
            'settings' => $settings,
            'total' => $total,
        ]);
    }

    public function storeorder(Request $request)
    {
        $data = new Order();
        $data->name = $request->name;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->note = $request->note;
        $data->total = $request->total;
        $data->user_id = Auth::id();
        $data->IP = $_SERVER['REMOTE_ADDR'];
        $data->save();

        $datalist=Shopcart::where('user_id',Auth::id())->get();
        foreach($datalist as $rs){
            $data2= new OrderProduct();
            $data2->user_id=Auth::id();
            $data2->product_id=$rs->product_id;
            $data2->order_id=$data->id;
            $data2->price=$rs->product->price;
            $data2->quantity=$rs->quantity;
            $data2->amount=$rs->quantity * $rs->product->price;
            $data2->note=$data->note;
            $data2->save();
        }
        $data3 = Shopcart::where('user_id',Auth::id());
        $data3->delete();
        return redirect()->route('home');
        
    }

    public function myorders()
    {
        $orders = Order::where('user_id', '=', Auth::id())->get();
        $settings=Settings::find(1);
        return view("home.myorders ",[
            'orders' => $orders,
            'settings' => $settings,
        ]);
    }
    public function orderdetail(string $id)
    {
        $order_items = OrderProduct::where('order_id', '=', $id)->get();
        $settings=Settings::find(1);
        return view("home.orderdetail ",[
            'order_items' => $order_items,
            'settings' => $settings,
        ]);
    }
    
}
