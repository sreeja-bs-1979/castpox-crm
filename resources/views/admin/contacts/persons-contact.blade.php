@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Individuals</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
{{--                        <ol class="breadcrumb float-sm-right">--}}
                            {{--              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Dashboard</li>--}}
{{--                        </ol>--}}
{{--                        <a href="" class="btn btn-primary float-sm-right">Create New</a>--}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
<!-- /.row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"></h3>

{{--                <div class="card-tools">--}}
{{--                    <div class="input-group input-group-sm" style="width: 150px;">--}}
{{--                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">--}}

{{--                        <div class="input-group-append">--}}
{{--                            <button type="submit" class="btn btn-default">--}}
{{--                                <i class="fas fa-search"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
{{--                        <th>Date</th>--}}
{{--                        <th>Status</th>--}}
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Organization</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($persons as $person)
                    <tr>
                        <td>{{$person->id}}</td>
                        <td>{{$person->name}}</td>
{{--                        <td>11-7-2014</td>--}}
{{--                        <td><span class="tag tag-success">Approved</span></td>--}}
                        <td>{{$person->emails}}</td>
                        <td>{{$person->contact_numbers}}</td>
                        <td>{{$person->organization->name}}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info">Action</button>
                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="{{ route('person.edit',$person) }}">Edit</a>
                                    <a class="dropdown-item" href="{{route('person.delete',$person)}}">Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
