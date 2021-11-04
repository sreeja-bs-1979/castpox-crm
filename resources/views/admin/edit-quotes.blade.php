@extends('layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--                    <h1>jsGrid</h1>--}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                            {{--                        <li class="breadcrumb-item active">jsGrid</li>--}}
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Quote</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="quote-edit-form" action="{{url('edit-quotes',$quote->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $quote->email }}" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" class="form-control" rows="3" placeholder="Address with phone number" required>{{ $quote->address }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="row">--}}
                        {{--                        <div id="jsGrid1"></div>--}}
                        {{--                    </div>--}}
                        <div class="row">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th>--</th>
                                    <th>Item</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $serv = array();
                                    $list = array();
                                    $ser = explode(',', $quote->service_ids);
                                @endphp
                                @foreach($services as $service)
{{--                                    @foreach($quote->details as $detail )--}}
{{--                                        @if ($service->id == $detail->service_id)--}}
{{--                                         $descript = $detail->service_detail;--}}
{{--                                         @endif--}}
{{--                                    @endforeach--}}

                                    <tr>
                                        <td>
                                            <div class="">
                                                <input type="checkbox" name="service[]" id="chk_{{$service->id}}" value="{{$service->id}}" {{  (in_array($service->id,$ser))?'checked':''}}>
                                                <label for="chk_{{$service->id}}">
                                                </label>
                                            </div>
                                        </td>
                                        @foreach($quote->details as $detail )
                                            @if ($service->id == $detail->service_id)
                                        <td>
                                            {{$service->name }}<br>
                                            <textarea name="description[]" id="description_{{$service->id}}" class="form-control" rows="3" placeholder="Describe Service">{{  $detail->service_detail}}</textarea>
                                        </td>

                                        <td>
                                            <input type="number" name="qty[]" id="qty_{{$service->id}}" value="{{$detail->qty}}" class="form-control col-md-5 ml-2" placeholder="Quantity">
                                        </td>
                                        <td>
                                            <input type="text" name="unit_price[]" id="unit_price_{{$service->id}}" value="{{$detail->unit_price}}" class="form-control col-md-5 ml-2" placeholder="Unit Price">
                                        </td>
                                        <td>
                                            <input type="text" name="total[]" id="total_{{$service->id}}" value="{{$detail->total}}" class="form-control col-md-5 ml-2" value="" placeholder="Total">
                                        </td>
                                            @else
                                                <td>
                                                    {{$service->name }}<br>
                                                    <textarea name="description[]" id="description_{{$service->id}}" class="form-control" rows="3" placeholder="Describe Service">{{  $service->description }}</textarea>
                                                </td>

                                                <td>
                                                    <input type="number" name="qty[]" id="qty_{{$service->id}}" class="form-control col-md-5 ml-2" placeholder="Quantity">
                                                </td>
                                                <td>
                                                    <input type="text" name="unit_price[]" id="unit_price_{{$service->id}}" class="form-control col-md-5 ml-2" placeholder="Unit Price">
                                                </td>
                                                <td>
                                                    <input type="text" name="total[]" id="total_{{$service->id}}" class="form-control col-md-5 ml-2" value="" placeholder="Total">
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <script>
                                        $('#qty_{{$service->id}}, #unit_price_{{$service->id}}').on('input',function(){
                                            var rate = parseFloat($('#unit_price_{{$service->id}}').val()) || 0;
                                            var qty = parseFloat($('#qty_{{$service->id}}').val()) || 0;
                                            $('#total_{{$service->id}}').val(rate * qty);
                                        });
                                    </script>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Total Price</th>
                                    <th><input type="text" name="quote_price" id="quote_price" class="form-control col-md-5 ml-2" value="{{$quote->quote_price}}"></th>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>&nbsp;</th>--}}
{{--                                    <th>&nbsp;</th>--}}
{{--                                    <th>&nbsp;</th>--}}
{{--                                    <th>Tax</th>--}}
{{--                                    <th><input type="text" name="tax" id="tax" class="form-control col-md-5 ml-2" value="0"></th>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Adjustment if any</th>
                                    <th><input type="text" name="adjustment_price" id="adjustment_price" class="form-control col-md-5 ml-2" value="{{$quote->adjustment_price}}"></th>
                                </tr>
                                <tr>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Final Quote Price</th>
                                    <th><input type="text" name="final_quote_price" id="final_quote_price" class="form-control col-md-5 ml-2" value="{{$quote->final_quote_price}}"></th>
                                </tr>

                                </tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            {{--                    <button type="submit" class="btn btn-primary" style="float: right;" onClick = "valthisform();">Submit</button>--}}
                            <button type="submit" class="btn btn-primary" style="float: right;" onClick = "valthisform();">Submit</button>
                            {{--                    <button type="button" class="btn btn-primary" id="btn-quote-add" style="float: right;">Submit</button>--}}
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{--<script>--}}
    {{--    $(function () {--}}
    {{--        $("#jsGrid1").jsGrid({--}}
    {{--            height: "100%",--}}
    {{--            width: "100%",--}}

    {{--            sorting: true,--}}
    {{--            paging: true,--}}

    {{--            // data: db.clients,--}}
    {{--           /* data: --}}{{--$services--}}{{--,*/--}}

    {{--            fields: [--}}
    {{--                { name: "service_chk", type: "checkbox", title: "" },--}}
    {{--                { name: "Item Name", type: "text", width: 150 },--}}
    {{--                { name: "Description", type: "textarea", width: 150 },--}}
    {{--                { name: "Unit Price", type: "text", width: 50 },--}}
    {{--                { name: "Qty", type: "number", width: 200 },--}}
    {{--                { name: "Total Price", type: "text", width: 50 }--}}
    {{--                /*{ name: "Total", type: "select", items: db.countries, valueField: "Id", textField: "Name" },*/--}}

    {{--            ]--}}
    {{--        });--}}
    {{--    });--}}
    {{--</script>--}}
    <script>
        $('#adjustment_price').on('input',function(){
            var final = parseFloat($('#adjustment_price').val()) || 0;
            var quote = parseFloat($('#quote_price').val()) || 0;

            $('#final_quote_price').val(quote - final);
        });
    </script>
    <script>
        //add an event listener and do this code
        $('#quote_price').on('keyup',function(){
            var tot = 0;
            var num = $('[name="service[]"]').filter(":checked").length;
            for(let i=1; i<=num; i++)
            {
                tot = tot + parseFloat($('#total_'+i).val());
            }
            $('#quote_price').val(tot);
        });
    </script>
    <script>
        function valthisform()
        {
            if($('[name="service[]"]').filter(":checked").length <= 0){
                alert("Select atleast 1 Service First",'error');
                return false;
            }
        }
    </script>
@endsection
