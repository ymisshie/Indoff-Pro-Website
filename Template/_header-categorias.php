<section>
    
    <nav class="navbar py-md-1 navbar-expand-lg fw-600 px-lg-5 px-md-3">
      <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">
                  <i class="fas fa-bars text-white m-0"></i>
              </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto">
                  <li class="nav-item px-md-4 uppercase">
                      <a class="nav-link text-white  <?php if ($pagina == "inicio") {
                                                            echo "active";
                                                        } ?>" aria-current="page" href="index.php">Inicio</a>
                  </li>
                  <li class="nav-item px-md-4 px-md-0 dropdown">
                      <a class="nav-link text-white uppercase dropdown-toggle  <?php if ($pagina == "categorias") {
                                                                                    echo "active";
                                                                                } ?>" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Categorias
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php
                            require 'vendor/autoload.php';
                            $categoria = new ameri\Categoria;
                            $info_categoria = $categoria->mostrar();
                            $cantidad_categoria = count($info_categoria);

                            if ($cantidad_categoria > 0) {
                                for ($x = 0; $x < $cantidad_categoria; $x++) {
                                    $item = $info_categoria[$x];
                            ?>
                                  <li><a class="dropdown-item" href="categorias.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                          <?php
                                }
                            }
                            ?>
                      </ul>

                  </li>
                  <li class="nav-item dropdown px-md-4">
                      <a class="nav-link text-white text-white dropdown-toggle uppercase <?php if ($pagina == "eventos") {
                                                                                                echo "active";
                                                                                            } ?>" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Eventos
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php
                            require 'vendor/autoload.php';
                            $evento = new ameri\Evento;
                            $info_evento = $evento->mostrar();
                            $cantidad = count($info_evento);

                            if ($cantidad > 0) {
                                for ($x = 0; $x < $cantidad; $x++) {
                                    $item = $info_evento[$x];
                            ?>
                                  <li><a class="dropdown-item" href="productos-eventos.php?id=<?php print $item['id'] ?>"><?php print $item['nombre'] ?></a></li>

                          <?php
                                }
                            } ?>

                      </ul>

                  <li class="nav-item px-md-4 uppercase">
                      <a class="nav-link text-white" aria-current="page" href="#">Contacto</a>
                  </li>
                  <li class="nav-item px-md-4 uppercase">
                      <a class="nav-link text-white" aria-current="page" href="#">Nosotros</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
 
</section>
 