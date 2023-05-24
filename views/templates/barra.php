
<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>
    <a class="boton" href="/logout">Cerrar Sesion</a>
</div>

<?php if (isset($_SESSION['admin'])) { ?>

    <div>

        <ul class="nav nav-pills barra-servicios">
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Piezas Terminadas</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/servicios">Ver piezas</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/servicios/crear">Agregar piezas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Insertos</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/insertos">Ver insertos</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/insertos/crear">Agregar insertos</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Machuelos</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/machuelos">Ver Machuelos</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/machuelos/crear">Agregar Machuelos</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Brocas</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/brocas">Ver Brocas</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/brocas/crear">Agregar Brocas</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Consumibles</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/consumibles">Ver Consumibles</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/consumibles/crear">Agregar Consumibles</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle boton-barra-servicios" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Materia Prima</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item boton-barra-desplegable" href="/material">Ver Material</a></li>
                    <li><a class="dropdown-item boton-barra-desplegable" href="/material/crear">Agregar Material</a></li>
                </ul>
            </li>
        </ul>
    </div>

<?php } else { ?>
    <div class="barra-servicios">
        <a class="boton-barra-servicios" href="/usuarioS">Piezas Terminadas</a>
        <a class="boton-barra-servicios" href="/usuarioI">Insertos</a>
        <a class="boton-barra-servicios" href="/usuarioM">Machuelos</a>
        <a class="boton-barra-servicios" href="/usuarioB">Brocas</a>
    </div>
<?php } ?>