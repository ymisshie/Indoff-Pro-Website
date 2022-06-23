<?php
$title = "Añadir producto";
$page_name = "registro-productos";

require '../../roots.php';
include('../../header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');
else {
    include($root_vendor);

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $cat_nombre = $_GET['categoria'];
        $producto = new ameri\Producto;
        $categoria = new ameri\Categoria;

        $info_producto = $producto->mostrar();
        $info_categoria = $categoria->mostrarPorId($id);
    } ?>

    <section class="">
        <div class="container">

            <div class="row py-5">

                <form method="POST" action="acciones.php" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-12 d-flex">

                            <a href="index.php?id=<?php print $id; ?>" class="btn align-self-center mb-0 p-0" role="button"> <i class="go-arrow-back me-2 fs-1-5 fa-solid fa-arrow-left text-red"></i>
                            </a>
                            <h3 class="fw-700 align-self-center text-red m-0">Registro de producto en <?php print $cat_nombre; ?></h3>
                        </div>
                    </div>

                    <div class="row mt-5 text-muted justify-content-between">
                        <div class="col-3 bg-info bg-white form-card p-4 rounded">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input class="form-control" name="nombre_producto" type="text" placeholder="Nombre del producto" required>
                                        <label for="floatingInput" class="fw-600">Nombre del producto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input class="form-control" name="proveedor_producto" type="text" placeholder="Nombre del proveedor o distribuidor" required>
                                            <label for="floatingInput" class="fw-600">Nombre del proveedor</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="descripcion_producto" type="text" placeholder="Descripción detallada del producto o dimensiones." required></textarea>
                                        <label for="floatingInput" class="fw-600">Descripción del producto</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <select class="form-select" name="categoria_id_producto" required>

                                            <?php

                                            $categoria2 = new ameri\Categoria;
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
                                            <input class="form-control" name="size_producto" type="text" placeholder="55 x 30 cm">
                                            <label for="floatingInput" class="fw-600">Dimensiones del producto</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input class="form-control" name="impresion_producto" type="text" placeholder="Descripción detallada del producto o dimensiones." required></input>
                                            <label for="floatingInput" class="fw-600">Área de impresión</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input class="form-control" name="color_producto" type="text" placeholder="Colores del producto." required></input>
                                            <label for="floatingInput" class="fw-600">Colores del producto</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row mb-3">

                                    <div class="col-12 text-center">
                                        <button type="button" id="addButton" class="btn btn-sm btn-light text-darkblue">Añadir campo<span><i class="ms-2 fa-solid fa-plus"></i></span></button>
                                        <button type="button" id="removeButton" class="btn btn-sm btn-light text-darkblue">Eliminar campo <span><i class="ms-2 fa-solid fa-trash-can"></i></span></button>
                                    </div>
                                </div>

                                <div id='TextBoxesGroup'>
                                    <div id="TextBoxDiv1">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="qty-dropdown form-control" type="number" name="cantidad_producto[]" placeholder="0" min="1" required>
                                                    <label for="floatingInput" class="fw-600">Cantidad mín 1</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-floating">
                                                    <input class="qty-dropdown form-control" type="text" name="precio_producto[]" placeholder="0" required>
                                                    <label for="floatingInput" class="fw-600">Costo 1</label>
                                                </div>
                                            </div>

                                            <p class="m-0 text-muted pt-2 px-3 fs-07">Se requiere obligatoriamente llenar al menos 1 campo</p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-4 bg-info bg-white form-card p-4 rounded">

                            <div class="row pb-3">
                                <div class="col">
                                    <label for="formFile" class="form-label fw-600">Imagen del producto</label>
                                    <p class="m-0">La primera imagen será la portada del producto.</p>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12">
                                    <form class="form">
                                        <label class="form__container" id="upload-container">Escoja o arrastre imágenes
                                            <input name="imagen[]" require class="form__file" id="upload-files" type="file" accept="image/*" multiple="multiple" />
                                        </label>
                                        <div class="form__files-container" id="files-list-container"></div>
                                    </form>
                                </div>
                            </div>

                            <div class="row pb-3">
                                <div class="col-12">
                                    <input type="submit" name="accion" class="btn btn-primary w-50" value="Registrar">
                                    <a href="index.php?id=<?php print $id; ?> " class="btn btn-secondary ms-3" role="buttton">Cancelar</a>
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
                console.log('empty')
                INPUT_FILE.value = "";
            }
        }

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
                    console.log("changed")
                    files.forEach(file => {
                        const fileURL = URL.createObjectURL(file);
                        const fileName = file.name;
                        if (!file.type.match("image/")) {
                            alert(file.name + " is not an image");
                            console.log(file.type)
                        } else {
                            const uploadedFiles = {
                                name: fileName,
                                url: fileURL,
                            };

                            FILE_LIST.push(uploadedFiles);
                        }
                    });

                    console.log(FILE_LIST) //final list of uploaded files
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