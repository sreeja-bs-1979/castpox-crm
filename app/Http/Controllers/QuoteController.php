<?php

namespace App\Http\Controllers;

use App\Models\QuoteItem;
use App\Models\QuoteItemDetail;
use Illuminate\Http\Request;
use App\Models\Service;

class QuoteController extends Controller
{
    public function index()
    {
      $services = Service::where('status',1)->get();
      return view('admin.add-quotes',compact('services'));
    }
    public function store(Request $request)
    {
        $service_ids = implode(',',$request->service);
        $quote = QuoteItem::create([
            'service_ids' => $service_ids,
            ]+$request->all());
        if($quote) {
            //dd($request->total);
            foreach ($request->service as $ser) {
                QuoteItemDetail::create([
                        'quote_item_id' => $quote->id,
                        'service_id' => $ser,
                        'service_detail' => $request->description[$ser-1],
                        'unit_price' => $request->unit_price[$ser-1],
                        'qty' => $request->qty[$ser-1],
                        'total' => $request->total[$ser-1],
                    ] + $request->all());
            }
            //write insertion of quote item details here
            toastr()->success('Quote Created Successfully');
        }
        else
            toastr()->error('Failed. Try again');
        return back();
    }
    public function show()
    {
        $quotes = QuoteItem::with('details')->where('status',1)->get();
        //dd($quotes);
        return view('admin.list-quotes',compact('quotes',$quotes));
    }
    public function edit($id)
    {
        $quote = QuoteItem::find($id);
        $services = Service::where('status',1)->get();
        // = $quote->details();
        //dd( $quote->service_ids);
        return view('admin.edit-quotes',compact('quote','services'));

    }
    public function update(Request $request, $id)
    {
        $quote = QuoteItem::find($id);
        $service_ids = implode(',',$request->service);
        $quote->update([
                'service_ids' => $service_ids,
            ]+$request->all());
        foreach($request->service as $ser) {
            $quoteitemdetails = QuoteItemDetail::where('quote_item_id',$quote->id)->where('service_id',$ser)->first();
            if($quoteitemdetails) {
                $quoteitemdetails->update([
                        'quote_item_id' => $quote->id,
                        'service_id' => $ser,
                        'service_detail' => $request->description[$ser - 1],
                        'unit_price' => $request->unit_price[$ser - 1],
                        'qty' => $request->qty[$ser - 1],
                        'total' => $request->total[$ser - 1],
                    ] + $request->all());
            }else{
                QuoteItemDetail::create([
                        'quote_item_id' => $quote->id,
                        'service_id' => $ser,
                        'service_detail' => $request->description[$ser-1],
                        'unit_price' => $request->unit_price[$ser-1],
                        'qty' => $request->qty[$ser-1],
                        'total' => $request->total[$ser-1],
                    ] + $request->all());
            }
        }
        toastr()->success('Service Updated Successfully');
        return back();
    }
    public function destroy($id)
    {
        $quote = QuoteItem::find($id);
        $quote->delete();
        toastr()->success('Service Deleted Successfully');
        return back();
    }

}
