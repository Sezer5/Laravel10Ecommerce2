@extends('layouts.adminbase')
 
@section('title', 'Admin Page')
 
@section('content')
    
<!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Sliders
            
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
              <h3 class="box-title">Sliders</h3>
              
            </div>
            <div class="box-body">
              <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                
                                <th>Title</th>
                                <th>Second Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->title}}</td>
                                    <td>{{$rs->title_second}}</td>
                                    <td>{!! $rs->description !!}</td>
                                    @if($rs->image)
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                    @endif
                                    <td><a href="{{route('admin.sliders.destroy',['id'=>$rs->id])}}">Delete</a></td>



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