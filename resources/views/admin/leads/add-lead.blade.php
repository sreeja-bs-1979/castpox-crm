@extends('layouts.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Leads</h1>
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
            <div class="card col-8" style="margin-left:15%;">
                <div class="card-header">
                    <h3 class="card-title" style="color: #0c84ff;"><b>Details</b></h3>
                </div>
                <!-- /.card-header -->
                @if(isset($lead))
                    <form id="lead-add-form" action="{{ route('leads.update',$lead->id) }}" method="post">
                        @else
                            <form id="lead-add-form" action="{{ route('leads.store') }}" method="post">
                                @endif
                                @csrf
{{--                                <input type="hidden" name="_method" value="{{ isset($lead) ? 'PUT' : 'POST' }}">--}}
                                <div class="card-body">
                                    <fieldset>
{{--                                        <legend></legend>--}}
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label for="title">Request
{{--                                                    Title--}}
                                                </label>
                                                <input type="text" name="title" id="title" class="form-control" value="{{ isset($lead) ?$lead->title:'' }}">
                                            </div>
                                        </div>
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
                                        <div class="col-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <label for="description">Scope of work
{{--                                                    Description--}}
                                                </label>
                                                <textarea name="description" id="description" class="form-control" rows="2"">{{ isset($lead) ?$lead->description:'' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="source">Source</label>
                                                <select class="form-control" name="source" id="source">
                                                    @foreach($sources as $source)
                                                    <option {{  (isset($lead) && ($lead->source->id == $source->id)) ?'selected':''}} value="{{$source->id}}">
                                                        {{$source->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <select class="form-control" name="type" id="type">
                                                    @foreach($types as $type)
                                                        <option {{  (isset($lead) && ($lead->type->id == $type->id)) ?'selected':''}} value="{{$type->id}}">
                                                            {{$type->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sales_owner">Sales Owner</label>
                                                <select class="form-control" name="sales_owner" id="sales_owner">
                                                    @foreach($users as $user)
                                                        <option {{  (isset($lead) && ($lead->user->id == $user->id)) ?'selected':''}} value="{{$user->id}}">
                                                            {{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group" style="display: none;">
                                                <label for="lead_value">
                                                    Lead Created On
                                                    {{--                                                    Lead Value (AED)--}}
                                                </label>
                                                <input type="hidden" name="lead_value" id="lead_value" class="form-control" value="0{{-- isset($lead) ?$lead->lead_value:'' --}}">
                                                {{--                                                <select class="form-control"></select>--}}
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="status_follow">Status</label>
                                                    <input type="text" name="status_follow[]" id="status_follow_1" class="form-control" value="{{ isset($lead) ?$lead->status:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="status_follow">Status Follow Up </label>
                                                    <input type="text" name="status_follow[]" id="status_follow_2" class="form-control" value="{{ isset($lead) ?$lead->status_follow:'' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset style="margin-top:5%;">
                                        <legend><h3 class="card-title" style="color:#0c84ff;">Contact Person</h3></legend>
                                        <hr>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="person_name">Name</label>
                                                    <input type="text" name="person_name" id="person_name" class="form-control" value="{{ isset($lead) ?$lead->person->person_name:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="person_mail">Email</label>
                                                    <input type="text" name="person_mail" id="person_mail" class="form-control" value="{{ isset($lead) ?$lead->person->person_mail:'' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="person_number">Contact Number</label>
                                                    <input type="text" name="person_number" id="person_number" class="form-control" value="{{ isset($lead) ?$lead->person->person_number:'' }}">
                                                </div>
                                            </div>
{{--                                            <div class="col-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="person_organization">Organization--}}
{{--                                                    </label>--}}
{{--                                                    <input type="text" name="person_organization" id="person_organization" class="form-control" value="{{ isset($lead) ?$lead->person->person_organization:'' }}">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="organization_name">Name of Organization</label>
                                                    <input type="text" name="organization_name" id="organization_name" class="form-control" value="{{ isset($lead) ?$lead->organization->organization_name:'' }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="address">Organization Details (website/domain/address)</label>
                                                    <textarea name="address" id="address" class="form-control" rows="3" placeholder="Describe Service">{{ isset($lead) ?$lead->organization->address:'' }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <fieldset style="margin-top:6%;">
                                        <legend><h3 class="card-title"   style="color:#0c84ff;">Services</h3></legend>
                                        <hr>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="service_id">Select Services</label>
                                                <select class="form-control" name="service_id[]" id="service_id" multiple="true">
                                                    @foreach($services as $service)
                                                        <option {{  (isset($lead) && ($lead->service->id == $service->id)) ?'selected':''}} value="{{$service->id}}">
                                                            {{$service->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                        <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
            </div>
        </section>
    </div>
@endsection
