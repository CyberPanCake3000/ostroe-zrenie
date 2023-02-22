@extends('layout')

@section('content')

    <div class="row">
        <div class="col-md-7 col-12">
            <div class="p-4 bg-white rounded-4 me-md-2 me-0">
                <h2>Заказы</h2>

                <div class="overflow-scroll">
                    <div class="border-bottom p-2 d-flex">
                        <div class="col-md-1 col-1 fw-bold">№</div>
                        <div class="col-md-4 col-5 fw-bold">ФИО</div>
                        <div class="col-md-4 col-5 fw-bold">Телефон</div>
                        <div class="col-md-3 col-5 fw-bold">Время</div>
                    </div>
                    @foreach($orders as $order)
                        <div class="d-flex border-bottom p-2">
                            <div class="col-md-1 col-1">
                                <a href="{{ route('orders.show', $order->id) }}">
                                    {{ $order->id }}
                                </a>
                            </div>
                            <div class="col-md-4 col-5">{{ $order->getCustomer->name }}</div>
                            <div class="col-md-4 col-5">{{ $order->getCustomer->getPhoneNumber->phone_number }}</div>
                            <div class="col-md-3 col-5">{{ $order->getDate() }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary text-white">Все заказы</a>
                </div>
            </div>

        </div>

        <div class="col-md-5 col-12 mt-3 mt-md-0">
            <div class="bg-white rounded-4 p-4">
                <h2>Покупатели</h2>
                <div class="overflow-scroll">
                    <div class="border-bottom p-2 d-flex">
                        <div class="col-md-1 col-1 fw-bold">№</div>
                        <div class="col-md-4 col-5 fw-bold">ФИО</div>
                        <div class="col-md-4 col-5 fw-bold">Дата рождения</div>
                        <div class="col-md-3 col-5 fw-bold">Телефон</div>
                    </div>
                    @foreach($customers as $customer)
                        <div class="d-flex border-bottom p-2">
                            <div class="col-md-1 col-1">
                                <a href="{{ route('customers.show', $customer->id) }}">
                                    {{ $customer->id }}
                                </a>
                            </div>
                            <div class="col-md-4 col-5">{{ $customer->name }}</div>
                            <div class="col-md-4 col-5">{{ $customer->birth_date }}</div>
                            <div class="col-md-3 col-5">{{ $customer->getPhoneNumber->phone_number }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary text-white">Все покупатели</a>
                </div>
            </div>
        </div>

    </div>

@endsection

