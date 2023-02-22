@extends('layout')

@section('content')
<div class="row">
    <div class="col-12 col-md-7 mb-3 mb-md-0">
        <div class="bg-white rounded-4 p-4 ">
            <h2>Покупатель №{{ $customer->id }}</h2>
            <div>
                <h2 class="text-text fw-bold">
                    {{ $customer->name }}
                </h2>

                <div class="d-flex align-items-end mb-3">
                    <h2 class="m-0 col-2">
                        OD
                    </h2>

                    <div class="d-flex justify-content-evenly container-fluid">
                        <div class="col-4">
                            <div class="text-muted">
                                Sph
                            </div>
                            <div>
                                {{ $customer->OD_Sph }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="text-muted">
                                Cyl
                            </div>
                            <div>
                                {{ $customer->OD_Cyl }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="text-muted">
                                ax
                            </div>
                            <div>
                                {{ $customer->OD_ax }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start align-items-end mb-3">
                    <h2 class="m-0 col-2">
                        OS
                    </h2>

                    <div class="d-flex justify-content-evenly container-fluid">
                        <div class="col-4">
                            <div class="text-muted">
                                Sph
                            </div>
                            <div>
                                {{ $customer->OS_Sph }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="text-muted">
                                Cyl
                            </div>
                            <div>
                                {{ $customer->OS_Cyl }}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="text-muted">
                                ax
                            </div>
                            <div>
                                {{ $customer->OS_ax }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start mb-3">
                    <div class="col-4">
                        <div class="text-muted">Dpp</div>
                        {{ $customer->Dpp }}
                    </div>
                </div>

                <form class="text-end" action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-error me-2" type="submit">Удалить
                    </button>
                    <a class="btn btn-primary text-white"
                       href="{{ route('customers.edit', $customer->id) }}">Изменить</a>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-5">
        <div class="bg-white rounded-4 p-4 ">
            <h2>Заказы покупателя</h2>
            <div>
                <div class="border-bottom p-2 d-flex">
                    <div class="col-1 fw-bold">№</div>
                    <div class="col-md-4 col-5 fw-bold">Время</div>
                    <div class="col-md-7 col-6 fw-bold">Комментарий</div>
                </div>
                    @foreach($customer->getOrders as $order)
                        <div class="d-flex border-bottom p-2">
                            <div class="col-1">
                                <a href="{{ route('orders.show', $order->id) }}">
                                    {{ $order->id }}
                                </a>
                            </div>
                            <div class="col-md-4 col-5">{{ $order->getDate() }}</div>
                            <div class="col-md-7 col-6">{{ $order->comment }}</div>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
