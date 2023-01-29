<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xs-3 col-md-6 col-lg-6">
            <table class="table table-sniped" >
                <tr>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Fecha</th>
                    <th>Imagen</th>
                    
                </tr>
                    <?php
                  
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
                           
                       

                        }
                    
                    
                    ?>

                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php

$html=ob_get_clean();
// llamamos a la librería dompdf
require_once "../libreria/dompdf/autoload.inc.php";
//se crea un objeto dompdf
use Dompdf\Dompdf;
$dompdf= new Dompdf();

$opciones=$dompdf->getOptions();
$opciones->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($opciones);
// introducimos la variable html con el archivo html en otra variable
$dompdf->loadHtml($html);
//elegimos el formato del pdf
$dompdf->setPaper('A4','landscape');
$dompdf->render();
//introducimos el nombre del pdf
$dompdf->stream("archivo_.pdf",array("Attachment"=>false));


?>