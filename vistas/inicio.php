<?php

$controlador=new Controlador();
$parametros=$controlador->cards();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../includes/head.php'?>
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
                                    <a class="nav-link" href="../vistas/login.php">Acceder</a>
                                </li>
                                
                            </ul>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <h1>Nuestros artículos</h1>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-md-12 col-lg-12">
                    


                
                <?php foreach ($parametros['datos'] as $d) : ?>
                    
                    <div class="card mb-3">
                    
                        <img src='../fotos/<?php echo $d["imagen"]?>' class="card-img-top" alt="" style="width: 500px;">
                           
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $d['titulo'] ?></h5>
                            <p class="card-text"><?php echo $d['fecha'] ?></small></p>
                            <p class="card-text"><?php echo $d['descripcion'] ?></p>
                            <a href="index.php?accion=listarEntrada&id=<?php echo $d['id']; ?>">Leer mas...</a>
                        </div>
                    </div>
                               

                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

<?php require '../includes/paginacion.php'?>
    <!--PIE-->
    <?php require '../includes/footer.php'?>   
</body>
</html>