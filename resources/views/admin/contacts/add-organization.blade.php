@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Organization</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            {{--                            <li class="breadcrumb-item active">Add Service</li>--}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-default col-8" style="margin-left:15%;">
                <div class="card-header">
                    <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                @if(isset($organization))
                    <form id="$organization-add-form" action="{{ route('organization.update',$organization) }}" method="post">
                        @else
                            <form id="$organization-add-form" action="{{ route('organization.store') }}" method="post">
                                @endif
                                @csrf
{{--                                <input type="hidden" name="_method" value="{{ isset($organization) ? 'PUT' : 'POST' }}">--}}
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" value="{{ isset($organization) ?$organization->name:'' }}" placeholder="Enter Service">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label for="address">Details</label>
                                                <textarea name="address" id="address" class="form-control" rows="3" placeholder="Describe Service">{{ isset($organization) ?$organization->address:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
            </div>
        </section>
    </div>
@endsection
