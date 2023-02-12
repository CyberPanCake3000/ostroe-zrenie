<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="min-vh-100 d-flex flex-column">

<header class="d-flex flex-shrink-0">
    <div class="col-3 d-none d-md-flex bg-white px-md-5 py-md-3 py-2 align-items-center">
        <img src="/attachments/brand/logo.png" alt="" height="40px" class="d-none d-md-block">
    </div>
    <div class="container px-md-5 py-md-3 py-2">
        <div class="p-4 bg-white rounded-4 d-flex justify-content-between ">

            <form class="w-25 input-group">
                <input type="text" class="form-control" placeholder="Поиск..." aria-label="Поиск" aria-describedby="searchButton">
                <button class="btn btn-primary text-white" type="button" id="searchButton"><i class="bi bi-search"></i></button>
            </form>

            <a class="btn btn-primary text-white d-flex" href="#">
                <span class="d-none d-md-block me-2">Выйти</span>
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </div>
</header>

<div class="d-flex flex-grow-1 overflow-hidden">

    <nav class="navbar col-3 d-none d-md-block py-md-3 px-md-5 py-2 bg-white">
        <div class="container p-0 d-flex">
            <div class="">
                <span id="dateDiv" class="dateDiv"></span>, <span id="dayDiv" class="dayDiv"></span>
                <div id="timeDiv" class="timeDiv fs-2 fw-bold"></div>
            </div>
            <div>
                <div class="text-muted">
                    Заказов за сегодня
                </div>
                <div class="fs-2 m-0 fw-bold">
                    {{ $count }}
                </div>
            </div>
        </div>

        <ul class="navbar-nav">
            <hr>
            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-house me-2 fs-5"></i>
                <a class="nav-link" href="{{ route('home') }}">Главная</a>
            </li>

            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-card-list me-2 fs-5"></i>
                <a class="nav-link" href="{{ route('orders.index') }}">Заказы</a>
            </li>

            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-people me-2 fs-5"></i>
                <a class="nav-link" href="{{ route('clients') }}">Покупатели</a>
            </li>
            <hr/>
            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-question-circle me-2 fs-5"></i>
                <a class="nav-link" href="{{ route('support') }}">Поддержка</a>
            </li>
        </ul>
    </nav>

<div class="container-fluid p-0">
    <div class="container py-md-3 px-md-5 py-2  d-flex d-md-none">
        <div class="me-4">
            <span id="dateDiv" class="dateDiv"></span>, <span id="dayDiv" class="dayDiv"></span>
            <div id="timeDiv" class="timeDiv fs-2 fw-bold"></div>
        </div>
        <div>
            <div class="text-muted">
                Заказов за сегодня
            </div>
            <div class="fs-2 m-0 fw-bold">
                {{ $count }}
            </div>
        </div>
    </div>

    <main class="container py-md-3 px-md-5 py-2 bg-body">
        @yield('content')
    </main>
</div>

{{--    <div class="sticky-bottom d-flex justify-content-end">--}}
{{--        <button--}}
{{--            class="btn btn-primary text-white rounded-circle d-inline-flex px-2 py-1 mb-2"--}}
{{--            data-bs-toggle="modal"--}}
{{--            data-bs-target="#addOrderModal">--}}
{{--            <span class="fs-3 lh-1 m-1">+</span>--}}
{{--        </button>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="addOrderModal" tabindex="-1"--}}
{{--         aria-labelledby="addOrderModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="addOrderModalLabel">Добавление заказа</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form id="createForm" action="{{ route('orders.store') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div id="errorDiv" class="alert alert-danger d-none">--}}
{{--                            <span class="fw-bold">Ошибка заполнения формы!</span>--}}
{{--                            <div id="errorMessage">--}}

{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row g-2 align-items-start mb-3">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="clientName" class="form-label">Имя покупателя</label>--}}
{{--                                <input name="clientName" id="clientName" type="text" class="form-control"--}}
{{--                                       placeholder="Имя покупателя" required>--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="clientBirthDate" class="form-label">Дата рождения</label>--}}
{{--                                <input name="clientBirthDate" id="clientBirthDate" type="date"--}}
{{--                                       class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 col-12">--}}
{{--                                <label for="clientPhone" class="form-label">Номер телефона покупателя</label>--}}
{{--                                <input name="clientPhone" id="clientPhone" type="tel" class="form-control"--}}
{{--                                       placeholder="+7 999 99 99 99" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-end mb-3">--}}
{{--                            <h4 class="m-0 col-1">--}}
{{--                                OD--}}
{{--                            </h4>--}}

{{--                            <div class="row gx-3 container-fluid">--}}
{{--                                <div class="col-4">--}}
{{--                                    <label for="OD_Sph" class="form-label">Sph</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OD_Sph" id="OD_Sph"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}

{{--                                <div class="col-4">--}}
{{--                                    <label for="OD_Cyl" class="form-label">Cyl</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OD_Cyl" id="OD_Cyl"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}

{{--                                <div class="col-4">--}}
{{--                                    <label for="OD_ax" class="form-label">ax</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OD_ax" id="OD_ax"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex align-items-end mb-3">--}}
{{--                            <h4 class="m-0 col-1">--}}
{{--                                OS--}}
{{--                            </h4>--}}

{{--                            <div class="row gx-3 container-fluid">--}}
{{--                                <div class="col-4">--}}
{{--                                    <label for="OS_Sph" class="form-label">Sph</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OS_Sph" id="OS_Sph"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}

{{--                                <div class="col-4">--}}
{{--                                    <label for="OS_Cyl" class="form-label">Cyl</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OS_Cyl" id="OS_Cyl"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}

{{--                                <div class="col-4">--}}
{{--                                    <label for="OS_ax" class="form-label">ax</label>--}}
{{--                                    <input type="number" value="0" step="any" name="OS_ax" id="OS_ax"--}}
{{--                                           class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row g-2 align-items-end mb-3">--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="Dpp" class="form-label">Dpp</label>--}}
{{--                                <input name="Dpp" id="Dpp" type="number" value="0" step="any"--}}
{{--                                       class="form-control">--}}
{{--                            </div>--}}
{{--                            <div class="col-6">--}}
{{--                                <label for="glassesModel" class="form-label">Модель очков</label>--}}
{{--                                <input name="glassesModel" id="glassesModel" type="text" class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <label for="orderComment" class="form-label">Комментарий по заказу</label>--}}
{{--                            <textarea type="text" class="form-control mb-3" name="orderComment"--}}
{{--                                      id="orderComment"></textarea>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Отмена</button>--}}
{{--                            <button type="submit" id="submitForm" class="btn btn-primary text-white">Добавить--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

</body>
</html>
