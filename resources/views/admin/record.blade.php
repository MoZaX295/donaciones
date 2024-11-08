@extends('layouts.imports')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0">Chari<span class="text-white">Team</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Inicio</a>
                    <a href="" class="nav-item nav-link active">Historial</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> <!-- Ícono de usuario -->
                            Usuario <!-- Nombre del usuario -->
                        </a>
                    </li>
                </div>
        </nav>
    </div>

    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">ADMINISTRACIÓN DE DONACIONES</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="table-responsive wow fadeInUp" data-wow-delay="0.1s">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary text-center">
                        <tr>
                            <th scope="col" class="bg-primary" style="font-weight: bold;">Fecha</th>
                            <th scope="col" class="bg-primary" style="font-weight: bold;">Tipo de donación</th>
                            <th scope="col" class="bg-primary" style="font-weight: bold;">Cantidad</th>
                            <th scope="col" class="bg-primary" style="font-weight: bold;">Destino de donación</th>
                            <th scope="col" class="bg-primary" style="font-weight: bold;">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            <tr class="text-center">
                                <td>{{ $donation->date }}</td>
                                <td>{{ $donation->donationType->donation_type }}</td>
                                <td>{{ $donation->quantity }}</td>
                                <td>{{ $donation->region->region }}</td>
                                <td>
                                    <form method="POST" action="{{ route('adminhistorial.update', $donation->id) }}"
                                        class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $donation->status == 1 ? 0 : 1 }}">
                                        <button type="button" onclick="confirmToggleStatus(this)"
                                            class="{{ $donation->status == 1 ? 'bg-primary' : 'bg-pending' }} text-dark"
                                            style="font-weight: bold;  ">
                                            {{ $donation->status == 1 ? 'Completado' : 'Pendiente' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <script>
                                function confirmToggleStatus(button) {
                                    if (confirm("¿Está seguro de que desea cambiar el estado?")) {
                                        button.closest('form').submit();
                                    }
                                }
                            </script>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
