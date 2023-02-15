<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\ClientsInfo;
use App\Models\Orders;
use Carbon\Carbon;
use http\Client;
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

        $client = Clients::firstOrCreate(
            [
                'phone_number' => $request->clientPhone,
            ]
        );

        $order = Orders::create([
            'client_id' => $client->id,
            'client_info_id' => $clientInfo->id,
            'glasses_model' => $request->glassesModel,
            'comment' => $request->orderComment,
        ]);

        if (!$order)
        {
            return redirect()->route('orders.index')->with('error', 'Невозможно создать заказ');
        }

        return redirect()->route('orders.index')->with('message', 'Заказ №' . $order->id . " успешно создан!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $order)
    {
        return view('orders/edit', compact('order'));
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
        $validator = Validator::make($request->all(), [
            'clientName' => 'required',
            'clientPhone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('orders.index')->with('error', 'Ошибка заполнения данных о заказе!');
        }

        $id = $order->id;

        if($request->clientName == $order->getClientInfo->name){
            $clientInfo = $order->getClientInfo;

            $clientInfo->update(
                [
                    'birth_date' => $request->clientBirthDate,
                ]
            );
        } else {
            $clientInfo = ClientsInfo::firstOrCreate(
                [
                    'name' => $request->clientName,
                    'birth_date' => $request->clientBirthDate,
                ]
            );
        }

        $updateClientInfo = $clientInfo->update(
            [
                'OD_Sph' => $request->OD_Sph,
                'OD_Cyl' => $request->OD_Cyl,
                'OD_ax' => $request->OD_ax,
                'OS_Sph' => $request->OS_Sph,
                'OS_Cyl' => $request->OS_Cyl,
                'OS_ax' => $request->OS_ax,
                'Dpp' => $request->Dpp,
            ]
        );

        if(!$updateClientInfo)
        {
            return redirect()->route('orders.index')->with('error', 'Невозможно обновить информацию о покупателе');
        }

        $client = Clients::firstOrCreate(
            [
                'phone_number' => $request->clientPhone,
            ]
        );

        $update = $order->update(
            [
                'client_id' => $client->id,
                'client_info_id' => $clientInfo->id,
                'glasses_model' => $request->glassesModel,
                'comment' => $request->comment,
            ]
        );

        if(!$update)
        {
            return redirect()->route('orders.index')->with('error', 'Ошибка при обновлении информации о заказе');
        }

        return redirect()->route('orders.index')->with('message', 'Заказ №'. $id .' успешно обновлен!');
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
        $delete = $order->delete();

        $message =  ($delete) ? 'Заказ №' . $id . " успешно удален!" : 'Не удалось удалить заказ №' . $id;

        return redirect()->route('orders.index')->with('message', $message);
    }


}
