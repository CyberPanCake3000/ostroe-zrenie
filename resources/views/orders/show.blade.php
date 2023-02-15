@extends('layout')

@section('content')
<div class="bg-white rounded-4 p-4 col-12 col-md-6">

    <h2>Заказ №{{ $order->id }}</h2>
    <div>
        <h2 class="text-text fw-bold">
            {{ $order->getClientInfo->name }}
        </h2>

        <div class="fw-bold">
            {{ $order->getClient->phone_number }}
        </div>

        <div class="mb-3">
            {{ $order->comment }}
        </div>

        <div class="d-flex align-items-end mb-3">
            <h2 class="m-0">
                OD
            </h2>

            <div class="d-flex justify-content-evenly container-fluid">
                <div class="col-4">
                    <div class="text-muted">
                        Sph
                    </div>
                    <div>
                        {{ $order->getClientInfo->OD_Sph }}
                    </div>
                </div>

                <div class="col-4">
                    <div class="text-muted">
                        Cyl
                    </div>
                    <div>
                        {{ $order->getClientInfo->OD_Cyl }}
                    </div>
                </div>

                <div class="col-4">
                    <div class="text-muted">
                        ax
                    </div>
                    <div>
                        {{ $order->getClientInfo->OD_ax }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start align-items-end mb-3">
            <h2 class="m-0">
                OS
            </h2>

            <div class="d-flex justify-content-evenly container-fluid">
                <div class="col-4">
                    <div class="text-muted">
                        Sph
                    </div>
                    <div>
                        {{ $order->getClientInfo->OS_Sph }}
                    </div>
                </div>

                <div class="col-4">
                    <div class="text-muted">
                        Cyl
                    </div>
                    <div>
                        {{ $order->getClientInfo->OS_Cyl }}
                    </div>
                </div>

                <div class="col-4">
                    <div class="text-muted">
                        ax
                    </div>
                    <div>
                        {{ $order->getClientInfo->OS_ax }}
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-start mb-3">
            <div class="col-4">
                <div class="text-muted">Dpp</div>
                {{ $order->getClientInfo->Dpp }}
            </div>

            <div class="col-4">
                <div class="text-muted">Модель очков</div>
                {{ $order->glasses_model }}
            </div>
        </div>

        <div class="text-muted mb-3">
            {{ $order->getDate() }}
        </div>

        <form class="d-flex justify-content-end" action="{{ route('orders.destroy', $order->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-error me-2" type="submit">Удалить</button>
            <a class="btn btn-primary text-white" href="{{ route('orders.edit', $order->id) }}">Изменить</a>
        </form>
    </div>
</div>
@endsection
