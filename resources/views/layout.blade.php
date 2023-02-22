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
        <div class="p-3 p-md-4 bg-white rounded-4 d-flex justify-content-between ">
            <div class="col-6 col-md-4">
                <form class="input-group" action="{{ route('search') }}" method="POST">
                    @csrf
                    <input list="suggestions" type="text" id="search" name="search" class="form-control rounded-start" placeholder="Поиск..." aria-label="Поиск"
                           aria-describedby="searchButton">
                    <datalist id="suggestions" class="suggestions"></datalist>
                    <button class="btn btn-primary text-white" type="submit" id="searchButton"><i
                            class="bi bi-search"></i></button>
                </form>
            </div>


            <a class="btn btn-primary text-white d-flex" href="#">
                <span class="d-none d-md-block me-2">Выйти</span>
                <i class="bi bi-box-arrow-right"></i>
            </a>
        </div>
    </div>
</header>

<div class="d-flex flex-grow-1 overflow-hidden">

    <nav class="navbar col-3 d-none d-md-block py-md-3 px-md-5 py-2 bg-white">
        <div class="mb-3">
            <button
                class="btn btn-primary text-white d-flex justify-content-center align-items-center col-12"
                data-bs-toggle="modal"
                data-bs-target="#addOrderModal">
                <span class="fs-3 lh-1 m-1">+</span>
                <span class="d-none d-md-block">Добавить заказ</span>
            </button>
        </div>

        <div class="container p-0 d-flex flex-column align-items-start">
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
                <a class="nav-link" href="{{ route('customers.index') }}">Покупатели</a>
            </li>
            <hr/>
            <li class="nav-item d-flex align-items-center">
                <i class="bi bi-question-circle me-2 fs-5"></i>
                <a class="nav-link" href="{{ route('support') }}">Поддержка</a>
            </li>
        </ul>
    </nav>

    <div class="container py-md-3 px-md-5">
        <div class="container py-md-3 px-md-5 py-3  d-flex d-md-none">
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

        <main class="bg-body mb-5 mb-md-0 pb-4 pb-md-0">
            @yield('content')
        </main>

        <div class="container fixed-bottom d-block d-md-none pb-2">

            <div class="collapse" id="navbarToggleMainMenu">
                <div class="px-5 py-2 bg-white rounded-5 border border-primary col-10 col-sm-8   mb-3">
                    <ul class="navbar-nav">
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
                            <a class="nav-link" href="{{ route('customers.index') }}">Покупатели</a>
                        </li>
                    </ul>

                </div>
            </div>

            <div id="mobile-nav" class="d-flex flex-row">

                <div class="col-10 col-sm-8 pe-2">

                    <div class="container bg-white d-flex align-items-center justify-content-evenly rounded-pill border border-primary">
                        <nav class="navbar">
                            <button
                                class="navbar-toggler d-flex flex-column align-items-center bg-transparent border-0 fs-6"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarToggleMainMenu" aria-controls="navbarToggleMainMenu"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="text-muted">Меню</span>
                            </button>
                        </nav>

                        <a href="{{ route('support') }}"
                           class="d-flex flex-column align-items-center link-dark nav-link">
                            <i class="fa-solid fa-chart-simple text-secondary"></i>
                            <span class="text-muted">Поддержка</span>
                        </a>
                    </div>
                </div>


                <button
                    class="btn btn-primary text-white d-flex rounded-pill justify-content-center align-items-center col-2 col-sm-4 p-0"
                    data-bs-toggle="modal"
                    data-bs-target="#addOrderModal">
                    <span class="fs-3 lh-1 m-1">+</span>
                    <span class="d-none d-sm-block">Добавить заказ</span>
                </button>
            </div>
        </div>

    </div>


    <div class="modal fade" id="addOrderModal" tabindex="-1"
         aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Добавление заказа</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="createForm" action="{{ route('orders.store') }}" method="POST">
                        @csrf
                        <div id="errorDiv" class="alert alert-danger d-none">
                            <span class="fw-bold">Ошибка заполнения формы!</span>
                            <div id="errorMessage">

                            </div>
                        </div>

                        <div class="row g-2 align-items-start mb-3">
                            <div class="col-6">
                                <label for="name" class="form-label">Имя покупателя</label>
                                <input list="customers" name="name" id="name" type="text" class="name form-control"
                                       placeholder="Имя покупателя" required>
                                <datalist id="customers"  class="customers">

                                </datalist>
                            </div>
                            <div class="col-6">
                                <label for="birth_date" class="form-label">Дата рождения</label>
                                <input name="birth_date" id="birth_date" type="date"
                                       class="birth_date form-control">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="phone_number" class="form-label">Номер телефона покупателя</label>
                                <input list="phone_numbers" id="phone_number" name="phone_number" class="phone_number form-control" type="tel" required/>
                                <datalist id="phone_numbers"  class="phone_numbers">

                                </datalist>

{{--                                <input name="phone_number" id="phone_number" type="tel" class="phone_number form-control"--}}
{{--                                        required>--}}
{{--                                <ul id="resultsList"></ul>--}}
                            </div>
                        </div>

                        <div class="d-flex align-items-end mb-3">
                            <h4 class="m-0 col-1">
                                OD
                            </h4>

                            <div class="row gx-3 container-fluid">
                                <div class="col-4">
                                    <label for="OD_Sph" class="form-label">Sph</label>
                                    <input type="number" value="0" step="any" name="OD_Sph" id="OD_Sph"
                                           class="OD_Sph form-control">
                                </div>

                                <div class="col-4">
                                    <label for="OD_Cyl" class="form-label">Cyl</label>
                                    <input type="number" value="0" step="any" name="OD_Cyl" id="OD_Cyl"
                                           class="OD_Cyl form-control">
                                </div>

                                <div class="col-4">
                                    <label for="OD_ax" class="form-label">ax</label>
                                    <input type="number" value="0" step="any" name="OD_ax" id="OD_ax"
                                           class="OD_ax form-control">
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
                                    <input type="number" value="0" step="any" name="OS_Sph" id="OS_Sph"
                                           class="OS_Sph form-control">
                                </div>

                                <div class="col-4">
                                    <label for="OS_Cyl" class="form-label">Cyl</label>
                                    <input type="number" value="0" step="any" name="OS_Cyl" id="OS_Cyl"
                                           class="OS_Cyl form-control">
                                </div>

                                <div class="col-4">
                                    <label for="OS_ax" class="form-label">ax</label>
                                    <input type="number" value="0" step="any" name="OS_ax" id="OS_ax"
                                           class="OS_ax form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row g-2 align-items-end mb-3">
                            <div class="col-6">
                                <label for="Dpp" class="form-label">Dpp</label>
                                <input name="Dpp" id="Dpp" type="number" value="0" step="any"
                                       class="Dpp form-control">
                            </div>
                            <div class="col-6">
                                <label for="glassesModel" class="form-label">Модель очков</label>
                                <input name="glassesModel" id="glassesModel" type="text" class="glassesModel form-control">
                            </div>
                        </div>

                        <div>
                            <label for="comment" class="form-label">Комментарий по заказу</label>
                            <textarea type="text" class="comment form-control mb-3" name="comment"
                                      id="comment"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Отмена</button>
                            <button type="submit" id="submitForm" class="btn btn-primary text-white">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
