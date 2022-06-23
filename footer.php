<!-- Modal 
<div class="modal fade align-self-center" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close align-self-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <section id="login" class="">
                    <div class="container">
                        <div class="row text-center px-3 py-2">
                            <form action="login-user.php" method="post">
                                <h3 class="section-title pb-2">Login</h3>

                                <div class="form-group text-start pb-2">
                                    <h6 for="inputUsuarioLogin" class="col-2 py-2 fw-600">Usuario</h6>
                                    <div class="d-flex">
                                        <i class="fas fa-user color-purple align-self-center me-3"></i>
                                        <input class="form-control2" name="nombre_usuario" type="text" placeholder="Nombre de usuario" aria-label="default input example" id="inputUsuarioLogin" required>
                                    </div>
                                </div>
                                <div class="form-group text-start py-2">
                                    <h6 for="inputPasswordLogin" class="col-2 py-2 fw-600">Password</h6>
                                    <div class="d-flex">
                                        <i class="fas fa-key color-purple align-self-center me-3"></i>
                                        <input class="form-control2" name="clave_usuario" type="password" placeholder="Contraseña" aria-label="default input example" id="inputPasswordLogin" required>
                                    </div>
                                </div>
                                <?php
                                //echo $mensaje2;
                                ?>
                                <div>
                                    <?php
                                    if (!empty($_SESSION['message'])) {
                                        echo '<p class="message text-center mt-2" > ' . $_SESSION['message'] . '</p>';
                                        unset($_SESSION['message']);
                                    }
                                    ?>
                                </div>
                                <button type="submit" value="Submit" class="btn btn-primary mt-4 mb-4 w-100">Iniciar sesión</button>
                                <div class="col-12 align-items-center mx-auto pt-4">
                                    <h6 class="mb-0">¿No tiene una cuenta?<span><a href="form-register.php" class="color-red btn btn-link ss color-purple">Registrarse</a>
                                        </span></h6>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="modal fade align-self-center" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close align-self-center" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <section class="">
                    <div class="px-5 pb-5 text-center">
                        <h3 class="section-title pt-5 pb-3 col-8 mx-auto ">Su cuenta se ha registrado.</h3>
                        <h6>Se ha enviado un correo de verificación. </h6>

                        <i class="fas fa-envelope-open-text color-purple display-1 mt-4"></i>

                        <div class="d-flex col-5 mx-auto">
                            <a href="login.php" class="btn btn-primary my-5 py-2 me-4 text-center w-75">Login</a>
                            <button type="submit" class="btn btn-secondary my-5 py-2 text-center w-50" name="accion" value="Volver a enviar"> Enviar de nuevo </button>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
</div>
                                -->
</main>
<footer>
    <div class="container-fluid bg-darkblue py-2 px-5" id="footer">
        <div class=" row justify-content-between px-4 py-5">
            <div class="col-3 px-0">
                <div class="pb-4">
                    <a href="index.php">
                        <h5 class="logo fw-600 text-white">Indoff Pro Dashboard</h5>
                        <p class="fw-600">Productos Promocionales</p>
                    </a>
                </div>
                <p class="">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos sequi voluptatibus perferendis laborum adipisci repellat quas praesentium iste aperiam tempore.</p>
            </div>
            <div class="col-2">
                <h5 class="text-white fw-600 pb-4">Productos</h5>

                <a href="<?php print $root_categorias; ?>">
                    <p class="footer-link">Categorias</p>
                </a>
                <a href="<?php print $root_eventos; ?>">
                    <p class="footer-link">Eventos</p>
                </a>
                <a href="<?php print $root_kits; ?>">
                    <p class="footer-link">Kits</p>
                </a>
            </div>
            <div class="col-2">
                <h5 class="text-white fw-600 pb-4">Acerca de</h5>

                <a href="<?php print $root_nosotros; ?>">
                    <p class="footer-link">Quiénes somos</p>
                </a>
                <a href="<?php print $root_contacto; ?>">
                    <p class="footer-link">Contáctanos</p>
                </a>
                <a href="<?php print $root_blogs; ?>">
                    <p class="footer-link">Blogs</p>
                </a>
            </div>
            <div class="col-2">
                <h5 class="text-white fw-600 pb-4">Contacto</h5>
                <p class=""><span><i class="fa-solid fa-location-dot me-3"></i></span>Tijuana, México</p>
                <a href="mailto:indoffpro@indoff.com">
                    <p class="footer-link"><span><i class="fa-solid fa-envelope me-3"></i></span>indoffpro@indoff.com</p>
                </a>
                <a href="">
                    <p class=""><span><i class="fa-solid fa-phone me-3"></i></span>+52 (664) 123 39 90</p>
                </a>
                <a href="">
                    <p class=""><span><i class="fa-solid fa-phone me-3"></i></span>+52 (664) 625 11 11</p>
                </a>
            </div>
            <div class="col-2">
                <h5 class="text-white fw-600 pb-4">¡Siguenos en nuestras redes sociales!</h5>
                <div class="col-5 d-flex justify-content-between">
                    <a href="https://www.linkedin.com/company/31381210/"><i class="fs-2 fa-brands fa-linkedin footer-link"></i></a>
                    <a href="https://www.facebook.com/indoffpro"><i class="fs-2 fa-brands fa-facebook-square footer-link"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid bg-light py-4">
        <div class="row justify-content-center">
            <div class="col text-center">
                <p class="mb-0 fw-600 text-muted">©2022 Copyright
                    <a class="text-purple fw-600 mb-0 footer-copy-link" href="index.php">indoffpro.com</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://www.google.com/recaptcha/api.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    /*jQuery('button').click(function(e) {
        jQuery('.collapse').collapse('hide');
    });
    */

    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })

    function pdf() {
        var txtMensa = document.getElementById('txtMensa');
        html2pdf(txtMensa);
    }

    //Seleccion de colores de producto por el admin

    $("#color-select").select2({
        placeholder: 'Seleccione los colores deseados o puede buscarlos por nombre con la referencia de abajo.',
        allowClear: true
    });

    //Obtener el valor del color
    function color_selected() {
        var buttonName = event.target.name;
        console.log(buttonName);
        document.getElementById('mostrarColorNombre').innerHTML = buttonName;
        document.getElementById('mostrarColor').style.backgroundColor = buttonName;
        document.getElementById('color_producto').value = buttonName;
    };

    /*
        var nextinput = 0;

        $("#nuevo_campo").click(function(e) {
            nextinput++;
            var campo = '<div class="d-flex pt-lg-2 pb-lg-2"> <h6 class=" col-form-label col-lg-3 fw-600 color-grey2">Cantidad mínima ' + newinput + '</h6> <div class="form-group col-lg-3 mx-lg-3"> <input class=" col-12 qty-dropdown" type="number" name="q' + newinput + '_producto" placeholder="0" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1"> <small class="d-flex form-text text-disbabled">Cantidad mínima ' + newinput + '</small> </div> <h6 class="col-form-label fw-600 col-lg-2 color-grey2 ms-lg-4">Costo ' + newinput + '</h6> <div class="form-group col-lg-3"> <input class=" col-12 qty-dropdown" type="number" name="p' + newinput + '_producto" placeholder="0" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" min="1"> <small class="d-flex form-text text-disbabled">Costo ' + newinput + '</small></div></div>'
        });
        */

    function cambiarCarrito(nombre) {
        document.getElementById('cantidadCarrito').style.backgroundColor = '#775FC7';
        console.log(nombre);
        document.getElementById('cantidadCarrito').textContent = nombre;
    }

    function cambiarPrecio() {

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones1_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad1_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect1_producto");
        modificarlabelcantidad.textContent = '$' + arreglo[1] + ' USD';
        var modificartotal = document.getElementById("precioTotal");
        modificartotal.textContent = '$' + arreglo[1] + ' USD';
        var modificarprecioindividual = document.getElementById("precioIndividual1_producto");

        modificarprecioindividual.textContent = Number((arreglo[0] / arreglo[1]).toFixed(2));
        // console.log(modificarlabel.textContent)


        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones2_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad2_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect2_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual2_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones3_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad3_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect3_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual3_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones4_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad4_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect4_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual4_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones5_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad5_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect5_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual5_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones6_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad6_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect6_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual6_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones7_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad7_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect7_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual7_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones8_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad8_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect8_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual8_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones9_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad9_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect9_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual9_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

        // console.log(modificarlabel.textContent)
        var precios_lista = document.getElementById("selectOpciones10_producto");
        var valor = precios_lista.options[precios_lista.selectedIndex].value;
        //console.log(valor);
        var arreglo = valor.split(",")
        var modificarlabelcantidad = document.getElementById("cantidad10_producto");
        modificarlabelcantidad.textContent = arreglo[0];
        var modificarlabelcantidad = document.getElementById("precioSelect10_producto");
        modificarlabelcantidad.textContent = arreglo[1];
        var modificarprecioindividual = document.getElementById("precioIndividual10_producto");
        modificarprecioindividual.textContent = arreglo[0] / arreglo[1];
        // console.log(modificarlabel.textContent)

    }
</script>

</body>

</html>