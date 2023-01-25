<?php

namespace App\Http\Controllers;

use http\Client;
use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
use App\Models\ClientsInfo;
use App\Models\Clients;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $orders = Orders::whereDate('updated_at', $today)->orderBy('updated_at', 'desc')->paginate(10);
        $count = count($orders);
        return view('home', ['orders' => $orders, 'count' => $count]);
    }

    public function show()
    {
        //
    }

    public function create(Request $request)
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

    public function edit()
    {
        //
    }

    public function refresh()
    {
        //
    }
}
