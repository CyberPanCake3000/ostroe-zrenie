@extends('layout')

@section('content')

    <div class="">
        <h2 class="mb-4">Результаты поиска для "{{ $query }}"</h2>

        @if(! $orders->isEmpty())
            <div class="col-12">
                <div class="bg-white rounded-4 p-3 p-md-4 mb-3">
                    <h3>Заказы</h3>
                    <div class="overflow-scroll">
                        <div class="border-bottom p-2 d-flex">
                            <div class="fw-bold col-1 me-2">№</div>
                            <div class="fw-bold col-md-2 col-5">ФИО</div>
                            <div class="fw-bold col-md-3 col-5">Телефон</div>
                            <div class="fw-bold col-md-3 col-5">Время</div>
                            <div class="fw-bold col-md-3 col-5">Комментарий</div>
                        </div>
                        @foreach($orders as $order)

                            <div class="d-flex border-bottom p-2" data-bs-toggle="modal"
                                 data-bs-target="#orderModal{{ $order->id }}">

                                <div class="col-1 me-2">{{ $order->id }}</div>
                                <div class="col-md-2 col-5">{{ $order->getCustomer->name }}</div>
                                <div
                                    class="col-md-3 col-5">{{ $order->getCustomer->getPhoneNumber->phone_number }}</div>
                                <div class="col-md-3 col-5">{{ $order->getDate() }}</div>
                                <div class="col-md-3 col-5">{{ $order->comment }}</div>

                            </div>

                            <div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1"
                                 aria-labelledby="orderModal{{ $order->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-muted"
                                                id="orderModal{{ $order->id }}Label">
                                                Заказ
                                                № {{ $order->id }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-text fw-bold">
                                                {{ $order->getCustomer->name }}
                                            </h2>

                                            <div class="fw-bold">
                                                {{ $order->getCustomer->getPhoneNumber->phone_number }}
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
                                                            {{ $order->getCustomer->OD_Sph }}
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="text-muted">
                                                            Cyl
                                                        </div>
                                                        <div>
                                                            {{ $order->getCustomer->OD_Cyl }}
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="text-muted">
                                                            ax
                                                        </div>
                                                        <div>
                                                            {{ $order->getCustomer->OD_ax }}
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
                                                            {{ $order->getCustomer->OS_Sph }}
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="text-muted">
                                                            Cyl
                                                        </div>
                                                        <div>
                                                            {{ $order->getCustomer->OS_Cyl }}
                                                        </div>
                                                    </div>

                                                    <div class="col-4">
                                                        <div class="text-muted">
                                                            ax
                                                        </div>
                                                        <div>
                                                            {{ $order->getCustomer->OS_ax }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-start mb-3">
                                                <div class="col-4">
                                                    <div class="text-muted">Dpp</div>
                                                    {{ $order->getCustomer->Dpp }}
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
                                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-error" type="submit">Удалить</button>
                                                <a class="btn btn-primary text-white"
                                                   href="{{ route('orders.edit', $order->id) }}">Изменить</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
            @if(! $customers->isEmpty())
                <div class="col-md-8 col-12">
                    <div class=" bg-white rounded-4 p-3 p-md-4 mb-3">
                        <h3>Покупатели</h3>

                        <div class="border-bottom p-2 d-flex">
                            <div class="fw-bold col-md-1 col-1 me-2">№</div>
                            <div class="fw-bold col-md-3 col-5">ФИО</div>
                            <div class="fw-bold col-md-3 col-4">Дата рождения</div>
                        </div>
                        @foreach($customers as $customer)

                            <div class="d-flex border-bottom p-2" data-bs-toggle="modal"
                                 data-bs-target="#customerModal{{ $customer->id }}">
                                <div class="col-md-1 col-1 me-2">{{ $customer->id }}</div>
                                <div class="col-md-3 col-5">{{ $customer->name }}</div>
                                <div class="col-md-3 col-4">{{ $customer->getBirthDate() }}</div>
                            </div>

                            <div class="modal fade" id="customerModal{{ $customer->id }}" tabindex="-1"
                                 aria-labelledby="customerModal{{ $customer->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-muted"
                                                id="customerModal{{ $customer->id }}Label">
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
                                                <button class="btn btn-outline-error me-2 disabled" type="submit">
                                                    Удалить
                                                </button>
                                                <a class="btn btn-primary text-white"
                                                   href="{{ route('customers.edit', $customer->id) }}">Изменить</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(! $phoneNumbers->isEmpty())
                <div class="col-md-4 col-12">
                    <div class="bg-white rounded-4 p-3 p-md-4 mb-3">
                        <h3>Номера телефонов</h3>

                        <div class="border-bottom p-2 d-flex">
                            <div class="fw-bold col-2 me-2">№</div>
                            <div class="fw-bold col-10">Номер телефона</div>
                        </div>

                        @foreach($phoneNumbers as $phoneNumber)
                            <div class="d-flex border-bottom p-2" data-bs-toggle="modal"
                                 data-bs-target="#phoneModal{{ $phoneNumber->id }}">
                                <div class="col-2 me-2">{{ $phoneNumber->id }}</div>
                                <div class="col-10">{{ $phoneNumber->phone_number }}</div>
                            </div>

                            <div class="modal fade" id="phoneModal{{ $phoneNumber->id }}" tabindex="-1"
                                 aria-labelledby="phoneModal{{ $phoneNumber->id }}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-muted"
                                                id="phoneModal{{ $phoneNumber->id }}Label">
                                                Номер телефона
                                                № {{ $phoneNumber->id }}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h2 class="text-text fw-bold">
                                                {{ $phoneNumber->phone_number }}
                                            </h2>


                                            @if(count($phoneNumber->getCustomers) == 0)
                                                <div
                                                    class="bg-body d-flex justify-content-center align-items-center mb-2 p-4">
                                                    <div class="text-muted text-center">
                                                        <i class="bi bi-bag-x"></i><br>
                                                        <span>Нет покупателей с таким номером</span>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="">
                                                    <h5>Покупатели с этим номером телефона</h5>
                                                    <div class="px-2">
                                                        <div class="row border-bottom">
                                                            <div class="fw-bold col-1">№</div>
                                                            <div class="fw-bold col-5">Дата рождения</div>
                                                            <div class="fw-bold col-5">Имя</div>
                                                            <div class="col-1"></div>
                                                        </div>
                                                        @foreach($phoneNumber->getCustomers as $customer)
                                                            <div class="row border-bottom py-2">
                                                                <a href="{{ route('customers.show', $customer->id) }}"
                                                                   class="col-1">{{ $customer->id }}</a>
                                                                <div class="col-5">{{ $customer->getBirthDate() }}</div>
                                                                <div
                                                                    class="col-5">{{ $customer->name }}</div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

    </div>

@endsection
