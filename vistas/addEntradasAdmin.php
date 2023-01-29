<?php

session_start();

if (!isset($_SESSION["logeadoAdmin"]) && !isset($_SESSION["logeadoUser"])) {


    header("Location:../vistas/login.php?error=si");
}
$controlador = new Controlador();
$parametros = $controlador->seleccionarId();
$id_user = [];



if (!empty($_SESSION["logeadoUser"])) {

    foreach ($parametros["datos"] as $d) {
        if ($_SESSION["logeadoUser"] == $d['nombre']) {
            $id_user["id_user"] = $d["id"];
        }
    }
}else if(!empty($_SESSION["logeadoAdmin"])){
    foreach ($parametros["datos"] as $d) {
        if ($_SESSION["logeadoAdmin"] == $d['nombre']) {
            $id_user["id_user"] = $d["id"];
        }
    }

}


?>

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
                                    <?php if (!empty($_SESSION["logeadoAdmin"])) : ?>
                                        <a class="nav-link" href="../vistas/index.php?accion=listarEntradas">Listar Entradas</a>

                                    <?php else : ?>
                                        <a class="nav-link" href="../vistas/index.php?accion=listarEntradasUser">Listar Entradas</a>
                                    <?php endif; ?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../includes/cerrarSesion.php">Cerrar Sesion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-3">
                <h2>Nueva Entrada</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-3">
            <?php foreach ($parametros["mensajes"] as $mensaje) : ?>
                    <div class="alert alert-<?= $mensaje["tipo"] ?>"><?= $mensaje["mensaje"] ?></div>
                <?php endforeach; ?>
            </div>
        </div>
        <script>
            CKEDITOR.replace('descripcion');
        </script>
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-6">
                <form action="../vistas/index.php?accion=addEntradas" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required />
                    </div></br>

                    <div class="row">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen" required />
                    </div></br>
                    <div class="row">
                        <label for="fecha">fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required />
                    </div></br>
                    <div class="row">
                        <label for="descripcion">Descripción</label>
                        <textarea class="ckeditor" id="descripcion" name="descripcion" required></textarea>

                    </div></br>
                    
                    <input type="hidden" name="id_user" value="<?php echo $id_user['id_user']; ?>">
                    <div class="btn-group" role="group" aria-label="Basic example">

                        <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
                        <button type="reset" class="btn btn-secondary" name="limpiar">Limpiar</button>

                    </div>

                </form>
            </div>
        </div>



    </div>



    <?php require '../includes/footer.php' ?>
</body>

</html>