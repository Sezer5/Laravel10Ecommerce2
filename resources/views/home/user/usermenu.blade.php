@php
    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist();
@endphp
<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach ($mainCategories as $rs)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $rs->id; ?>">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{ $rs->title }}
                            </a>
                        </h4>
                    </div>
                    <div id="<?php echo $rs->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>

                                @if (count($rs->children))
                                    @include('home.categorytree', ['children' => $rs->children])
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

            
            
           
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>User Menu</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/user/userprofile"> Profile</a></li>
                    <li><a href="#"> Orders</a></li>
                    <li><a href="#"> Reviews</a></li>
                    
                </ul>
            </div>
        </div><!--/brands_products-->

       

    </div>
</div>
