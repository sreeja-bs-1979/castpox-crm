@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Types</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>--}}
                            {{--                            <li class="breadcrumb-item active">Dashboard</li>--}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                Create Type
                            </button>

                        </ol>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Type</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="add-type-form" method="post" action="{{route('types.store')}}">
                                        <div class="modal-body">
                                            @csrf
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" required>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
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
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if(isset($types))

                                            @foreach($types as $type)
                                                <tr>
                                                    <td>{{$type->id}}</td>
                                                    <td>{{$type->name}}</td>
                                                    <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{route('types.edit',$type)}}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
{{--                                                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modal-type"><i class="fas fa-trash"></i></a>--}}
                                                            <a href="{{--route('types.destroy',$type)--}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr><td>&nbsp;</td>
                                                <td><p>-- No Data --</p></td>
                                                <td>&nbsp;</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
{{--                                    <div class="modal fade" id="modal-type">--}}
{{--                                        <div class="modal-dialog modal-sm">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h4 class="modal-title">Delete Type</h4>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <form action="{{ route('types.destroy',$type) }}" method="POST">--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        Are you sure you want to delete?--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-footer justify-content-between">--}}
{{--                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
{{--                                                        <button type="submit" class="btn btn-primary" >Delete</button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                            <!-- /.modal-content -->--}}
{{--                                        </div>--}}
{{--                                        <!-- /.modal-dialog -->--}}
{{--                                    </div>--}}
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
