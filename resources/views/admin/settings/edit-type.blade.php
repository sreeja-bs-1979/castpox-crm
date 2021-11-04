@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Type</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card card-default col-8" style="margin-left:15%;">
                <div class="card-header">
                    <h3 class="card-title">Enter Details</h3>
                </div>
                <!-- /.card-header -->

                <form id="service-form" action="{{ route('types.update',$type) }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="{{'PUT'}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ $type->name }}">
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
