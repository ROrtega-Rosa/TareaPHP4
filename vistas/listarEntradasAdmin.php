<?php 

session_start();

if(!isset($_SESSION["logeadoAdmin"]) && !isset($_SESSION["logeadoUser"])){


header("Location:../vistas/login.php?error=si");

}


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
                                    <a class="nav-link" href="../vistas/index.php">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../vistas/index.php?accion=addEntradas">Nueva Entrada</a>
                                </li>
                                <li>
                                <?php if(!empty($_SESSION["logeadoAdmin"])): ?>
                                    <a class="nav-link" href="../vistas/index.php?accion=generarPDFAdmin&pagina=<?php echo $parametros["pagina"]; ?>">Generar PDF</a>
                                    <?php else: ?>
                                        <a class="nav-link" href="../vistas/index.php?accion=generarPDFUser&pagina=<?php echo $parametros["pagina"]; ?>">Generar PDF</a>   
                                    <?php endif;?>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../vistas/index.php?accion=listarTablaLogs">Historial de operaciones</a>
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
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-3">
                <h2>Listado</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-3">
            <?php foreach ($parametros["mensajes"] as $mensaje) : ?> 
                <div class="alert alert-<?= $mensaje["tipo"] ?>"><?= $mensaje["mensaje"] ?></div>
            <?php endforeach; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-12 col-lg-12">
                <!--se introducirá la lista de entradas en una tabla-->
                <table class="table table-sniped" >
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha 
                    <?php if(!empty($_SESSION["logeadoAdmin"])): ?>
                        <a href="../vistas/index.php?accion=ordenarAsc"><i class="bi bi-arrow-up"></i><a>
                        <a href="../vistas/index.php?accion=ordenarDs"><i class="bi bi-arrow-down"></i><a> 
                        <a href="../vistas/index.php?accion=listarEntradas"><i class="bi bi-arrow-clockwise"></i><a> 
                    <?php else: ?>
                        <a href="../vistas/index.php?accion=ordenarAscUser"><i class="bi bi-arrow-up"></i><a>
                        <a href="../vistas/index.php?accion=ordenarDsUser"><i class="bi bi-arrow-down"></i><a> 
                        <a href="../vistas/index.php?accion=listarEntradasUser"><i class="bi bi-arrow-clockwise"></i><a> 
                    <?php endif; ?>    
                    </th>
                    <th>Imagen</th>
                    <th>Operaciones</th>
                    
                </tr>
                    <?php
                  
                    //se va a recorrer el resultado de la consulta con un bucle 
                        foreach($parametros['datos'] as $d){

                            echo '<tr>';
                             echo '<td>'.$d['titulo'].'</td>';
                             echo '<td>'.$d['descripcion'].'</td>';
                            echo '<td>'.$d['fecha'].'</td>';
                            echo '<td>';
                            if($d["imagen"]!=null){

                                echo '<img src="../fotos/' . $d['imagen'] .'" width="40" /> ' . $d['imagen'];

                            }else{

                                echo "----------";
                            }
                           
                            echo "</td>";
                           
                         /**
                          * botones para eliminar o editar
                          */


                            echo '<td>';
                            
                            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal'.$d['id'].'" >
                            Eliminar
                          </button>';
                            echo '</td>';

                            echo'<td>';
                            echo '<button type="button" class="btn btn-primary"><a  href="../vistas/index.php?accion=actEntradas&id='. $d['id'].'" style="color: white; text-decoration:none;">Editar</a></button>';
                            echo '</td>';
                            
                            echo'<td>';
                            echo '<button type="button" class="btn btn-primary"><a  href="../vistas/index.php?accion=listarEntrada&id='. $d['id'].'" style="color: white; text-decoration:none;">Detalle</a></button>';
                            echo '</td>';
                            
 
                            echo '</tr>';
                            //se llamará a la ventana modal
                           require "modalEliminar.php";

                        }
                    
                    
                    ?>

                </table>
                        
            </div>
        </div>
    </div>



    </div>
   <!---PAGINACION-->
  
   <?php require '../includes/paginacion.php' ?>
    
   
   <!---FOOTER--->
<?php require '../includes/footer.php'?>
</body>
</html>