@extends('layouts.main')
@section('content')
    <style>
        .activ
        {
            border-bottom: 2px solid #73e0d2;
        }
    </style>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lead Details</h1>
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
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <h5>Details</h5>
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Title</b> <p class="float-right">{{$lead->title}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Description</b> <p class="float-right">{{$lead->description}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Source</b> <a class="float-right">{{$lead->source->name}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Type</b> <a class="float-right">{{$lead->type->name}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Sales Owner</b> <a class="float-right">{{$lead->user->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <h5>Contact Person</h5>
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Name</b> <p class="float-right">{{$lead->person->name}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <p class="float-right">{{$lead->person->emails}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Contact Number</b> <a class="float-right">{{$lead->person->contact_numbers}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Organization</b> <a class="float-right">{{$lead->person->organization->name}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <h5>Services</h5>
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <ul class="list-group list-group-unbordered mb-3">
                                    @foreach($lead->services as $ls)
                                    <li class="list-group-item">
                                        <b>Item</b> <p class="float-right">{{App\Models\Service::getService($ls->service_id)->name}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Description</b> <p class="float-right">{{App\Models\Service::getService($ls->service_id)->description}}</p>
                                    </li>
                                        @endforeach
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-8">
                        <nav class="navbar navbar-expand navbar-white navbar-light">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block {{($lead->lead_stage_id == 1)?'activ':''}}">
                                    <a href="" class="nav-link" id="new">New</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block {{($lead->lead_stage_id == 2)?'activ':''}}">
                                    <a href="" class="nav-link" id="follow">Follow Up</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block {{($lead->lead_stage_id == 3)?'activ':''}}">
                                    <a href="" class="nav-link" id="prospect">Prospect</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block {{($lead->lead_stage_id == 4)?'activ':''}}">
                                    <a href="" class="nav-link" id="negotiation">Negotiation</a>
                            </li>
                            <li class="nav-item dropdown {{($lead->lead_stage_id == 5 || $lead->lead_stage_id == 6)?'activ':''}}">
                                <a class="nav-link" data-toggle="dropdown" href="">Won/Lost</a>
                                <div class="dropdown-menu">
                                        <a href="" class="dropdown-item" id="won">Won</a>
                                        <a href="" class="dropdown-item" id="lost">Lost</a>
                                </div>
                            </li>

                        </ul>
                        </nav>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#note" data-toggle="tab">Note</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
{{--                                    <li class="nav-item"><a class="nav-link" href="#email" data-toggle="tab">Email</a></li>--}}
                                    <li class="nav-item"><a class="nav-link" href="#files" data-toggle="tab">Files</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#quote" data-toggle="tab">Quote</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="note">
                                        <form id="lead-notes-form" action="" method="post">
                                            @csrf
                                                 <div class="row">
                                                    <div class="col-8">
                                                        <input type="hidden" name="type" id="type" value="note">
{{--                                                        <input type="hidden" name="lead_id" value="{{$lead->id}}">--}}
                                                        <div class="form-group">
                                                            <label for="notes">Note</label>
                                                            <textarea name="notes" id="notes" class="form-control" rows="3" required></textarea>
                                                        </div>
                                                        <button type="button" class="btn btn-primary" id="btn-note">Save</button>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="activity">
                                        <form id="lead-activity-form" action="" method="">
                                            @csrf
                                            <div class="row">
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" id="title" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="type">Type</label>
                                                        <input type="text" name="type" id="type" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-8">
{{--                                                <div class="col-4">--}}
                                                    <div class="form-group">
                                                        <label for="start_date">Schedule (From)</label>
                                                        <input type="date" name="start_date" id="start_date" class="form-control" placeholder="From" required>
                                                    </div>
{{--                                                </div>--}}
{{--                                                <div class="col-4">--}}
                                                    <div class="form-group">
                                                        <label for="end_date">To</label>
                                                        <input type="date" name="end_date" id="end_date" class="form-control" placeholder="To" required>
                                                    </div>
{{--                                                </div>--}}
                                            </div>
{{--                                            <div class="col-8">--}}
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label for="participants">Participants</label>
                                                        <input type="text" name="participants" id="participants" class="form-control" required>
                                                    </div>
                                                </div>
{{--                                            </div>--}}
                                            <div class="row">
                                                <button type="button" class="btn btn-primary" id="btn-activity">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="email">
{{--                                        <form class="form-horizontal">--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <input type="email" class="form-control" id="inputName" placeholder="Name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>--}}
{{--                                                <div class="col-sm-10">--}}
{{--                                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <div class="offset-sm-2 col-sm-10">--}}
{{--                                                    <div class="checkbox">--}}
{{--                                                        <label>--}}
{{--                                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group row">--}}
{{--                                                <div class="offset-sm-2 col-sm-10">--}}
{{--                                                    <button type="submit" class="btn btn-danger">Submit</button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="files">
                                            <form class="form-horizontal" id="files-lead-form" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="descriptione" class="col-sm-2 col-form-label">Experience</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" name="descriptione" id="descriptione" ></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="upfile" class="col-sm-2 col-form-label">File</label>
                                                    <div class="col-8">
                                                        <input type="file" class="form-control" name="upfile" id="upfile" placeholder="Skills">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="button" class="btn btn-primary" id="btn-upload">Upload</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                        <div class="tab-pane" id="quote">
                                            <div class="offset-sm-2 col-8">
                                                <a href="{{url('add-quotes')}}" class="btn btn-primary">Create Quote</a>
                                            </div>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                <div id="msg-div"></div>
                                </div><!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <script>
            $(document).ready(function(){
                $('#btn-note').on('click', function(e){
                    e.preventDefault();
                    var token = "{{csrf_token()}}";
                    var  comment = $('#notes').val();
                    var  lead_id = {{$lead->id}};
                    var  type = $('#type').val();
                    $.ajax({
                        method: 'GET',
                        url: "{{route('lead.notes')}}",
                        data: ({_token:token,comment:comment,lead_id:lead_id,type:type}),
                        redirect: true,
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#btn-activity').on('click', function(e){
                    e.preventDefault();
                    alert(1);
                    var token = "{{csrf_token()}}";
                    var  title = $('#title').val();
                    var comment = $('#description').val();
                    var  lead_id = {{$lead->id}};
                    var  type = $('#type').val();
                    var schedule_from = $('#start_date').val();
                    var schedule_to = $('#end_date').val();
                    $.ajax({
                        method: "GET",
                        url: "{{route('lead.activity')}}",
                        data: ({_token:token,title:title,comment:comment,lead_id:lead_id,type:type,schedule_from:schedule_from,schedule_to:schedule_to}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#btn-upload').on('click', function(e){
                    e.preventDefault();
                    var token = "{{csrf_token()}}";
                    var  name = $('#name').val();
                    var comment = $('#descriptione').val();
                    var  lead_id = {{$lead->id}};
                    var  type = $('#type').val();
                    var upfile = $('#upfile').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('file_upload')}}",
                        data: ({_token:token,name:name,comment:comment,lead_id:lead_id,type:type,upfile:upfile}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });

                $('.nav-item').on('click', function() {
                    $(this).addClass('activ').siblings('li').removeClass('activ');
                });

                {{--$('.cls2').on('click', function() {--}}
                {{--    var token = "{{csrf_token()}}";--}}
                {{--    var  lead_id = {{$lead->id}};--}}
                {{--    var  stage = $('#stage').val();--}}
                {{--    alert(stage);--}}
                {{--    $.ajax({--}}
                {{--        method: "POST",--}}
                {{--        url: "{{route('leads.stage')}}",--}}
                {{--        data: ({_token:token,lead_id:lead_id,stage:stage}),--}}
                {{--        success: function(data){--}}
                {{--            if(data){--}}
                {{--                $("#msg-div").append(data['msg']);--}}

                {{--            }--}}
                {{--            else{--}}
                {{--                $("#msg-div").empty();--}}
                {{--            }--}}
                {{--        }--}}
                {{--    });--}}
                {{--});--}}
                $('#follow').on('click', function() {
                    // $(this).addClass('activ').siblings('li').removeClass('activ');
                    var token = "{{csrf_token()}}";
                    var  lead_id = {{$lead->id}};
                    var  stage = 2;
                        // $('#stage_follow').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('leads.stage')}}",
                        data: ({_token:token,lead_id:lead_id,stage:stage}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#prospect').on('click', function() {
                    // $(this).addClass('activ').siblings('li').removeClass('activ');
                    var token = "{{csrf_token()}}";
                    var  lead_id = {{$lead->id}};
                    var  stage = 3;
                    // $('#stage_follow').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('leads.stage')}}",
                        data: ({_token:token,lead_id:lead_id,stage:stage}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#negotiation').on('click', function() {
                    // $(this).addClass('activ').siblings('li').removeClass('activ');
                    var token = "{{csrf_token()}}";
                    var  lead_id = {{$lead->id}};
                    var  stage = 4;
                    // $('#stage_follow').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('leads.stage')}}",
                        data: ({_token:token,lead_id:lead_id,stage:stage}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#won').on('click', function() {
                    // $(this).addClass('activ').siblings('li').removeClass('activ');
                    var token = "{{csrf_token()}}";
                    var  lead_id = {{$lead->id}};
                    var  stage = 5;
                    // $('#stage_follow').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('leads.stage')}}",
                        data: ({_token:token,lead_id:lead_id,stage:stage}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });
                $('#lost').on('click', function() {
                    // $(this).addClass('activ').siblings('li').removeClass('activ');
                    var token = "{{csrf_token()}}";
                    var  lead_id = {{$lead->id}};
                    var  stage = 6;
                    // $('#stage_follow').val();
                    $.ajax({
                        method: "POST",
                        url: "{{route('leads.stage')}}",
                        data: ({_token:token,lead_id:lead_id,stage:stage}),
                        success: function(data){
                            if(data){
                                $("#msg-div").append(data['msg']);

                            }
                            else{
                                $("#msg-div").empty();
                            }
                        }
                    });
                });


            });
        </script>

        @endsection




