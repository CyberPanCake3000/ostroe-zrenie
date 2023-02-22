<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\PhoneNumbers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $customers = Customers::orderBy('updated_at', 'desc')->paginate(10);
        return view('customers/index', ['customers' => $customers]);
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
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Customers $customer)
    {
        return view('customers/show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Customers $customer)
    {
        return view('customers/edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customers $customer)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        $id = $customer->id;

        $phone = PhoneNumbers::firstOrCreate(
            [
                'phone_number' => $request->phone_number,
            ]
        );

        $update = $customer->update(
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
                'phone_id' => $phone->id,
            ]
        );

        $message =  ($update) ? ['message' => 'Информация о покупателе №' . $id . " успешно обновлена!"] : ['error' => 'Не удалось обновить информацию о покупателе №' . $id];

        return redirect()->route('customers.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customer)
    {
        $id = $customer->id;
        if(count($customer->getOrders) == 0)
        {
            $customer->delete();
            return redirect()->route('customers.index')->with('message', 'Покупатель №' . $id . ' успешно удален!');
        } else{
            return redirect()->route('customers.index')->with('error', 'Невозможно удалить покупателя №'. $id . '! У этого покупателя есть заказы.');
        }

    }

}
