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
                    <a href="donation.html" class="nav-item nav-link">Donar</a>
                    <a href="donation.html" class="nav-item nav-link">Registrar</a>
                    <a href="donation.html" class="nav-item nav-link  active">Iniciar Sesión</a>
                </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">Iniciar Sesión</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Login Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">Inicia Sesión Ahora
                    </div>
                    <h1 class="display-6 mb-5">Un pequeño gesto, un gran impacto. <br> ¡Bienvenido de nuevo!</h1>

                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-secondary p-5">
                    <form action="{{ route('iniciarsesion.store') }}" method="POST">
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
                                        <input type="text" class="form-control bg-light border-0" name='email' id="email"
                                            placeholder="Correo electronico">
                                        <label for="name">Correo Electrónico</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-light border-0" name='password' id="password"
                                            placeholder="Contraseña">
                                        <label for="name">Contraseña</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a class="link-primary" href="donation.html">¿Olvidaste tu contraseña?</a>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-5" style="height: 60px;">
                                        Iniciar Sesión
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
    <!-- Login End -->
@endsection
