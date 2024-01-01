@extends('layouts.adminbase')
 
@section('title', 'Admin Page')
 
@section('content')
    
<!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Products
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>
              
            </div>
            <div class="box-body">
              <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Keywords</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Gallery</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{ \App\Http\Controllers\AdminPanel\ProductController::getParentsTree($rs->category_id, $rs->title) }}</td>
                                    <td>{{$rs->title}}</td>
                                    <td>{!! $rs->description !!}</td>
                                    <td>{{$rs->keywords}}</td>
                                    <td>{{$rs->status}}</td>


                                    @if($rs->image)
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                    @endif

                                    <td><a href="{{route('admin.images.show',['id'=>$rs->id])}}"
                                          onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')"
                                          >Gallery</a></td>
                                    <td><a href="{{route('admin.product.edit',['id'=>$rs->id])}}">Edit</a></td>
                                    <td><a href="{{route('admin.product.destroy',['id'=>$rs->id])}}">Delete</a></td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@endsection