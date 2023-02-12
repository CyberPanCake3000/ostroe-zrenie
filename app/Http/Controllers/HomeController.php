<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function support()
    {
        return view('support');
    }

    public function home()
    {
        $orders = Orders::latest()->take(5)->get();
        return view('orders/home', ['orders' => $orders]);
    }
}
