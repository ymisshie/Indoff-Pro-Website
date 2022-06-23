<?php
$title = "Contacto";
$pagina = "contacto";

//Variables de navegacion
include('../roots.php');

include('../../header.php');

require $root_vendor;
?>
<section>
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-5 px-5 align-self-center">
                <h1 class="fw-700 text-red">Contáctanos</h1>

                <p class="py-4">¿Tiene alguna pregunta? Nos gustaria saber sobre usted. Para cualquier situación puede contactarnos por los siguientes medios.</p>

                <div class="col-3 justify-content-between d-flex">
                    <a href="https://www.facebook.com/indoffpro"><i class="fa-brands fa-facebook-square text-red fs-2-5"></i></a>
                    <a href="https://www.linkedin.com/company/31381210/admin/"><i class=" fa-brands fa-linkedin text-red fs-2-5"></i></a>
                </div>
            </div>
            <div class="col-7 p-0">
                <div class=" d-flex">
                    <div class="col-6 card bg-blue p-3">
                        <div class="card-body">
                            <div class="col-2 bg-aqua text-center card-icon">
                                <i class="fa-solid fa-user-tie fs-1-5 text-purple p-2 py-3"></i>
                            </div>
                            <h3 class="fw-700 pt-4 pb-2 mb-0 text-white">Ana Gallegos</h3>
                            <div class="d-flex align-items-center text-white">
                                <i class="fa-solid fa-phone me-2 fs-07 text-white"></i>
                                <p class="mb-0 text-white">(664) 412 2989</p>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <i class="fa-solid fa-envelope me-2 fs-07 text-white"></i>
                                <p class="mb-0 text-white">ana.gallegos@indoff.com</p>
                            </div>

                        </div>
                    </div>

                    <div class="col-6 card p-3 bg-light">
                        <div class="card-body">
                            <div class="col-2 bg-aqua text-center card-icon">
                                <i class="fa-solid fa-user-tie fs-1-5 text-purple p-2 py-3"></i>
                            </div>
                            <h3 class="fw-700 pt-4 pb-2 mb-0 text-purple">Fernanda Rangel</h3>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-phone me-2 fs-07"></i>
                                <p class="mb-0">(664) 363 7198</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-envelope me-2 fs-07"></i>
                                <p class="mb-0">fernanda.rangel@indoff.com</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-4 col-12 card bg-light p-3">
                    <div class="card-body">
                        <div class="col-1 bg-aqua text-center card-icon">
                            <i class="fa-solid fa-location-dot fs-1-5 text-purple p-2 py-3"></i>
                        </div>
                        <h3 class="fw-700 pt-4 pb-2 mb-0 text-purple">Oficina</h3>

                        <p>Parque Industrial El Águila, Tijuana, México</p>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-phone me-2 fs-07"></i>
                            <p class="mb-0">(664) 625 1111</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-envelope me-2 fs-07"></i>
                            <p class="mb-0">indoffpro@indoff.com</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
include('../../footer.php');
?>