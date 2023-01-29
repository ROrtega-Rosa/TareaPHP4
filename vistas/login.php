<!DOCTYPE html>
<html lang="en">

<head>
    <?php require '../includes/head.php' ?>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center" id="header">
            <div class="col-xs-3 col-md-6 col-lg-6">
                <h1 id="titu">Mi pequeño blog</h1>
            </div>

            <div class="col-xs-3 col-md-6 col-lg-6">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <li class="nav-item">
                                    <a class="nav-link" href="../vistas/index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../includes/cerrarSesion.php">Cerrar Sesión</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <form method="post" action="../vistas/index.php?accion=listarLogs">
            <div class="row justify-content-center">
                <div class="col-xs-3 col-md-3 col-lg-3">
                    <label for="exampleFormControlInput1" class="form-label">Usuario:
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="usuario" value="<?php //si existe la cookie de pass con la contraseña, se imprime
                                                                                                                if (!empty($_COOKIE['usuario'])) {
                                                                                                                  echo $_COOKIE['usuario'];
                                                                                                                } ?>">
                    </label>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-3 col-md-3 col-lg-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Contraseña:
                        <input type="password" class="form-control" id="exampleFormControlInput1"  name="contrasenia" value="<?php //si existe la cookie de pass con la contraseña, se imprime
                                                                                                                if (!empty($_COOKIE['contrasenia'])) {
                                                                                                                  echo $_COOKIE['contrasenia'];
                                                                                                                } ?>">
                    </label>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xs-3 col-md-3 col-lg-3">
                    <div class="form-check">

                        <label class="form-check-label" for="flexCheckDefault">
                            <input class="form-check-input" type="checkbox" value="check" id="flexCheckDefault" name="check" <?php // si hay una cookie  de recuerdame, entonces imprimimos un tick
                                                                                                                                if (isset($_COOKIE['recuerdame'])) { ?> checked<?php }  ?>>

                            Recuérdame :)
                        </label>

                    </div>
                    <div class="form-check">

                        <label class="form-check-label" for="flexCheckDefault">
                            <input class="form-check-input" type="checkbox" value="check2" id="flexCheckDefault" name="check2" <?php // si hay una cookie de abierta, entonces imprimimos un tick
                                                                                                                                if (isset($_COOKIE['abierta'])) { ?> checked<?php } ?>>

                            Mantener sesión abierta ;)
                        </label>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <?php


    if (isset($_GET["error"])) {
        if ($_GET["error"] == "datos") {

            echo '<div class="alert alert-danger" role="alert">
        tu usuario y contraseña no son correctos
      </div>';
        } else if ($_GET["error"] == "si") {

            echo '<div class="alert alert-danger" role="alert">
        no se puede acceder a la pagina
      </div>';
        }
    }

    ?>

    <?php require '../includes/footer.php' ?>
</body>

</html>