@extends('layout')

@section('content')
    @if($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div>
                {{ $message }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($error = Session::get('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div>
                {{ $error }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Все покупатели
            </button>
        </li>
    </ul>

    <div class="bg-white rounded-4 p-3">
        <div class="container-fluid">
            <div class="overflow-scroll">
                <div class="border-bottom p-2 d-flex">
                    <div class="fw-bold col-md-1 col-1 me-2">№</div>
                    <div class="fw-bold col-md-3 col-5">ФИО</div>
                    <div class="fw-bold col-md-3 col-4">Дата рождения</div>
                </div>

                @isset($customers)
                    @foreach($customers as $customer)

                        <div class="d-flex border-bottom p-2" data-bs-toggle="modal"
                             data-bs-target="#orderModal{{ $customer->id }}">
                            <div class="col-md-1 col-1 me-2">{{ $customer->id }}</div>
                            <div class="col-md-3 col-5">{{ $customer->name }}</div>
                            <div class="col-md-3 col-4">{{ $customer->getBirthDate() }}</div>
                        </div>

                        <div class="modal fade" id="orderModal{{ $customer->id }}" tabindex="-1"
                             aria-labelledby="orderModal{{ $customer->id }}Label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-muted" id="orderModal{{ $customer->id }}Label">
                                            Покупатель
                                            № {{ $customer->id }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="text-text fw-bold">
                                            {{ $customer->name }}
                                        </h2>

                                        <div class="mb-3">
                                            {{ $customer->getBirthDate() }}
                                        </div>

                                        <div class="mb-3">
                                            {{ $customer->getPhoneNumber->phone_number }}
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

                                        @if(count($customer->getOrders) == 0)
                                            <div
                                                class="bg-body d-flex justify-content-center align-items-center mb-2 p-4">
                                                <div class="text-muted text-center">
                                                    <i class="bi bi-bag-x"></i><br>
                                                    <span>Заказы не найдены</span>
                                                </div>
                                            </div>
                                        @else
                                            <div class="">
                                                <h5>Заказы покупателя</h5>
                                                <div class="px-2">
                                                    <div class="row border-bottom">
                                                        <div class="fw-bold col-1">№</div>
                                                        <div class="fw-bold col-5">Дата</div>
                                                        <div class="fw-bold col-5">Номер телефона</div>
                                                        <div class="col-1"></div>
                                                    </div>
                                                    @foreach($customer->getOrders as $order)
                                                        <div class="row border-bottom py-2">
                                                            <a href="{{ route('orders.show', $order->id) }}"
                                                               class="col-1">{{ $order->id }}</a>
                                                            <div class="col-5">{{ $order->getDate() }}</div>
                                                            <div
                                                                class="col-5">{{ $order->getCustomer->getPhoneNumber->phone_number }}</div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        @endif
                                        <div class="modal-footer">
                                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
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
                            </div>
                        </div>
                    @endforeach
                @endisset

            </div>

        </div>
    </div>

    <div class="mt-2">
        {{ $customers->links() }}
    </div>
@endsection
