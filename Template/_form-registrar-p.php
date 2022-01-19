<section>
    <div class="container-fluid color-grey-bg pb-lg-5" id="form-registro-p">
        <div class="row justify-content-center">
            <h3 class="pt-lg-5 fw-700 pb-lg-3 text-center">Añadir producto</h3>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-11 formulario text-center ws py-lg-4">

                <form method="POST" action="acciones_p.php" enctype="multipart/form-data" class="d-flex justify-content-evenly">

                    <div class="col-lg-4">

                        <div class="col-lg-10 mx-auto d-flex py-lg-2 justify-content-evenly">
                            <div class="ws col-lg-2 rounded-circle color-orange-bg align-self-center py-lg-3">
                                <span><i class="far fa-question-circle text-white fs-1-5"></i></span>
                            </div>
                            <h5 class="fw-700 py-lg-4 mb-0">Información del producto</h5>
                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Nombre del producto</h6>
                            <input class="form-control" name="nombre_producto" type="text" placeholder="Nombre del producto" required>
                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Nombre del proveedor</h6>
                            <input class="form-control" name="proveedor_producto" type="text" placeholder="Nombre del proveedor o distribuidor" required>
                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Descripción del producto</h6>
                            <textarea class="form-control textarea" name="descripcion_producto" type="text" placeholder="Descripción detallada del producto o colores de impresión." required></textarea>
                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Imagen</h6>
                            <input name="imagen" type="file" required">
                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Categoria del producto</h6>
                            <select class="form-control" name="categoria_id_producto" required>
                                <option value="">Seleccione una categoria</option>
                                <?php
                                require 'vendor/autoload.php';
                                $categoria = new ameri\Categoria;
                                $info_categoria = $categoria->mostrar();
                                $cantidad = count($info_categoria);
                                for ($x = 0; $x < $cantidad; $x++) {
                                    $item = $info_categoria[$x];
                                ?>
                                    <option value="<?php print $item['id'] ?>"><?php print $item['nombre'] ?></option>
                                <?php

                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group text-start">

                            <div class="d-flex pt-lg-2 pb-lg-2">

                                <div class="form-group text-start py-lg-2">
                                    <h6 class="col-form-label fw-600">Dimensiones</h6>
                                    <input class="form-control" name="size_producto" type="text" placeholder="55 x 30 cm" required>
                                </div>

                                <div class="form-group text-start mx-lg-4 py-lg-2">
                                    <h6 class="col-form-label fw-600">Peso</h6>
                                    <input class="form-control" name="peso_producto" type="text" placeholder="0.5 kg" required>
                                </div>


                            </div>

                        </div>

                        <div class="form-group text-start py-lg-2">
                            <h6 class="col-form-label fw-600">Colores</h6>

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

                            <select name="color_producto" multiple class="color-select col-12">

                                <?php

                                for ($y = 0; $y < 141; $y++) {
                                ?>
                                    <option value="<?php print $array[$y] ?>" style="background-color:<?php print $array[$y] ?>; " class="px-lg-3 fw-500 text-white text-center"><?php print $array[$y] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                        </div>

                    </div>


                    <div class="col-lg-7 border-start px-lg-5">

                        <div class="col-lg-6 mx-auto d-flex py-lg-2 justify-content-evenly">
                            <div class="ws col-lg-2 rounded-circle color-purple-bg align-self-center py-lg-3">
                                <span><i class="fas fa-boxes text-white fs-1-5"></i></span>
                            </div>
                            <h5 class="fw-700 py-lg-4 mb-0">Opciones del producto</h5>
                        </div>

                        <?php


                        $count = 7;

                        for ($x = 1; $x < 8; $x++) {
                        ?>

                            <div class="form-group text-start">

                                <h6 class="col-form-label fw-600">Opción <?php print $x ?></h6>

                                <div class="d-flex pt-lg-2 pb-lg-2">

                                    <div class="form-group col-lg-5">
                                        <input class="form-control" name="op<?php print $x ?>_producto" type="text" placeholder="Nombre de la opción" <?php if ($x == 1) {
                                                                                                                                                            print 'required';
                                                                                                                                                        } ?>>
                                        <small class="d-flex form-text text-disbabled">Si la opción tiene nombre</small>
                                    </div>

                                    <div class="form-group col-lg-3 mx-lg-3">
                                        <input class=" col-12 qty-dropdown" type="number" name="q<?php print $x ?>_producto" value="0" <?php if ($x == 1) {
                                                                                                                                            print 'required';
                                                                                                                                        } ?>>
                                        <small class="d-flex form-text text-disbabled">Cantidad mínima <?php print $x ?></small>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <input class=" col-12 qty-dropdown" type="number" name="p<?php print $x ?>_producto" value="0" <?php if ($x == 1) {
                                                                                                                                            print 'required';
                                                                                                                                        } ?>>
                                        <small class="d-flex form-text text-disbabled">Costo <?php print $x ?></small>
                                    </div>
                                </div>

                            </div>
                        <?php
                        }
                        ?>

                        <input type="submit" name="accion" class="btn btn-secondary my-lg-4" value="Registrar">
                        <a href="productos-dashboad.php" class="btn btn-primary my-lg-4 mx-lg-4" role="buttton">Cancelar</a>

                </form>

            </div>
        </div>
    </div>
</section>