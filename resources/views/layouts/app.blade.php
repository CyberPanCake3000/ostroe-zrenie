<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="container py-2 d-flex flex-column min-vh-100">
<nav class="bg-white rounded-4 d-flex justify-content-between py-3 px-5 align-items-center">
    <img src="/attachments/brand/logo.png" alt="" height="60px">
    <div>
        <a class="btn btn-white btn-outline-primary" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Выйти
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>
<div class="d-flex py-3">
    <aside class="col-3 pe-3">
        <form action="" class="mb-3 d-flex bg-white rounded-4">
            <input type="text" class="form-control border-0 bg-white ms-3" placeholder="Поиск"
                   aria-label="Поиск"
                   aria-describedby="buttonSearch">
            <button class="btn " type="button" id="buttonSearch">
                <div class="container-fluid bg-primary rounded-circle">
                    s
                </div>
            </button>
        </form>

        <div class="bg-white rounded-4 d-flex flex-column mb-3 p-4">
            <div id="dayDiv" class="fs-3">
            </div>

            <div id="dateDiv" class="fs-3 fw-bold">
            </div>

            <div id="timeDiv" class="fs-1 text-text mb-3">
            </div>

            <div>
                <div class="text-muted">
                    Заказов за сегодня
                </div>
                <div class="h3 fw-bold">
                    {{ $count }}
                </div>
            </div>
        </div>

        <button
            class="btn btn-lg btn-primary d-flex justify-content-between align-items-center text-white rounded-4 px-4 py-2 container-fluid"
            data-bs-toggle="modal"
            data-bs-target="#addOrderModal">
            <span>
                Добавить заказ
            </span>
            <i>i</i>
        </button>

        <div class="modal fade" id="addOrderModal" tabindex="-1"
             aria-labelledby="addOrderModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addOrderModalLabel">Добавление заказа</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="createForm" action="" method="POST">
                            @csrf

                            <div id="errorDiv" class="alert alert-danger d-none">
                                <span class="fw-bold">Ошибка заполнения формы!</span>
                                <div id="errorMessage">

                                </div>
                            </div>

                            <div class="row g-2 align-items-start mb-3">
                                <div class="col-6">
                                    <label for="clientName" class="form-label">Имя покупателя</label>
                                    <input name="clientName" id="clientName" type="text" class="form-control"
                                           placeholder="Имя покупателя" required>
                                </div>
                                <div class="col-6">
                                    <label for="clientBirthDate" class="form-label">Дата рождения</label>
                                    <input name="clientBirthDate" id="clientBirthDate" type="date"
                                           class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="clientPhone" class="form-label">Номер телефона покупателя</label>
                                    <input name="clientPhone" id="clientPhone" type="tel" class="form-control"
                                           placeholder="+7 999 99 99 99" required>
                                </div>
                            </div>

                            <div class="d-flex align-items-end mb-3">
                                <h4 class="m-0 col-1">
                                    OD
                                </h4>

                                <div class="row gx-3 container-fluid">
                                    <div class="col-4">
                                        <label for="OD_Sph" class="form-label">Sph</label>
                                        <input type="number" value="0" step="any" name="OD_Sph" id="OD_Sph" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label for="OD_Cyl" class="form-label">Cyl</label>
                                        <input type="number" value="0" step="any" name="OD_Cyl" id="OD_Cyl" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label for="OD_ax" class="form-label">ax</label>
                                        <input type="number" value="0" step="any" name="OD_ax" id="OD_ax" class="form-control">
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
                                        <input type="number" value="0" step="any" name="OS_Sph" id="OS_Sph" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label for="OS_Cyl" class="form-label">Cyl</label>
                                        <input type="number" value="0" step="any" name="OS_Cyl" id="OS_Cyl" class="form-control">
                                    </div>

                                    <div class="col-4">
                                        <label for="OS_ax" class="form-label">ax</label>
                                        <input type="number" value="0" step="any" name="OS_ax" id="OS_ax" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 align-items-end mb-3">
                                <div class="col-6">
                                    <label for="Dpp" class="form-label">Dpp</label>
                                    <input name="Dpp" id="Dpp" type="number" value="0" step="any" class="form-control">
                                </div>
                                <div class="col-6">
                                    <label for="glassesModel" class="form-label">Модель очков</label>
                                    <input name="glassesModel" id="glassesModel" type="text" class="form-control">
                                </div>
                            </div>

                            <div>
                                <label for="orderComment" class="form-label">Комментарий по заказу</label>
                                <textarea type="text" class="form-control mb-3" name="orderComment"
                                          id="orderComment"></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary">Отмена</button>
                                <button type="submit" id="submitForm" class="btn btn-primary text-white">Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </aside>

    <main id="ordersList" class="col-9">
        @yield('content')
    </main>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="notificationToast" class="toast border-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header justify-content-between">
                <small class="orderDate"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">

            </div>
        </div>
    </div>

</div>
<footer class="bg-white rounded-4 d-flex justify-content-between py-3 px-5 align-items-end footer mt-auto">
    <div class="col-4">
        <div class="mb-3">По всем вопросам работы приложения обращаться в техподдержку</div>

        <div class="">
            <a href="#" class="rounded-circle nav-link d-flex align-items-center mb-2">
                <i class="btn btn-primary rounded-circle text-white me-2">t</i>
                <span class="text-text">kroshka0kartoshka</span>
            </a>

            <a href="#" class="rounded-circle nav-link d-flex align-items-center mb-2">
                <i class="btn btn-yellow rounded-circle text-white me-2">p</i>
                <span class="text-text">8 996 343 86 99</span>
            </a>

            <a href="#" class="rounded-circle nav-link d-flex align-items-center">
                <i class="btn btn-violet rounded-circle text-white me-2">a</i>
                <span class="text-text">ergatapovaer@gmail.com</span>
            </a>
        </div>
    </div>
    <div class="text-end text-muted">
        <div class="mb-3">
            <span>OstroeApp</span> <br>
            <span>Версия 1.0.0</span>
        </div>
        <div>
            © 2023, Gatapova E.
        </div>
    </div>
</footer>
</body>
