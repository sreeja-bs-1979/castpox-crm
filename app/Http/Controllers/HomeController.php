<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function disable(Service $service)
    {
        $s = $service;
        if($s->status == 1)
            $status = 0;
        else if($s->status == 0)
            $status = 1;
        $service->update(['status' => $status]);
        toastr()->success('Service Status Changed');
        return back();
    }

}
