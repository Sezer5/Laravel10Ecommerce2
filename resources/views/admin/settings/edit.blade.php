@extends('layouts.adminbase')
 
@section('title', 'Admin Page')
 
@section('content')
    
<!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Edit Settings
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
              <h3 class="box-title">Title</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <form role="form" action="{{route('admin.settings.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keywords</label>
                                    <input type="text" name="keywords" class="form-control" value="{{$data->keywords}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descriptions</label>
                                    <input type="text" name="description" class="form-control" value="{{$data->description}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <select name="status" class="form-control">
                                        <option selected>{{$data->status}}</option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{$data->phone}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mail</label>
                                    <input type="text" name="mail" class="form-control" value="{{$data->mail}}">
                                </div>
                                
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
            </div><!-- /.box-body -->
            <div class="box-footer">
              Footer
            </div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

@endsection