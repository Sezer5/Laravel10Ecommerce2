@foreach ($children as $subcategory)
    @if(count($subcategory->children))
        <li>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#<?php echo $subcategory->id;?>" href="#<?php echo $subcategory->id;?>">
                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                        {{ $subcategory->title }}
                    </a>
                </h4>
            </div>
            <div id="<?php echo $subcategory->id;?>" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul>
                        <li> @include('home.categorytree', ['children' => $subcategory->children])</li>

                    </ul>
                </div>
            </div>
        </div>
        </li>
    @else
        <li><a href=""></a>{{ $subcategory->title }}</li>
    @endif
@endforeach
{{-- @foreach($children as $subcategory)
    @if(count($subcategory->children))
        <li>{{$subcategory->title}}</li>
        <li>
            @include('home.categorytree',['children' => $subcategory->children])
        </li>

    @else
        <li>{{$subcategory->title}}</li>
    @endif
@endforeach --}}