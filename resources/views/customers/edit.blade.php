@extends('layout')

@section('content')

    <form id="editClientForm" class="bg-white rounded-4 p-4 col-12 col-md-6" action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>Редактировать информацию о покупателе №{{ $client->id }}</h2>

        <div id="errorDiv" class="alert alert-danger d-none">
            <span class="fw-bold">Ошибка заполнения формы!</span>
            <div id="errorMessage">

            </div>
        </div>

        <div class="row g-2 align-items-start mb-3">
            <div class="col-6">
                <label for="clientName" class="form-label">Имя покупателя</label>
                <input name="clientName" id="clientName" type="text" class="form-control"
                       placeholder="Имя покупателя" value="{{ $client->name }}" required>
            </div>
            <div class="col-6">
                <label for="clientBirthDate" class="form-label">Дата рождения</label>
                <input name="clientBirthDate" id="clientBirthDate" type="date"
                       class="form-control" value="{{ $client->birth_date }}">
            </div>
        </div>

        <div class="d-flex align-items-end mb-3">
            <h4 class="m-0">
                OD
            </h4>

            <div class="row gx-3 container-fluid">
                <div class="col-4">
                    <label for="OD_Sph" class="form-label">Sph</label>
                    <input type="number" step="any" name="OD_Sph" id="OD_Sph"
                           class="form-control" value="{{ $client->OD_Sph }}">
                </div>

                <div class="col-4">
                    <label for="OD_Cyl" class="form-label">Cyl</label>
                    <input type="number" step="any" name="OD_Cyl" id="OD_Cyl"
                           class="form-control" value="{{ $client->OD_Cyl }}">
                </div>

                <div class="col-4">
                    <label for="OD_ax" class="form-label">ax</label>
                    <input type="number" step="any" name="OD_ax" id="OD_ax"
                           class="form-control" value="{{ $client->OD_ax }}">
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
                           class="form-control" value="{{ $client->OS_ax }}">
                </div>

                <div class="col-4">
                    <label for="OS_Cyl" class="form-label">Cyl</label>
                    <input type="number" step="any" name="OS_Cyl" id="OS_Cyl"
                           class="form-control" value="{{ $client->OS_ax }}">
                </div>

                <div class="col-4">
                    <label for="OS_ax" class="form-label">ax</label>
                    <input type="number" step="any" name="OS_ax" id="OS_ax"
                           class="form-control" value="{{ $client->OS_ax }}">
                </div>
            </div>
        </div>

        <div class="row g-2 align-items-end mb-3">
            <div class="col-6">
                <label for="Dpp" class="form-label">Dpp</label>
                <input name="Dpp" id="Dpp" type="number" step="any"
                       class="form-control" value="{{ $client->Dpp }}">
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('clients.index') }}" type="button" class="btn btn-secondary me-2">Отмена</a>
            <button type="submit" id="submitEditClientForm" class="btn btn-primary text-white">Изменить</button>
        </div>
    </form>
@endsection
