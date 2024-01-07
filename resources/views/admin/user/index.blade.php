@extends('layouts.adminbase')
 
@section('title', 'Admin Page')
 
@section('content')
    
<!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Roles
            
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
              <h3 class="box-title">Users</h3>
              
            </div>
            <div class="box-body">
              <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>User Roles</th>
                                <th>All Roles</th>
                                <th>Add Role</th>
                            </tr>
                            @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    
                                    <td>{{$rs->email}}</td>
                                    <td>
                                    @foreach($rs->roles as $role)
                                            {{$role->name}} <a href="{{route('admin.user.destroy',['uid'=>$rs->id,'rid'=>$role->id])}}">X</a><br>
                                    @endforeach
                                    </td>
                                    <form action="{{route('admin.user.store')}}" method="post">
                                    @csrf
                                    <td>
                                      <select name="roles" class="form-control">
                                        @foreach ($roles as $as)
                                            <option value="{{$as->id}}">{{$as->name}}</option>
                                        @endforeach
                                      </select>
                                    </td>
                                    <input type="text" name="user_id" value="{{$rs->id}}" hidden>
                                    <td>
                                      <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i> Add</button>
                                    </td>
                                  </form>

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