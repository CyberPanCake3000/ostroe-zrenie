<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\PhoneNumbers;

class SearchController extends Controller
{
    public function customersSearch(Request $request)
    {
        $query = $request->get('query');
        $data = Customers::where('name', 'LIKE', '%' . $query . '%')->take(5)->get();
        return response()->json($data);
    }

    public function customerSearch(Request $request)
    {
        $data = Customers::find($request->get('id'));
        return response()->json($data);
    }

    public function phoneSearch(Request $request)
    {
        $query = $request->get('query');
        $data = PhoneNumbers::where('phone_number', 'LIKE', '%' . $query . '%')->take(5)->get();
        return response()->json($data);

    }

    public function suggestionsSearch(Request $request)
    {
        $query = $request->get('query');
        $data = Customers::where('name', 'LIKE', '%' . $query . '%')->get();
//        $phoneNumbers = PhoneNumbers::where('phone_number', 'LIKE', '%' . $query . '%')->get(['phone_number as value']);
//        $data = $customers->merge($phoneNumbers);
        return response()->json($data);
    }

    public function search(Request $request)
    {
        $query = $request->get('search');

        $phoneNumbers = PhoneNumbers::where('phone_number', 'LIKE', '%' . $query . '%')->get();
        $customers = Customers::where('name', 'LIKE', '%' . $query . '%')->orWhere('id', '=', '%' . $query . '%')->get();
        $orders = Orders::where('comment', 'LIKE', '%' . $query . '%')->get();


        return view('search_results', ["phoneNumbers" => $phoneNumbers, "customers" => $customers, "orders" => $orders, "query" => $query]);
    }
}
