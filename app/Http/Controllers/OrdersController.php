<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ClientsInfo;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        TODO: rewrite this method use ajax instead
        $today = Carbon::today();
//        $orders = Orders::whereDate('updated_at', $today)->orderBy('updated_at', 'desc')->paginate(10);
        $orders = Orders::orderBy('updated_at', 'desc')->paginate(10);
        $count = count($orders);
        return view('/orders/index', ['orders' => $orders, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'clientName' => 'required',
            'clientPhone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 400);
        }

        $clientInfo = ClientsInfo::create([
            'name' => $request->clientName,
            'birth_date' => $request->clientBirthDate,
            'OD_Sph' => $request->OD_Sph,
            'OD_Cyl' => $request->OD_Sph,
            'OD_ax' => $request->OD_Sph,
            'OS_Sph' => $request->OS_Sph,
            'OS_Cyl' => $request->OS_Sph,
            'OS_ax' => $request->OS_Sph,
            'Dpp' => $request->Dpp,
        ]);


        if (Clients::where('phone_number', $request->clientPhone)->exists()) {
            $client = Clients::where('phone_number', $request->clientPhone)->first();
        } else {
            $client = Clients::create([
                'phone_number' => $request->clientPhone,
            ]);
        };

        $order = Orders::create([
            'client_id' => $client->id,
            'client_info_id' => $clientInfo->id,
            'glasses_model' => $request->glassesModel,
            'comment' => $request->orderComment,
        ]);

        if (!$order)
        {
            return response()->json(['error' => 'Невозможно создать заказ'], 400);
        }

        return response()->json(['message' => 'order creates successfully', 'order_id' => $order->id], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
        return view('/edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $order)
    {
//        TODO:make validation for name and phone
        $validator = Validator::make($request->all(), [
            'clientName' => 'required',
            'clientPhone' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 400);
        }

//      TODO: update order and client info
        $order->update($request->all());

        return redirect()->route('home')->with('success','Заказ успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $order)
    {
        $id = $order->id;
        $order->delete();
        return redirect()->route('home')->with('success', 'Заказ №' . $id . ' успешно удален!');
    }

    public function clients()
    {
        $clients = ClientsInfo::paginate(10);
        return view('orders/clients', ['clients' => $clients]);
    }
}
