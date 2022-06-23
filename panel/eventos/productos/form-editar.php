<?php
$title = "Editar producto evento";
$page_name = "editar-productos-eventos";

require '../../roots.php';
include('../../header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');
else {
    include($root_vendor);

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $producto = new ameri\Producto_Evento;

        $info_producto = $producto->mostrarPorId($id);
    } ?>

    <section>
        <div class="container">

            <div class="row py-5">

                <form method="POST" action="acciones.php" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?php print $info_producto['id'] ?>">
                    <input type="hidden" name="orden_producto" value="<?php print $info_producto['orden'] ?>">

                    <div class="row">
                        <div class="col-12 d-flex">

                            <a href="index.php?id=<?php print $info_producto['id']; ?>" class="btn align-self-center mb-0 p-0" role="button"> <i class="go-arrow-back me-2 fs-1-5 fa-solid fa-arrow-left text-red"></i>
                            </a>
                            <h3 class="fw-700 align-self-center text-red m-0">Editar <?php print $info_producto['nombre']; ?></h3>
                        </div>
                    </div>

                    <div class="row mt-5 text-muted justify-content-between">
                        <div class="col-3 bg-info bg-white form-card p-4 rounded">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input class="form-control" value="<?php print $info_producto['nombre']; ?>" name="nombre_producto" type="text" placeholder="Nombre del producto" required>
                                        <label for="floatingInput" class="fw-600">Nombre del producto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input class="form-control" value="<?php print $info_producto['proveedor']; ?>" name="proveedor_producto" type="text" placeholder="Nombre del proveedor o distribuidor" required>
                                            <label for="floatingInput" class="fw-600">Nombre del proveedor</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="descripcion_producto" type="text" placeholder="Descripción detallada del producto o dimensiones." required><?php print $info_producto['descripcion']; ?></textarea>
                                        <label for="floatingInput" class="fw-600">Descripción del producto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" name="categoria_id_producto" required>

                                            <?php

                                            $categoria = new ameri\Evento;
                                            $info_categorias = $categoria->mostrar();
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
                                            } ?>

                                            <option value="">Seleccione una categoria</option>

                                        </select>
                                        <label for="floatingSelect" class="fw-600">Categoria del producto</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-4 bg-info bg-white form-card p-4 rounded">

                            <div class="mx-auto" id="campos">

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input class="form-control" value="<?php print $info_producto['size']; ?>" name="size_producto" type="text" placeholder="55 x 30 cm">
                                            <label for="floatingInput" class="fw-600">Dimensiones del producto</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input class="form-control" value="<?php print $info_producto['impresion']; ?>" name="impresion_producto" type="text" placeholder="Descripción detallada del producto o dimensiones." required></input>
                                            <label for="floatingInput" class="fw-600">Área de impresión</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input class="form-control" value="<?php print $info_producto['color']; ?>" name="color_producto" type="text" placeholder="Colores del producto." required></input>
                                            <label for="floatingInput" class="fw-600">Colores del producto</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row mb-3">
                                    <div class="col-12">
                                        <h6 class="col-form-label fw-600">Cantidades mínimas y costos</h6>
                                    </div>
                                    <div class="col-12 text-center">

                                        <?php
                                        $cantidad = $info_producto['cantidad'];
                                        $costo = $info_producto['precio'];
                                        $separada_cantidad = '';
                                        $separada_costo = '';
                                        $separador = ",";
                                        $separada_cantidad = explode($separador, $cantidad);
                                        $separada_costo = explode($separador, $costo);

                                        $count_cantidad = count($separada_cantidad);
                                        $count_costo = count($separada_costo);
                                        $w = 0;
                                        ?>

                                        <button type="button" id="addButton" class="btn text-darkblue btn-sm btn-light me-3">Añadir campo<span><i class="ms-2 fa-solid fa-plus"></i></span></button>
                                        <button type="button" id="removeButton" class="btn text-darkblue btn-sm btn-light">Eliminar campo <span><i class="ms-2 fa-solid fa-trash-can"></i></span></button>
                                    </div>
                                </div>

                                <div id='TextBoxesGroup'>
                                    <?php

                                    for ($x = 1; $x < $count_cantidad + 1; $x++) {
                                    ?>
                                        <div id="TextBoxDiv<?php print $x; ?>">
                                            <div class="row mb-3">

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input class="qty-dropdown form-control" value="<?php print $separada_cantidad[$w]; ?>" type="number" name="cantidad_producto[]" placeholder="0" min="1" required>
                                                        <label for="floatingInput" class="fw-600">Cantidad mín <?php print $x; ?></label>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-floating">
                                                        <input class="qty-dropdown form-control" value="<?php print $separada_costo[$w]; ?>" type="text" name="precio_producto[]" placeholder="0" required>
                                                        <label for="floatingInput" class="fw-600">Costo <?php print $x; ?></label>
                                                    </div>
                                                </div>
                                                <?php
                                                $w++;

                                                if ($x == 1) {
                                                ?>

                                                    <p class="m-0 text-muted pt-2 px-3 fs-07">Se requiere obligatoriamente llenar al menos 1 campo</p>
                                                <?php
                                                }
                                                ?>
                                            </div>

                                        </div>

                                    <?php

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 bg-info bg-white form-card p-4 rounded">

                            <div class="row pb-3">
                                <label for="formFile" class="form-label fw-600">Imágenes actuales</label>
                                <p class="m-0">La primera imagen será la portada del producto.</p>

                                <input type="hidden" name="imagen_temp" id="imagen_temp" value="<?php print $info_producto['imagen'] ?>">

                            </div>

                            <div class="row pb-3">

                                <div class="gallery d-flex flex-wrap justify-content-evenly">
                                    <?php
                                    $imagenes = $info_producto['imagen'];
                                    $separada_imagenes = '';
                                    $separador = ",";
                                    $separada_imagenes = explode($separador, $imagenes);
                                    $count_imagenes = count($separada_imagenes);

                                    for ($i = 0; $i < $count_imagenes; $i++) {

                                        $image = '../../../upload/Productos-Eventos/' . $separada_imagenes[$i];

                                    ?>
                                        <div class="container-img-product" id="container-img">
                                            <img src="<?php if (file_exists($image)) {
                                                            print $image;
                                                        } ?>
                                            " class="img-thumbnail-product mb-2">
                                            <a class="close fa-solid fa-times fs-1" id="<?php print $separada_imagenes[$i]; ?>" onclick="remove(this.id)"></a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col">
                                    <label for="formFile" class="form-label fw-600">Subir nuevas imágenes</label>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col">
                                    <form class="form">
                                        <label class="form__container" id="upload-container">Escoja o arrastre imagenes
                                            <input class="form__file" id="upload-files" name="imagen[]" type="file" accept="image/*" multiple="multiple" />
                                        </label>
                                        <div class="form__files-container" id="files-list-container"></div>
                                    </form>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col">
                                    <input type="submit" name="accion" class="btn btn-primary w-50" value="Actualizar">
                                    <a href="index.php?id=<?php print $info_producto['evento_id']; ?> " class="btn btn-secondary ms-3" role="buttton">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {

                    var filesAmount = input.files.length;
                    $("div.gallery").html("");

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = function(event) {

                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'form-img-thumbnail-category').appendTo(placeToInsertImagePreview);
                            $($.parseHTML('<a>')).attr('class', 'close fa-solid fa-times fs-1-5').attr('onclick', 'remove()').appendTo(placeToInsertImagePreview);
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

        $(document).ready(function() {

            var counter = 2;

            $("#addButton").click(function() {

                if (counter > 10) {
                    alert("Solo se permiten 10 campos como máximo");
                    return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                newTextBoxDiv.after().html('<div class="row mb-3"> <div class="col"><div class="form-floating"><input class="qty-dropdown form-control" type="number" name="cantidad_producto[]" placeholder="0" min="1" required><label for="floatingInput" class="fw-600">Cantidad mín ' + counter + '</label> </div></div> <div class="col">  <div class="form-floating"><input class="qty-dropdown form-control" type="text" name="precio_producto[]" placeholder="0" required><label for="floatingInput" class="fw-600">Costo ' + counter + ' </label></div></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroup");

                counter++;
            });

            $("#removeButton").click(function() {
                if (counter == 2) {
                    alert("Ya no hay más campos que eliminar");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });
        });

        function remove(clicked_id) {

            console.log(clicked_id);

            var str = document.getElementById('imagen_temp').value;
            //console.log(str);

            var str_array = str.split(',');

            for (var i = 0; i < str_array.length; i++) {
                str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
                if (str_array[i] == clicked_id) {
                    id = i;
                }
            }

            //console.log(id);
            //console.log(str_array);

            var removed = str_array.splice(id, 1);
            //console.log(removed);
            console.log(str_array);

            $('#container-img').remove();

            document.getElementById('imagen_temp').value = str_array;

        }

        //Subir imagenes nuevas
        const INPUT_FILE = document.querySelector('#upload-files');
        const INPUT_CONTAINER = document.querySelector('#upload-container');
        const FILES_LIST_CONTAINER = document.querySelector('#files-list-container');
        const FILE_LIST = [];
        let UPLOADED_FILES = [];

        const multipleEvents = (element, eventNames, listener) => {
            const events = eventNames.split(' ');

            events.forEach(event => {
                element.addEventListener(event, listener, false);
            });
        };

        const previewImages = () => {
            FILES_LIST_CONTAINER.innerHTML = '';
            if (FILE_LIST.length > 0) {
                FILE_LIST.forEach((addedFile, index) => {
                    const content = `
        <div class="form__image-container js-remove-image" data-index="${index}">
          <img class="form__image" src="${addedFile.url}" alt="${addedFile.name}">
        </div>
      `;

                    FILES_LIST_CONTAINER.insertAdjacentHTML('beforeEnd', content);
                });
            } else {
                console.log('empty');
                INPUT_FILE.value = "";
            }
        };

        const fileUpload = () => {
            if (FILES_LIST_CONTAINER) {
                multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
                    INPUT_CONTAINER.classList.add('active');
                });

                multipleEvents(INPUT_FILE, 'dragleave dragend drop change blur', () => {
                    INPUT_CONTAINER.classList.remove('active');
                });

                INPUT_FILE.addEventListener('change', () => {
                    const files = [...INPUT_FILE.files];
                    console.log("changed");
                    files.forEach(file => {
                        const fileURL = URL.createObjectURL(file);
                        const fileName = file.name;
                        if (!file.type.match("image/")) {
                            alert(file.name + " is not an image");
                            console.log(file.type);
                        } else {
                            const uploadedFiles = {
                                name: fileName,
                                url: fileURL
                            };


                            FILE_LIST.push(uploadedFiles);
                        }
                    });

                    console.log(FILE_LIST); //final list of uploaded files
                    previewImages();
                    UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
                    removeFile();
                });
            }
        };

        const removeFile = () => {
            UPLOADED_FILES = document.querySelectorAll(".js-remove-image");

            if (UPLOADED_FILES) {
                UPLOADED_FILES.forEach(image => {
                    image.addEventListener('click', function() {
                        const fileIndex = this.getAttribute('data-index');

                        FILE_LIST.splice(fileIndex, 1);
                        previewImages();
                        removeFile();
                    });
                });
            } else {
                [...INPUT_FILE.files] = [];
            }
        };

        fileUpload();
        removeFile();
    </script>

<?php
}
include('../../footer-admin.php')
?>