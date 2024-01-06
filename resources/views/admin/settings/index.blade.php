@extends('layouts.adminbase')

@section('title', 'Admin Page')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Settings

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
                    <h3 class="box-title">Settings</h3>

                </div>
                <div class="box-body">
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Keyword</th>
                                <th>Description</th>
                                <th>Mail</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Edit</th>
                            </tr>
                            @foreach ($data as $rs)
                                <tr>
                                    <td>{{ $rs->id }}</td>
                                    <td>{{ $rs->keywords }}</td>
                                    <td>{!! $rs->description !!}</td>
                                    <td>{{ $rs->mail }}</td>
                                    <td>{{ $rs->phone }}</td>
                                    <td>{{ $rs->status }}</td>
                                    <td><a href="{{ route('admin.settings.edit', ['id' => $rs->id]) }}">Edit</a></td>
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
