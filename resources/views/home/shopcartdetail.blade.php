@extends('layouts.frontbase')

@section('title', 'E-Commerce')


@section('content')
    <div class="col-sm-12 padding-right">
        <h2 class="title text-center">Features Items</h2>
        <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart_items as $rs)
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ Storage::url($rs->product->image) }}" style="width:40px">
                                    </td>
                                    <td class="cart_description">
                                        {{ $rs->product->title }}
                                    </td>
                                    <td class="cart_price">
                                        <p>${{ $rs->product->price }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <form action="{{ route('shopcart.addone') }}" method="post">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $rs->product_id }}" hidden>
                                                            <button type="submit" class="cart_quantity_up">+</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <input class="cart_quantity_input" type="text" name="quantity"
                                                            value="{{ $rs->quantity }}" autocomplete="off" size="2">
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('shopcart.minusone') }}" method="post">
                                                            @csrf
                                                            <input type="text" name="product_id"
                                                                value="{{ $rs->product_id }}" hidden>
                                                            <button class="cart_quantity_down">-</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>


                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">${{ $rs->quantity * $rs->product->price }}</p>
                                    </td>
                                    <td class="cart_delete">

                                        <form action="{{ route('shopcart.destroy') }}" method="post">
                                            @csrf
                                            <input type="text" name="cart_id" value="{{ $rs->id }}" hidden>
                                            <button class="cart_quantity_delete"><i class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $total = $total + $rs->quantity * $rs->product->price;
                                @endphp
                            @endforeach
                            <form action="{{route("shopcart.order")}}" method="post">
                            @csrf
                            <input type="text" name="total" value="{{$total}}" hidden>
                            <tr>
                                <td colspan="3"></td>
                                <td>
                                    <p class="cart_total_price">Total</p>
                                </td>
                                <td>
                                    <p class="cart_total_price">${{ $total }}</p>
                                </td>
                                <td>
                                    <button class="btn btn-default update" type="submit">Place Order</button>
                                </td>
                            </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        {{-- <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                        delivery cost.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="chose_area">
                            <ul class="user_option">
                                <li>
                                    <input type="checkbox">
                                    <label>Use Coupon Code</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Use Gift Voucher</label>
                                </li>
                                <li>
                                    <input type="checkbox">
                                    <label>Estimate Shipping & Taxes</label>
                                </li>
                            </ul>
                            <ul class="user_info">
                                <li class="single_field">
                                    <label>Country:</label>
                                    <select>
                                        <option>United States</option>
                                        <option>Bangladesh</option>
                                        <option>UK</option>
                                        <option>India</option>
                                        <option>Pakistan</option>
                                        <option>Ucrane</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field">
                                    <label>Region / State:</label>
                                    <select>
                                        <option>Select</option>
                                        <option>Dhaka</option>
                                        <option>London</option>
                                        <option>Dillih</option>
                                        <option>Lahore</option>
                                        <option>Alaska</option>
                                        <option>Canada</option>
                                        <option>Dubai</option>
                                    </select>

                                </li>
                                <li class="single_field zip-field">
                                    <label>Zip Code:</label>
                                    <input type="text">
                                </li>
                            </ul>
                            <a class="btn btn-default update" href="">Get Quotes</a>
                            <a class="btn btn-default check_out" href="">Continue</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>$59</span></li>
                                <li>Eco Tax <span>$2</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>$61</span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action--> --}}

    </div>
@endsection
