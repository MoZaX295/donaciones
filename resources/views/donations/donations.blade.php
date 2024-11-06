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
                    <a href="donation.html" class="nav-item nav-link active">Donar</a>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user"></i> <!-- Ícono de usuario -->
                            {{ session('user_name', 'Usuario') }} <!-- Nombre del usuario -->
                        </a>
                    </li>
                </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Donar</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Donate Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Dona Ahora</div>
                    <h1 class="display-6 mb-5 ">Gracias por tu donación</h1>
                    @if (session('donation_type') && session('quantity'))
                        <div id="resumen">
                            <h3 class="text-primary" class="text-primary">Resumen de tu donación</h3>
                            <p style="color: #000; font-weight: bold;"><strong>Tipo de Donación:</strong> <span
                                    id="summaryDonationType">{{ session('donation_type', 'No especificado') }}</span></p>
                            <p style="color: #000; font-weight: bold;"><strong>Cantidad:</strong> <span id="summaryQuantity">{{ session('quantity', '0') }}</span></p>
                            <p style="color: #000; font-weight: bold;"><strong>Destino de donación:</strong> <span id="summaryRegion">{{ session('region', 'No especificado') }}</span></p>
                        </div>
                    @else
                        <div id="resumen" style="display: none;">
                            <h3>Resumen de tu donación</h3>
                            <p style="color: #000; font-weight: bold;"><strong>Tipo de Donación:</strong> <span id="summaryDonationType">No hay datos
                                    disponibles.</span></p>
                            <p style="color: #000; font-weight: bold;"><strong>Cantidad:</strong> <span id="summaryQuantity">0</span></p>
                            <p style="color: #000; font-weight: bold;"><strong>Destino de donación:</strong> <span id="summaryRegion">No hay datos disponibles.</span></p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-secondary p-5">
                        <form action="{{ route('donar.store') }}" method="POST">
                            @csrf
                            @if (session()->get('success'))
                                <div class="alert alert-success text-center">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select id="donation_type" name="donation_type" placeholder="Tipo de donación"
                                            class="form-control bg-light border-0">
                                            <option value="" disabled selected hidden></option>
                                            <option value="1">Alimentos</option>
                                            <option value="2">Medicinas</option>
                                            <option value="3">Ropa</option>
                                            <option value="4">Apoyo monetario</option>
                                        </select>
                                        <label style="color: #000; font-weight: bold;" for="donation_type">Tipo de Donación</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-light border-0" id="quantity"
                                            name="quantity" placeholder="Cantidad">
                                        <label for="quantity" style="color: #000; font-weight: bold;">Cantidad</label>
                                    </div>
                                </div>
                               <div class="col-12">
                                    <div class="form-floating">
                                        <select id="regions" name="regions" placeholder="Destino de donación"
                                            class="form-control bg-light border-0">
                                            <option value="" disabled selected hidden></option>
                                            <option value="1">Acapulco, Guerrero (Huracán Otis)</option>
                                            <option value="2">Cancún, Yucatán (Huracán Milton)</option>
                                            <option value="3">Cozumel, Quintana Roo (Huracán Beryl)</option>
                                        </select>
                                        <label style="color: #000; font-weight: bold;" for="regions">Destino de donación</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-5" style="height: 60px; font-weight: bold;" type="submit">
                                        Registrar Donación
                                        <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Donate End -->
@endsection
