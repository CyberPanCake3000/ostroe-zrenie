@extends('no.app')

@section('content')

    <form id="updateForm" action="{{ route('orders.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div id="errorDiv" class="alert alert-danger d-none">
            <span class="fw-bold">Ошибка заполнения формы!</span>
            <div id="errorMessage">

            </div>
        </div>

        <div class="row g-2 align-items-start mb-3">
            <div class="col-6">
                <label for="clientName" class="form-label">Имя покупателя</label>
                <input name="clientName" id="clientName" type="text" class="form-control"
                       placeholder="Имя покупателя" value="{{ $order->getClientInfo->name }}" required>
            </div>
            <div class="col-6">
                <label for="clientBirthDate" class="form-label">Дата рождения</label>
                <input name="clientBirthDate" id="clientBirthDate" type="date"
                       value="{{ $order->getClientInfo->birth_date }}"
                       class="form-control">
            </div>
            <div class="col-md-6 col-12">
                <label for="clientPhone" class="form-label">Номер телефона покупателя</label>
                <input name="clientPhone" id="clientPhone" type="tel" class="form-control"
                       placeholder="+7 999 99 99 99" required value="{{ $order->getClient->phone_number }}">
            </div>
        </div>

        <div class="d-flex align-items-end mb-3">
            <h4 class="m-0 col-1">
                OD
            </h4>

            <div class="row gx-3 container-fluid">
                <div class="col-4">
                    <label for="OD_Sph" class="form-label">Sph</label>
                    <input type="number" value="{{ $order->getClientInfo->OD_Sph }}" step="any" name="OD_Sph"
                           id="OD_Sph"
                           class="form-control">
                </div>

                <div class="col-4">
                    <label for="OD_Cyl" class="form-label">Cyl</label>
                    <input type="number" value="{{ $order->getClientInfo->OD_Cyl }}" step="any" name="OD_Cyl"
                           id="OD_Cyl"
                           class="form-control">
                </div>

                <div class="col-4">
                    <label for="OD_ax" class="form-label">ax</label>
                    <input type="number" value="{{ $order->getClientInfo->OD_ax }}" step="any" name="OD_ax" id="OD_ax"
                           class="form-control">
                </div>
            </div>
        </div>

        <div class="d-flex align-items-end mb-3">
            <h4 class="m-0 col-1">
                OS
            </h4>

            <div class="row gx-3 container-fluid">
                <div class="col-4">
                    <label for="OS_Sph" class="form-label">Sph</label>
                    <input type="number" value="{{ $order->getClientInfo->OS_Sph }}" step="any" name="OS_Sph"
                           id="OS_Sph"
                           class="form-control">
                </div>

                <div class="col-4">
                    <label for="OS_Cyl" class="form-label">Cyl</label>
                    <input type="number" value="{{ $order->getClientInfo->OS_Cyl }}" step="any" name="OS_Cyl"
                           id="OS_Cyl"
                           class="form-control">
                </div>

                <div class="col-4">
                    <label for="OS_ax" class="form-label">ax</label>
                    <input type="number" value="{{ $order->getClientInfo->OS_ax }}" step="any" name="OS_ax" id="OS_ax"
                           class="form-control">
                </div>
            </div>
        </div>

        <div class="row g-2 align-items-end mb-3">
            <div class="col-6">
                <label for="Dpp" class="form-label">Dpp</label>
                <input name="Dpp" id="Dpp" type="number" value="{{ $order->getClientInfo->Dpp }}" step="any"
                       class="form-control">
            </div>
            <div class="col-6">
                <label for="glassesModel" class="form-label">Модель очков</label>
                <input name="glassesModel" id="glassesModel" type="text" class="form-control"
                       value="{{ $order->getClientInfo->glassesModel }}">
            </div>
        </div>

        <div>
            <label for="orderComment" class="form-label">Комментарий по заказу</label>
            <textarea type="text" class="form-control mb-3" name="orderComment"
                      id="orderComment">{{ $order->comment }}</textarea>
        </div>

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Отмена</button>
            <button type="submit" id="submitForm" class="btn btn-primary text-white">Изменить</button>
        </div>
    </form>

@endsection