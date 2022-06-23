<?php
$title = "Editar kits";
$page_name = "editar-kits";

require '../roots.php';
include('../header-admin.php');

if (!isset($_SESSION['admin_info']) or empty($_SESSION['admin_info']))
    header('Location: ../index.php');

else {
    include($root_vendor);

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {

        $id = $_GET['id'];

        $categoria = new ameri\Kits;
        $resultado = $categoria->mostrarPorId($id);

        if (!$resultado) {
            header('Location: dashboard.php');
        }
    } else {
        header('Location: dashboard.php');
    }
?>

    <section class="categorias-form">

        <div class="container">
            <div class="row py-5">

                <form method="POST" action="acciones.php" enctype="multipart/form-data">

                    <input type="hidden" value="<?php print $resultado['id']; ?>" name="id">
                    <input type="hidden" value="<?php print $resultado['orden']; ?>" name="orden_categorias">

                    <div class="row">
                        <div class="col-12 d-flex">
                            <a href="index.php" class="btn align-self-center mb-0 p-0" role="button"> <i class="go-arrow-back me-2 fs-1-5 fa-solid fa-arrow-left text-red"></i>
                            </a>
                            <h2 class="fw-700 align-self-center text-red mb-0">Editar <?php print $resultado['nombre']; ?></h2>
                        </div>
                        <p class="fw-200 pt-2">Por favor llene todos los campos con la información nueva y de click en el botón de actualizar una vez que haya finalizado. </p>
                    </div>

                    <div class="row mt-4 text-muted justify-content-evenly">
                        <div class="col-5 bg-info bg-white form-card p-4 rounded">

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <input class="form-control" value="<?php print $resultado['nombre']; ?>" name="nombre_categoria" type="text" placeholder="Ej: Mochilas, camisas, etc." required>
                                        <label for="floatingInput" class="fw-600">Nombre</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="descripcion_categoria" type="text" placeholder="Descripción detallada de la categoria." required><?php print $resultado['descripcion']; ?></textarea>
                                        <label for="floatingInput" class="fw-600">Descripción de la categoria</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 form-card p-4 rounded">

                            <div class="row pb-3">
                                <div>
                                    <label for="formFile" class="form-label fw-600">Imagen del producto</label>
                                    <input class="form-control image-input" name="imagen" accept="image/*" id="gallery-photo-add" type="file">
                                    <input type="hidden" name="imagen_temp" value="<?php print $resultado['imagen'] ?>">

                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="container-img text-center">
                                    <div class="gallery align-items-center">
                                        <?php
                                        $image = '../../upload/Kits/' . $resultado['imagen'];

                                        if (file_exists($image)) {
                                        ?>
                                            <img src="<?php print $image; ?>" class="form-img-thumbnail-category">
                                            <a class="close fa-solid fa-times fs-1-5" onclick="remove()"></a>

                                        <?php
                                        } ?>

                                    </div>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-12">
                                    <input type="submit" name="accion" class="btn btn-primary w-50" value="Actualizar">
                                    <a href="../categorias/index.php" class="btn btn-secondary ms-3" role="buttton">Cancelar</a>
                                </div>
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

        function remove() {

            $("div.gallery").html('<span><i class="pt-5 fa-solid fa-image fs-4 text-muted"></i></span> <p class = "pt-3 fw-600" > Preview de la imagen < /p>');
            document.getElementById('gallery-photo-add').value = null;

        }
    </script>

<?php
}
include('../footer-admin.php');
?>