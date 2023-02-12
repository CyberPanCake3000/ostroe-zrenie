@extends('no.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success rounded-4">
            <p class="m-0">{{ $message }}</p>
        </div>
    @endif

    @if (count($orders) === 0)
        <div class="bg-white h-100 rounded-4 d-flex justify-content-center align-items-center">
            <div class="text-center">
                <div class="h2 text-muted">
                    <i class="bi bi-clipboard2-x"></i>
                </div>
                Пока что тут пусто...
            </div>
        </div>
    @else
        @foreach($orders as $order)
            <div class="bg-white rounded-4 d-flex flex-column content-fluid mb-3 py-3 px-4" data-bs-toggle="modal"
                 data-bs-target="#orderModal{{ $order->id }}">
                <div class="text-muted d-flex justify-content-between align-items-center">
                    <div>
                        Заказ № {{ $order->id }}
                    </div>
                    <div>
                        {{ $order->getDate() }}
                    </div>
                </div>

                <div>
                    <div class="text-text fs-3">
                        {{ $order->getClientInfo->name }}
                    </div>
                    <div class="fw-bold fs-5">
                        {{ $order->getClient->phone_number }}
                    </div>
                    <div>
                        {{ $order->comment }}
                    </div>
                </div>
            </div>

            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1"
                 aria-labelledby="orderModal{{ $order->id }}Label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-muted" id="orderModal{{ $order->id }}Label">Заказ
                                № {{ $order->id }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                <h2 class="m-0 col-2">
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
                                <h2 class="m-0 col-2">
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

                            <div class="text-muted">
                                {{ $order->getDate() }}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form id="deleteOrder" action="{{ route('orders.destroy', $order->id) }}"
                                  class="d-flex justify-content-between" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-error text-white me-2 deleteOrder">Удалить</button>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary text-white">Редактировать</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach

        {{ $orders->links() }}

    @endif

@endsection

{{--    @if (Route::has('login'))--}}
{{--        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--            @auth--}}
{{--                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>--}}
{{--            @else--}}
{{--                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}
{{--            @endauth--}}
{{--        </div>--}}
{{--    @endif--}}


