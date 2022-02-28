<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];


    $producto = new ameri\Producto_Evento;
    $categoria = new ameri\Evento;

    $info_producto = $producto->mostrar();
    $info_categoria = $categoria->mostrarPorId($id);

    /*
 print '<pre>';
 print_r ($info_categoria);

die;
*/

    /*
 print '<pre>';
 print_r($info_producto);
*/
}

?>

<section class="color-grey-bg">
    <div class="container pb-md-5" id="form-registro-p">
        <div class="row justify-content-center">
            <h3 class="pt-md-5 fw-700 pb-lg-3 pb-md-4 text-center">Añadir producto a <?php print $info_categoria['nombre']; ?></h3>
        </div>

        <div class="row">

            <form method="POST" action="../acciones-pe.php" enctype="multipart/form-data" class="d-lg-flex justify-content-lg-evenly ws formulario py-md-4 text-center">

                <div class="col-lg-4 col-md-9 mx-md-auto">
                    <div class="col-lg-10 col-md-9 mx-auto d-flex py-md-2 justify-content-evenly">
                        <div class="ws col-lg-2 col-md-2 rounded-circle color-orange-bg align-self-center py-md-3 ">
                            <span><i class="far fa-question-circle text-white fs-1-5"></i></span>
                        </div>
                        <h5 class="fw-700 py-md-4 mb-0">Información del producto</h5>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Nombre del producto <span class="color-red">*</span></h6>
                        <input class="form-control" name="nombre_producto_evento" type="text" placeholder="Nombre del producto" required>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Nombre del proveedor <span class="color-red">*</span></h6>
                        <input class="form-control" name="proveedor_producto_evento" type="text" placeholder="Nombre del proveedor o distribuidor" required>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Descripción del producto <span class="color-red">*</span></h6>
                        <textarea class="form-control textarea" name="descripcion_producto_evento" type="text" placeholder="Descripción detallada del producto o colores de impresión." required></textarea>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Imagen <span class="color-red">*</span></h6>
                        <input name="imagen" type="file" required>
                    </div>

                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Categoria del producto <span class="color-red">*</span></h6>
                        <select class="form-control" name="evento_id_producto" required>

                            <?php

                            $categoria2 = new ameri\Evento;
                            $info_categorias = $categoria2->mostrar();
                            $cantidad = count($info_categorias);


                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_categorias[$x];

                                if ($item['id'] == $info_categoria['id']) {
                            ?>
                                    <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>

                                <?php
                                }
                            }

                            for ($w = 0; $w < $cantidad; $w++) {
                                $item = $info_categorias[$w];

                                if ($item['id'] != $info_categoria['id']) {
                                ?>

                                    <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                            <?php

                                }
                            }

                            ?>

                            <option value="">Seleccione una categoria</option>

                        </select>
                    </div>

                    <div class="form-group text-start">

                        <div class="d-flex pt-md-2 pb-md-2">

                            <div class="form-group text-start py-md-2">
                                <h6 class="col-form-label fw-600">Dimensiones</h6>
                                <input class="form-control" name="size_producto_evento" type="text" placeholder="55 x 30 cm">
                            </div>

                            <div class="form-group text-start  mx-md-4 py-md-2">
                                <h6 class="col-form-label fw-600">Peso</h6>
                                <input class="form-control" name="peso_producto_evento" type="text" placeholder="0.5 kg">
                            </div>


                        </div>

                        <small class="d-flex form-text text-disbabled m-0">Si el producto requiere de los siguientes elementos</small>

                    </div>

                    <!--colores-->
                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Colores <span class="color-red">*</span></h6>

                        <?php
                        $array = array(
                            "Black",
                            "Navy",
                            "Darkblue",
                            "MediumBlue",
                            "Blue",
                            "DarkGreen",
                            "Green",
                            "Teal",
                            "DarkCyan",
                            "DeepSkyBlue",
                            "DarkTurquoise",
                            "MediumSpringGreen",
                            "Lime",
                            "SpringGreen",
                            "Aqua",
                            "Cyan",
                            "MidnightBlue",
                            "DodgerBlue",
                            "LightSeaGreen",
                            "ForestGreen",
                            "SeaGreen",
                            "DarkSlateGray",
                            "LimeGreen",
                            "MediumSeaGreen",
                            "Turquoise",
                            "RoyalBlue",
                            "SteelBlue",
                            "DarkSlateBlue",
                            "MediumTurquoise",
                            "Indigo",
                            "DarkOliveGreen",
                            "CadetBlue",
                            "CornflowerBlue",
                            "RebeccaPurple",
                            "MediumAquaMarine",
                            "DimGray",
                            "SlateBlue",
                            "OliveDrab",
                            "SlateGray",
                            "LightSlateGray",
                            "MediumSlateBlue",
                            "LawnGreen",
                            "Chartreuse",
                            "Aquamarine",
                            "Maroon",
                            "Purple",
                            "Olive",
                            "Gray",
                            "SkyBlue",
                            "LightSkyBlue",
                            "BlueViolet",
                            "DarkRed",
                            "DarkMagenta",
                            "SaddleBrown",
                            "DarkSeaGreen",
                            "LightGreen",
                            "MediumPurple",
                            "DarkViolet",
                            "PaleGreen",
                            "DarkOrchid",
                            "YellowGreen",
                            "Sienna",
                            "Brown",
                            "DarkGray",
                            "LightBlue",
                            "GreenYellow",
                            "PaleTurquoise",
                            "LightSteelBlue",
                            "PowderBlue",
                            "FireBrick",
                            "DarkGoldenRod",
                            "MediumOrchid",
                            "RosyBrown",
                            "DarkKhaki",
                            "Silver",
                            "MediumVioletRed",
                            "IndianRed",
                            "Peru",
                            "Chocolate",
                            "Tan",
                            "LightGray",
                            "Thistle",
                            "Orchid",
                            "GoldenRod",
                            "PaleVioletRed",
                            "Crimson",
                            "Gainsboro",
                            "Plum",
                            "BurlyWood",
                            "LightCyan",
                            "Lavender",
                            "DarkSalmon",
                            "Violet",
                            "PaleGoldenRod",
                            "LightCoral",
                            "Khaki",
                            "AliceBlue",
                            "HoneyDew",
                            "Azure",
                            "SandyBrown",
                            "Wheat",
                            "Beige",
                            "WhiteSmoke",
                            "MintCream",
                            "GhostWhite",
                            "Salmon",
                            "AntiqueWhite",
                            "Linen",
                            "LightGoldenRodYellow",
                            "OldLace",
                            "Red",
                            "Fuchsia",
                            "Magenta",
                            "DeepPink",
                            "OrangeRed",
                            "Tomato",
                            "HotPink",
                            "Coral",
                            "DarkOrange",
                            "LightSalmon",
                            "Orange",
                            "LightPink",
                            "Pink",
                            "Gold",
                            "PeachPuff",
                            "NavajoWhite",
                            "Moccasin",
                            "Bisque",
                            "MistyRose",
                            "BlanchedAlmond",
                            "PapayaWhip",
                            "LavenderBlush",
                            "SeaShell",
                            "Cornsilk",
                            "LemonChiffon",
                            "FloralWhite",
                            "Snow",
                            "Yellow",
                            "LightYellow",
                            "Ivory",
                            "White",
                        );

                        //print_r($array);
                        ?>

                        <textarea class="form-control textarea" name="color_producto" type="text" placeholder="Escriba los colores del producto separados por comas sin espacios."></textarea>


                        <div class="row p-lg-4 py-md-4 px-md-3">
                            <?php

                            for ($z = 0; $z < 141; $z++) {
                            ?>

                                <div class="col-lg-1 col-md-1 p-md-2" style="background-color: <?php print $array[$z] ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $array[$z] ?>">
                                </div>

                            <?php

                            }

                            ?>
                        </div>

                    </div>

                </div>

                <div class="col-md-9 mx-md-auto col-lg-6" id="campos">

                    <div class="col-lg-7 col-md-9 mx-auto d-flex py-md-2 justify-content-evenly">
                        <div class="ws col-lg-2 col-md-2 rounded-circle color-purple-bg align-self-center py-md-3">
                            <span><i class="fas fa-boxes text-white fs-1-5"></i></span>
                        </div>
                        <h5 class="fw-700 py-md-4 mb-0">Variaciones del producto</h5>
                    </div>

                    <!--
                    <div class="form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Opciones del producto</h6>
                        <textarea class="form-control textarea" name="opciones_producto_evento" type="text" placeholder="(Opcional) Si el producto tiene variaciones. Ej: tallas de camisetas, S, M, L, XL."></textarea>
                    </div>
                        -->

                        <input class="" name="opciones_producto" type="hidden" value=""></input>

                    <?php
                    $count = 7;
                    $countdivs = 1;
                    ?>
                    <div class="form-group text-start py-md-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="col-form-label fw-600">Cantidades mínimas y costos</h6>

                            <a href="nuevo_campo" class="btn btn-sm align-self-center btn-link2 color-red ns" role="button">Agregar campo</a>
                        </div>

                        <?php
                        for ($x = 1; $x < 8; $x++) {
                        ?>

                            <div class="d-flex pt-md-2 pb-md-2">

                                <h6 class=" col-form-label col-md-3 col-lg-3  fw-600 color-grey2">Cantidad mín <?php
                                                                                                                print $x;
                                                                                                                if ($x == 1) {
                                                                                                                    print ' <span class="color-red ms-md-1">  *</span>'
                                                                                                                ?>
                                    <?php
                                                                                                                }
                                    ?></h6>
                                <div class="form-group col-md-3 mx-lg-3">
                                    <input class=" col-md-12 qty-dropdown" type="number" name="cantidad_producto[]" placeholder="0" <?php if ($x == 1) {
                                                                                                                                        print 'required';
                                                                                                                                    } ?> onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1">
                                    <small class="d-flex form-text text-disbabled">Cantidad mín <?php print $x ?></small>
                                </div>
                                <h6 class="col-form-label fw-600 col-md-2 color-grey2 ms-md-4">Costo <?php
                                                                                                        print $x;
                                                                                                        if ($x == 1) {
                                                                                                            print ' <span class="color-red ms-md-1">  *</span>'
                                                                                                        ?>
                                    <?php
                                                                                                        }
                                    ?></h6>
                                <div class="form-group col-md-3">
                                    <input class=" col-md-12 qty-dropdown" type="number" name="precio_producto[]" placeholder="0" value="" <?php if ($x == 1) {
                                                                                                                                                print 'required';
                                                                                                                                            } ?> onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1">
                                    <small class="d-flex form-text text-disbabled">Costo <?php
                                                                                            print $x;

                                                                                            ?>
                                    </small>
                                </div>


                            </div>

                        <?php
                        }
                        ?>

                    </div>

                    <input type="submit" name="accion" class="btn btn-secondary my-md-4" value="Registrar">
                    <a href="index.php?id=<?php print $info_categoria['id'] ?>" class="btn btn-primary my-md-4 mx-md-4" role="buttton">Cancelar</a>

                </div>

            </form>

        </div>
    </div>
</section>