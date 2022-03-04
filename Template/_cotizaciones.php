<?php

require '../../vendor/autoload.php';

$info_productos = new ameri\Cotizaciones;
$info_cotizacion = new ameri\Cotcat;

$productos = $info_productos->mostrar();
$cotizacion = $info_cotizacion->mostrar();

/*
print '<pre>';
print_r($cotizacion);
*/

?>


<section name="" class="">
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 d-flex justify-content-between">
                <h2 class="section-title py-5">Cotizaciones solicitadas pendientes</h2>
            </div>
        </div>

        <div class="row mx-auto pb-5 justify-content-center table-responsive">
            <table class="table">
                <thead>
                    <tr class="text-center color-red-bg color-white">
                        <th scope="col">#</th>
                        <th scope="col">Información de la cotización</th>
                        <th scope="col"></th>
                    </tr>
                </thead>


                <tbody>

                    <?php

                    $x = 1;
                    foreach ($cotizacion as $cot) {

                    ?>
                        <tr class="">

                            <td scope="col" class="fw-500 text-center"><?php print $x;?></td>

                            <td scope="col" class="fw-500 text-center"><span><?php print 'Cotizacion ' . $cot['fecha']; ?> </span></td>
                            <td scope="col" class="text-center">
                                                    <a href="cotizacion.php?id=<?php print $cot['id'] ?>" class="btn-secondary btn btn-sm my-md-1 text-center" role="button">Visualizar</a>
                                                </td>

                        </tr>
                    <?php

                        $x++;
                    }


                    ?>


                </tbody>
            </table>
        </div>

    </div>
</section>