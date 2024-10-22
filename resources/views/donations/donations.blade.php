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
                    <a href="donation.html" class="nav-item nav-link">Registrar</a>
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
                    <h1 class="display-6 mb-5">Gracias por tu donación</h1>
                    <div id="resumen" >
                        <h3>Resumen de tu donación</h3>
                        <p><strong>Tipo de Donación:</strong> <span id="summaryDonationType"></span></p>
                        <p><strong>Cantidad:</strong> <span id="summaryQuantity"></span></p>
                      </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100 bg-secondary p-5">
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select id="donationType" name="donationType" placeholder="Tipo de donación" class="form-control bg-light border-0">
                                            <option value="" disabled selected hidden></option>
                                            <option value="opcion1">Alimentos</option>
                                            <option value="opcion2">Medicinas</option>
                                            <option value="opcion3">Ropa</option>
                                            <option value="opcion4">Apoyo monetario</option>
                                          </select>
                                        <label for="name">Tipo de Donación</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-light border-0" id="quantity" placeholder="Cantidad">
                                        <label for="quantity">Cantidad</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary px-5" style="height: 60px;">
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
