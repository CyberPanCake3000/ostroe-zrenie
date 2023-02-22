<?php

namespace App\Http\Controllers;


use App\Models\Customers;
use App\Models\PhoneNumbers;
use App\Models\Orders;
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
        return view('/orders/index', ['orders' => $orders]);
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
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $phoneNumber = PhoneNumbers::firstOrCreate(
            [
                'phone_number' => $request->phone_number,
            ]
        );

        $customer = Customers::firstOrCreate([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'OD_Sph' => $request->OD_Sph,
            'OD_Cyl' => $request->OD_Cyl,
            'OD_ax' => $request->OD_ax,
            'OS_Sph' => $request->OS_Sph,
            'OS_Cyl' => $request->OS_Cyl,
            'OS_ax' => $request->OS_ax,
            'Dpp' => $request->Dpp,
            'phone_id' => $phoneNumber->id,
        ]);

        $order = Orders::create([
            'customer_id' => $customer->id,
            'glasses_model' => $request->glassesModel,
            'comment' => $request->comment,
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
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $id = $order->id;
        $oldCustomer = $order->getCustomer;


        $phoneNumber = PhoneNumbers::firstOrCreate(
            [
                'phone_number' => $request->phone_number,
            ]
        );

        if($request->name == $oldCustomer->name & $phoneNumber->id == $oldCustomer->phone_id){
            $customer = $order->getCustomer;

            $customer->update(
                [
                    'birth_date' => $request->birth_date,
                    'OD_Sph' => $request->OD_Sph,
                    'OD_Cyl' => $request->OD_Cyl,
                    'OD_ax' => $request->OD_ax,
                    'OS_Sph' => $request->OS_Sph,
                    'OS_Cyl' => $request->OS_Cyl,
                    'OS_ax' => $request->OS_ax,
                    'Dpp' => $request->Dpp,
                ]
            );

        } else {
            $customer = Customers::firstOrCreate(
                [
                    'name' => $request->name,
                    'birth_date' => $request->birth_date,
                    'OD_Sph' => $request->OD_Sph,
                    'OD_Cyl' => $request->OD_Cyl,
                    'OD_ax' => $request->OD_ax,
                    'OS_Sph' => $request->OS_Sph,
                    'OS_Cyl' => $request->OS_Cyl,
                    'OS_ax' => $request->OS_ax,
                    'Dpp' => $request->Dpp,
                    'phone_id' => $phoneNumber->id,
                ]
            );
        }

        $update = $order->update(
            [
                'customer_id' => $customer->id,
                'glasses_model' => $request->glassesModel,
                'comment' => $request->comment,
            ]
        );

        if(!$update)
        {
            return redirect()->route('orders.index')->with('error', 'Ошибка при обновлении информации о заказе №' . $id);
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
