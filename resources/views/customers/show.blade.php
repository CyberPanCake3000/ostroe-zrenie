@extends('layout')

@section('content')

    <div class="bg-white rounded-4 p-4 col-12 col-md-6">

        <h2>Покупатель №{{ $client->id }}</h2>
        <div>
            <h2 class="text-text fw-bold">
                {{ $client->name }}
            </h2>

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
                            {{ $client->OD_Sph }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="text-muted">
                            Cyl
                        </div>
                        <div>
                            {{ $client->OD_Cyl }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="text-muted">
                            ax
                        </div>
                        <div>
                            {{ $client->OD_ax }}
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
                            {{ $client->OS_Sph }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="text-muted">
                            Cyl
                        </div>
                        <div>
                            {{ $client->OS_Cyl }}
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="text-muted">
                            ax
                        </div>
                        <div>
                            {{ $client->OS_ax }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-start mb-3">
                <div class="col-4">
                    <div class="text-muted">Dpp</div>
                    {{ $client->Dpp }}
                </div>
            </div>


            <div class="d-flex justify-content-end">
                <a class="btn btn-primary text-white" href="{{ route('clients.edit', $client->id) }}">Изменить</a>
            </div>
        </div>
    </div>

@endsection
