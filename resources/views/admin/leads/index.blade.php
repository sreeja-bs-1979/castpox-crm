@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Leads</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
{{--                        <ol class="breadcrumb float-sm-right">--}}
                            {{--              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>--}}
{{--                            <li class="breadcrumb-item active">Dashboard</li>--}}
{{--                        </ol>--}}
                        <a href="{{route('leads.create')}}" class="btn btn-primary float-sm-right">Create Lead</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getNewLeads())}}</h3>
                    <h4>New</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('leads.create')}}" class="small-box-footer">
                    Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getFollowUpLeads())}}</h3>
{{--                    <sup style="font-size: 20px">%</sup></h3>--}}
                    <h4>Follow UP</h4>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('leads.create',2)}}" class="small-box-footer">
                    Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getProspectsLeads())}}</h3>

                    <h4>Prospect</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('leads.create',3)}}" class="small-box-footer">
                    Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getNegotiationLeads())}}</h3>

                    <h4>Negotiation</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{route('leads.create',4)}}" class="small-box-footer">
                   Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getWonLeads())}}</h3>
                    <h4>Won</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <a href="{{route('leads.create',5)}}" class="small-box-footer">
                    Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{count(App\Models\Lead::getLostLeads())}}</h3>
                    <h4>Lost</h4>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('leads.create',6)}}" class="small-box-footer">
                    Create <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
    @if(!($leads->isEmpty()))

    <div class="row">
        <h3>New Leads</h3>
        <table id="example3" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Lead ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
{{--            @if(isset($leads->getNewLeads) && $leads->getNewLeads)--}}
            @if(!(App\Models\Lead::getNewLeads()->isEmpty()))
            @foreach(App\Models\Lead::getNewLeads() as $lead)
                <tr>
                    <td>{{$lead->id}}</td>
                    <td>{{$lead->title}}</td>
{{--                    <td>--}}
{{--                        <a class="dropdown-item" href="{{url('view-lead',$lead->id)}}"><i class="fas fa-eye"></i></a>--}}
{{--                    </td>--}}
                    <td class="text-center py-0 align-middle">
                        <div class="btn-group btn-group-sm">
                            <a href="{{url('view-lead',$lead->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            {{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                        </div>
                    </td>
                </tr>
            @endforeach
            @else
            <tr>
                <td>&nbsp;</td>
                <td>-- No data available--</td>
                <td>&nbsp;</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
                    <div class="row">
                        <h3>Follow up leads</h3>
                        <table id="example4" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($leads->getFollowUpLeads) && $leads->getFollowUpLeads)--}}
                            @if(!(App\Models\Lead::getFollowUpLeads()->isEmpty()))
                            @foreach(App\Models\Lead::getFollowUpLeads() as $follow)
                                <tr>
                                    <td>{{$follow->id}}</td>
                                    <td>{{$follow->title}}</td>
{{--                                    <td>--}}
{{--                                        <a class="dropdown-item" href="{{url('view-lead',$follow->id)}}"><i class="fas fa-eye"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('view-lead',$follow->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
{{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>-- No data available--</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <h3>Prospects leads</h3>
                        <table id="example5" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($leads->getProspectsLeads) && $leads->getProspectsLeads)--}}
                            @if(!(App\Models\Lead::getProspectsLeads()->isEmpty()))
                            @foreach(App\Models\Lead::getProspectsLeads() as $prospect)
                                <tr>
                                    <td>{{$prospect->id}}</td>
                                    <td>{{$prospect->title}}</td>
{{--                                    <td>--}}
{{--                                        <a class="dropdown-item" href="{{url('view-lead',$prospect->id)}}"><i class="fas fa-eye"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('view-lead',$prospect->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            {{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>-- No data available--</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <h3>Negotiation leads</h3>
                        <table id="example6" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($leads->getNegotiationLeads) && $leads->getNegotiationLeads)--}}
                            @if(!(App\Models\Lead::getNegotiationLeads()->isEmpty()))
                            @foreach(App\Models\Lead::getNegotiationLeads() as $negotiation)
                                <tr>
                                    <td>{{$negotiation->id}}</td>
                                    <td>{{$negotiation->title}}</td>
{{--                                    <td>--}}
{{--                                        <a class="dropdown-item" href="{{url('view-lead',$negotiation->id)}}"><i class="fas fa-eye"></i></a>                             }}--}}
{{--                                    </td>--}}
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('view-lead',$negotiation->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            {{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>-- No data available--</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <h3>Won leads</h3>
                        <table id="example7" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($leads->getWonLeads) && $leads->getWonLeads)--}}
                            @if(!(App\Models\Lead::getWonLeads()->isEmpty()))
                            @foreach(App\Models\Lead::getWonLeads() as $won)
                                <tr>
                                    <td>{{$won->id}}</td>
                                    <td>{{$won->title}}</td>
{{--                                    <td>--}}
{{--                                        <a class="dropdown-item" href="{{url('view-lead',$won->id)}}"><i class="fas fa-eye"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('view-lead',$won->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            {{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>-- No data available--</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <h3>Lost leads</h3>
                        <table id="example8" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Lead ID</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @if(isset($leads->getLostLeads) && $leads->getLostLeads)--}}
                            @if(!(App\Models\Lead::getLostLeads()->isEmpty()))
                            @foreach(App\Models\Lead::getLostLeads() as $lost)
                                <tr>
                                    <td>{{$lost->id}}</td>
                                    <td>{{$lost->title}}</td>
{{--                                    <td>--}}
{{--                                        <a class="dropdown-item" href="{{url('view-lead',$lost->id)}}"><i class="fas fa-eye"></i></a>--}}
{{--                                    </td>--}}
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{url('view-lead',$lost->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            {{--                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>--}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>-- No data available--</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>

    @endif


    </div>

        </section>
    </div>


@endsection
