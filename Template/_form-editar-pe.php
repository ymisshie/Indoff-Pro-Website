<?php
require '../../vendor/autoload.php';


if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $id = $_GET['id'];
    $producto = new ameri\Producto_Evento;
    $categoria = new ameri\Evento;


    $resultado = $producto->mostrarPorId($id);
    $info_categoria = $categoria->mostrar();


    if (!$resultado)
        header('Location: ../productos-eventos/index.php');

    /*
 print '<pre>';
 print_r($resultado);
 die;
 */
} else {
    header('Location:  ../productos-eventos/index.php');
}
?>


<section class="color-grey-bg">
    <div class="container pb-5" id="form-registro-p">
        <div class="row justify-content-center">
            <h3 class="pt-5 fw-700 pb-3 text-center">Añadir producto a <?php print $resultado['nombre']; ?></h3>
        </div>

        <div class="row">

            <form method="POST" action="../acciones_pe.php" enctype="multipart/form-data" class="d-lg-flex justify-content-lg-evenly ws formulario py-4 mx-auto text-center">

                <div class="col-lg-4 col-md-9 col-11 mx-auto">
                    <input type="hidden" name="id" value="<?php print $resultado['id'] ?>">

                    
                    <div class="col-lg-10 col-md-9 col-12 mx-auto d-flex py-2 justify-content-evenly">
                        <div class="ws col-md-2 col-2 rounded-circle color-orange-bg align-self-center py-3 ">
                            <span><i class="far fa-question-circle text-white fs-1-5"></i></span>
                        </div>
                        <h5 class="fw-700 py-4 mb-0">Información del producto</h5>
                    </div>

                    <div class="col-6 form-group text-start py-md-2">
                        <h6 class="col-form-label fw-600">Orden</h6>
                        <select name="orden_productos" class=" orden_productos form-control">
                                <option value="1" <?php if ($resultado['orden'] == 1) print "selected" ?>> 1 </option>
                                <option value="2" <?php if ($resultado['orden'] == 2) print "selected" ?>>2</option>
                                <option value="3" <?php if ($resultado['orden'] == 3) print "selected" ?>>3</option>
                                <option value="4" <?php if ($resultado['orden'] == 4) print "selected" ?>> 4 </option>
                                <option value="5" <?php if ($resultado['orden'] == 5) print "selected" ?>> 5 </option>
                                <option value="6" <?php if ($resultado['orden'] == 6) print "selected" ?>> 6 </option>
                                <option value="7" <?php if ($resultado['orden'] > 6) print "selected" ?>> No mostrar </option>
                        </select>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Nombre del producto <span class="color-red">*</span></h6>
                        <input class="form-control" name="nombre_producto" value="<?php print $resultado['nombre']; ?>" type="text" placeholder="Nombre del producto" required>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Nombre del proveedor <span class="color-red">*</span></h6>
                        <input class="form-control" name="proveedor_producto" type="text" value="<?php print $resultado['proveedor']; ?>" placeholder="Nombre del proveedor o distribuidor" required>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Descripción del producto <span class="color-red">*</span></h6>
                        <textarea class="form-control textarea" name="descripcion_producto" type="text" placeholder="Descripción detallada del producto o colores de impresión." required><?php print $resultado['descripcion']; ?></textarea>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Imagen <span class="color-red">*</span></h6>
                        <input name="imagen" type="file">
                        <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">

                        <small class="d-flex form-text text-disbabled m-0 py-2">La imagen anterior está guardada.</small>
                    </div>

                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Categoría del producto <span class="color-red">*</span></h6>
                        <select class="form-control" name="categoria_id_producto" required>
                            <option value="">Seleccione una categoría</option>
                            <?php
                            require '../../vendor/autoload.php';
                            $categoria = new ameri\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad = count($info_categoria);
                            for ($x = 0; $x < $cantidad; $x++) {
                                $item = $info_categoria[$x];
                            ?>
                                <option value="<?php print $item['id'] ?>" <?php print $resultado['categoria_id'] == $item['id'] ? 'selected' : '' ?>><?php print $item['nombre'] ?></option>
                            <?php

                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group text-start">

                        <div class="d-flex py-2">

                            <div class="form-group text-start py-2">
                                <h6 class="col-form-label fw-600">Dimensiones</h6>
                                <input class="form-control" name="size_producto" type="text" value="<?php print $resultado['size']; ?>" placeholder="55 x 30 cm">
                            </div>

                            <div class="form-group text-start mx-4 py-2">
                                <h6 class="col-form-label fw-600">Peso</h6>
                                <input class="form-control" name="peso_producto" type="text" value="<?php print $resultado['peso'] ?>" placeholder="0.5 kg">
                            </div>


                        </div>

                        <small class="d-flex form-text text-disbabled m-0">Si el producto requiere de los siguientes elementos</small>

                    </div>

                    <!--colores-->
                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Colores<span class="color-red">*</span></h6>

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

                        <textarea class="form-control textarea" name="color_producto" type="text" placeholder="Escriba los colores del producto separados por comas sin espacios."><?php print $resultado['color'] ?></textarea>


                        <div class="row p-4 py-4 px-3">
                            <?php

                            for ($z = 0; $z < 141; $z++) {
                            ?>

                                <div class="col-1 p-2" style="background-color: <?php print $array[$z] ?>;" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php print $array[$z] ?>">
                                </div>

                            <?php

                            }

                            ?>
                        </div>

                    </div>

                </div>

                <div class="col-md-9 col-11 mx-auto col-lg-6" id="campos">

                    <div class="col-lg-7 col-md-9 col-12 mx-auto d-flex py-2 justify-content-evenly">
                        <div class="ws col-md-2 col-2 rounded-circle color-purple-bg align-self-center py-3">
                            <span><i class="fas fa-boxes text-white fs-1-5"></i></span>
                        </div>
                        <h5 class="fw-700 py-4 mb-0">Variaciones del producto</h5>
                    </div>

                    <!--
                    <div class="form-group text-start py-2">
                        <h6 class="col-form-label fw-600">Opciones del producto</h6>
                        <textarea class="form-control textarea" name="opciones_producto" type="text" placeholder="(Opcional) Si el producto tiene variaciones. Ej: tallas de camisetas, S, M, L, XL."><?php print $resultado['opciones'] ?> </textarea>
                    </div>
                        -->
                    <input class="" name="opciones_producto" type="hidden" value=""></input>


                    <?php
                    $count = 7;
                    $countdivs = 1;
                    ?>
                    <div class="form-group text-start py-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="col-form-label fw-600">Cantidades mínimas y costos</h6>

                            <!--<a href="nuevo_campo" class="btn btn-sm align-self-center btn-link2 color-red ns" role="button">Agregar campo</a>-->
                        </div>

                        <?php
                        for ($x = 1; $x < 8; $x++) {
                        ?>

                            <div class="d-flex py-2">

                                <h6 class=" col-form-label col-md-3 col-lg-3 col-3  fw-600 color-grey2">Cantidad mín <?php
                                                                                                                        print $x;
                                                                                                                        if ($x == 1) {
                                                                                                                            print ' <span class="color-red ms-md-1">  *</span>'
                                                                                                                        ?>
                                    <?php
                                                                                                                        }
                                    ?></h6>
                                <div class="form-group col-md-3 mx-3">

                                    <?php

                                    $cantidad = $resultado['cantidad'];
                                    $costo = $resultado['precio'];
                                    $separada_cantidad = '';
                                    $separada_costo = '';
                                    $separador = ",";
                                    $separada_cantidad = explode($separador, $cantidad);
                                    $separada_costo = explode($separador, $costo);

                                    $count_cantidad = count($separada_cantidad);
                                    $count_costo = count($separada_costo);

                                    ?>

                                    <input class=" col-12 qty-dropdown" type="number" name="cantidad_producto[]" value="<?php print $separada_cantidad[$x - 1] ?>" placeholder="0" <?php if ($x == 1) {
                                                                                                                                                                                        print 'required';
                                                                                                                                                                                    } ?> onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1">
                                    <small class="d-flex form-text text-disbabled">Cantidad mín <?php print $x ?></small>
                                </div>
                                <h6 class="col-form-label fw-600 col-md-2 col-3 color-grey2 ms-md-4">Costo <?php
                                                                                                            print $x;
                                                                                                            if ($x == 1) {
                                                                                                                print ' <span class="color-red ms-1">  *</span>'
                                                                                                            ?>
                                    <?php
                                                                                                            }
                                    ?></h6>
                                <div class="form-group col-md-3 col-3">
                                    <input class=" col-12 qty-dropdown" type="number" name="precio_producto[]" placeholder="0" value="<?php print $separada_costo[$x - 1] ?>" <?php if ($x == 1) {
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

                    <input type="submit" name="accion" href="../acciones_pe.php?id=<?php print $resultado['id'] ?>" class="btn btn-secondary my-4" value="Actualizar">
                    <a href="index.php?id=<?php print $resultado['5'] ?>" class="btn btn-primary my-4 mx-3" role="buttton">Cancelar</a>

                </div>

            </form>

        </div>
    </div>
</section>