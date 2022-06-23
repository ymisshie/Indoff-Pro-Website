<?php
$title = "Nosotros";
$pagina = "nosotros";

include('../roots.php');

include('../../header.php');

require $root_vendor;
?>

<section>
    <div class="container">
        <div class="row justify-content-cesnter p-5">
            <div class="col-7 p-0">
                <div class="col-12 card p-3 bg-blue">
                    <div class="card-body">
                        <div class="col-1 bg-aqua text-center card-icon">
                            <i class="fa-solid fa-user-tie fs-1-5 text-purple p-2 py-3"></i>
                        </div>
                        <h3 class="fw-700 pt-4 pb-2 mb-0 text-white">Misión</h3>
                        <p class="mb-0 text-white">Contando con un portafolio competitivo de amplia variedad de productos, Indoff Pro busca brindar soluciones promocionales sólidas e idóneas a nuestros clientes con el fin de ayudarles a comunicar su marca de forma efectiva mediante el uso de productos estratégicos que le agreguen valor a su empresa.<br>
                        </p>
                    </div>
                </div>

                <div class="mt-4 col-12 card bg-light p-3">
                    <div class="card-body">
                        <div class="col-1 bg-aqua text-center card-icon">
                            <i class="fa-solid fa-location-dot fs-1-5 text-purple p-2 py-3"></i>
                        </div>
                        <h3 class="fw-700 pt-4 pb-2 mb-0 text-purple">Visión</h3>

                        <p>Buscamos apoyar a nuestros clientes convirtiéndonos en una extensión de su equipo creativo, impartiendo nuestro propio conocimiento y experiencia para apoyar a las empresas a aumentar su retención de personal utilizando programas de incentivos con productos innovadores de calidad.</p>

                    </div>
                </div>

            </div>
            <div class="col-5 px-5 align-self-center">
                <h1 class="fw-700 text-red">¿Quiénes somos?</h1>

                <p class="py-4"> A través del fortalecimiento de las cualidades de confianza y lealtad, nuestro objetivo es consolidar fielmente la integración entre la empresa, su público meta y sus colaboradores bajo un enfoque humano que permita obtener un crecimiento empresarial y social que proporcione una mejor calidad de trabajo.</p>

                <a href="<?php print $root_contacto; ?>" role="button" class="btn btn-primary w-100">Contáctanos</a>
            </div>

        </div>
    </div>
</section>

<?php
include('../../footer.php')
?>