<?php

namespace App\Http\Controllers;

use App\Models\ClientsInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = ClientsInfo::orderBy('updated_at', 'desc')->paginate(10);
        return view('clients/index', ['clients' => $clients]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ClientsInfo $client)
    {
        return view('clients/show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientsInfo $client)
    {
        return view('clients/edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClientsInfo  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientsInfo $client)
    {
        $validator = Validator::make($request->all(), [
            'clientName' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 400);
        }

        $id = $client->id;

        $update = $client->update(
            [
                'name' => $request->clientName,
                'birth_date' => $request->clientBirthDate,
                'OD_Sph' => $request->OD_Sph,
                'OD_Cyl' => $request->OD_Cyl,
                'OD_ax' => $request->OD_ax,
                'OS_Sph' => $request->OS_Sph,
                'OS_Cyl' => $request->OS_Cyl,
                'OS_ax' => $request->OS_ax,
                'Dpp' => $request->Dpp,
            ]
        );

        $message =  ($update) ? ['message', 'Информация о покупателе №' . $id . " успешно обновлена!"] : ['error', 'Не удалось обновить информацию о покупателе №' . $id];

        return redirect()->route('clients.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientsInfo $client)
    {
        //
    }
}
