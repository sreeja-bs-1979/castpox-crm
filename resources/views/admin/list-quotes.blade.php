@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>jsGrid</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">jsGrid</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Quote ID</th>
                                    <th>Services</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotes as $quote)
                                <tr>
                                    <td>Trident</td>
                                    <td>{{$quote->id}}</td>
                                    <td>
                                        @if(!empty($quote->details))
                                            @foreach($quote->details as $detail )
                                                {{ $detail->service_detail }} <br>
                                            @endforeach
                                        @else {{ '' }}
                                        @endif
                                    </td>
                                    <td>{{$quote->final_quote_price}}</td>
                                    <td>{{$quote->status}}</td>
                                    <td> <div class="btn-group">
                                            <button type="button" class="btn btn-info">Action</button>
                                            <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{url('edit-quotes',$quote->id)}}">Edit</a>
                                                <a class="dropdown-item" href="{{url('delete-quotes',$quote->id)}}">Delete</a>
                                            </div>
                                        </div></td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Quote ID</th>
                                    <th>Services</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
            </div>
            <!-- /.card-body -->
        </div>
    </section>
</div>
@endsection
