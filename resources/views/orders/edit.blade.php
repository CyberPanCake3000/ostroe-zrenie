@extends('layout')

@section('content')

    <form id="editOrderForm" class="bg-white rounded-4 p-4 col-12"
          action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h2>Редактировать информацию о заказе №{{ $order->id }}</h2>

        <div id="errorDiv" class="alert alert-danger d-none">
            <span class="fw-bold">Ошибка заполнения формы!</span>
            <div id="errorMessage">

            </div>
        </div>

        <div class="container row">

            <div class=" col-md-6 col-12 row g-2 align-items-start mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Имя покупателя</label>
                    <input list="customers" name="name" id="name" type="text" class="name form-control"
                           placeholder="Имя покупателя" value="{{ $order->getCustomer->name }}" required>
                    <datalist id="customers"  class="customers">

                    </datalist>
                </div>
                <div class="col-6">
                    <label for="birth_date" class="form-label">Дата рождения</label>
                    <input name="birth_date" id="birth_date" type="date"
                           class="birth_date form-control" value="{{ $order->getCustomer->birth_date }}">
                </div>
                <div class="col-md-6 col-12">
                    <label for="phone_number" class="form-label">Номер телефона покупателя</label>
                    <input list="phone_numbers" id="phone_number" name="phone_number" placeholder="+7 999 99 99 99" class="phone_number form-control" type="tel" value="{{ $order->getCustomer->getPhoneNumber->phone_number }}" required/>
                    <datalist id="phone_numbers"  class="phone_number">

                    </datalist>
                </div>
            </div>

            <div class="col-md-6 col-12">
                <div class="d-flex align-items-end mb-3">
                    <h4 class="m-0">
                        OD
                    </h4>

                    <div class="row gx-3 container-fluid">
                        <div class="col-4">
                            <label for="OD_Sph" class="form-label">Sph</label>
                            <input type="number" step="any" name="OD_Sph" id="OD_Sph"
                                   class="form-control" value="{{ $order->getCustomer->OD_Sph }}">
                        </div>

                        <div class="col-4">
                            <label for="OD_Cyl" class="form-label">Cyl</label>
                            <input type="number" step="any" name="OD_Cyl" id="OD_Cyl"
                                   class="form-control" value="{{ $order->getCustomer->OD_Cyl }}">
                        </div>

                        <div class="col-4">
                            <label for="OD_ax" class="form-label">ax</label>
                            <input type="number" step="any" name="OD_ax" id="OD_ax"
                                   class="form-control" value="{{ $order->getCustomer->OD_ax }}">
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-end mb-3">
                    <h4 class="m-0">
                        OS
                    </h4>

                    <div class="row gx-3 container-fluid">
                        <div class="col-4">
                            <label for="OS_Sph" class="form-label">Sph</label>
                            <input type="number" step="any" name="OS_Sph" id="OS_Sph"
                                   class="form-control" value="{{ $order->getCustomer->OS_ax }}">
                        </div>

                        <div class="col-4">
                            <label for="OS_Cyl" class="form-label">Cyl</label>
                            <input type="number" step="any" name="OS_Cyl" id="OS_Cyl"
                                   class="form-control" value="{{ $order->getCustomer->OS_ax }}">
                        </div>

                        <div class="col-4">
                            <label for="OS_ax" class="form-label">ax</label>
                            <input type="number" step="any" name="OS_ax" id="OS_ax"
                                   class="form-control" value="{{ $order->getCustomer->OS_ax }}">
                        </div>
                    </div>
                </div>

                <div class="row g-2 align-items-end mb-3">
                    <div class="col-6">
                        <label for="Dpp" class="form-label">Dpp</label>
                        <input name="Dpp" id="Dpp" type="number" step="any"
                               class="form-control" value="{{ $order->getCustomer->Dpp }}">
                    </div>
                    <div class="col-6">
                        <label for="glassesModel" class="form-label">Модель очков</label>
                        <input name="glassesModel" id="glassesModel" type="text" class="form-control"
                               value="{{ $order->glasses_model }}">
                    </div>
                </div>
            </div>

        </div>



        <div class="col-12 col-md-6">
            <label for="comment" class="form-label">Комментарий по заказу</label>
            <textarea type="text" class="form-control mb-3" name="comment"
                      id="comment">{{ $order->comment }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary me-2">Отмена</a>
            <button type="submit" id="submitEditOrderForm" class="btn btn-primary text-white">Изменить</button>
        </div>
    </form>

@endsection
