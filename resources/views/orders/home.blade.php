@extends('orders.layout')

@section('content')

    <div class="row">
        <div class="col-md-7 col-12 p-0">
            <div class="p-4 bg-white rounded-4 me-md-4 me-0">
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
                            <div class="col-md-1 col-1">{{ $order->id }}</div>
                            <div class="col-md-4 col-5">{{ $order->getClientInfo->name }}</div>
                            <div class="col-md-4 col-5">{{ $order->getClient->phone_number }}</div>
                            <div class="col-md-3 col-5">{{ $order->getDate() }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary text-white">Все заказы</a>
                </div>
            </div>

        </div>

        <div class="col-md-5 col-12 p-0 mt-3 mt-md-0">
            <div class="bg-white rounded-4 p-4">
                <h2>Покупатели</h2>
                <div class="overflow-scroll">
                    <div class="border-bottom p-2 d-flex">
                        <div class="col-md-1 col-1 fw-bold">№</div>
                        <div class="col-md-4 col-5 fw-bold">ФИО</div>
                        <div class="col-md-4 col-5 fw-bold">Дата рождения</div>
                        <div class="col-md-3 col-5 fw-bold">Телефон</div>
                    </div>
                    @foreach($orders as $order)
                        <div class="d-flex border-bottom p-2">
                            <div class="col-md-1 col-1">{{ $order->getClientInfo->id }}</div>
                            <div class="col-md-4 col-5">{{ $order->getClientInfo->name }}</div>
                            <div class="col-md-4 col-5">{{ $order->getClientInfo->birth_date }}</div>
                            <div class="col-md-3 col-5">{{ $order->getClient->phone_number }}</div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('clients') }}" class="btn btn-primary text-white">Все покупатели</a>
                </div>
            </div>
        </div>

    </div>

@endsection

