@extends('layouts.frontbase')

@section('title', 'E-Commerce')


@section('content')
    <div class="col-sm-12 padding-right">
        <h2 class="title text-center">Order Informations</h2>
        <section id="do_action">
            <div class="container">
                <div class="heading">
                    {{-- <h3>What would you like to do next?</h3>
                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                        delivery cost.</p> --}}
                </div>
                <div class="row">
                    {{-- <div class="col-sm-6">
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
                    </div> --}}
                    <form action="{{ route('shopcart.storeorder') }}" method="post">
                        @csrf
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>
                                        <input type="text" class="form-control" name="name"
                                            placeholder="Name & Surname">
                                    </li>
                                    <li>
                                        <input type="email" name="email" class="form-control" placeholder="E-mail">
                                    </li>
                                    <li>
                                        <textarea name="address" class="form-control" cols="30" rows="5" placeholder="Address"></textarea>
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                                    </li>
                                    <li>
                                        <textarea name="note" class="form-control" cols="30" rows="5" placeholder="Notes"></textarea>
                                    </li>
                                    <li>
                                        Total Cost: {{ $total }}
                                        <input type="text" name="total" value="{{ $total }}" hidden>
                                    </li>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="total_area">
                                <ul>
                                    <li>
                                        <input type="text" class="form-control" name="holder" placeholder="Card Holder">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="number" placeholder="Card Number">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="date" placeholder="Exp. Date">
                                    </li>
                                    <li>
                                        <input type="text" class="form-control" name="code"
                                            placeholder="Security Code">
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-default update">Order Now!</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section><!--/#do_action-->

    </div>
@endsection
