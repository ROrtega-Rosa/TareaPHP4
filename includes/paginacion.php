<html>
<?php if (!empty($_GET["accion"])) : ?>
<?php if ($_GET["accion"]=="listarEntradas") : ?>
<nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php if ($parametros['pagina']==1):?> 
        
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=listarEntradas&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
    </li> 
    <?php endif ?>

        <?php
        for($i=1;$i<=$parametros['numpagina'];$i++){

            if($parametros['pagina']==$i){


                echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarEntradas&pagina='.$i.'">'.$i.'</a></li>';
            }else{

                echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarEntradas&pagina='.$i.'">'.$i.'</a></li>';
            }
        }

    ?>
    <?php if ($parametros['pagina']==$parametros['numpagina']):?> 
        
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
        </li> 
        <?php else: ?>
            <li class="page-item">
          <a class="page-link" href="../vistas/index.php?accion=listarEntradas&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
        </li> 
        <?php endif ?>
    
  </ul>
</nav>
<?php elseif ($_GET["accion"]=="listarEntradasUser"): ?>

    <nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php if ($parametros['pagina']==1):?> 
        
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=listarEntradasUser&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
    </li> 
    <?php endif ?>

        <?php
        for($i=1;$i<=$parametros['numpagina'];$i++){

            if($parametros['pagina']==$i){


                echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarEntradasUser&pagina='.$i.'">'.$i.'</a></li>';
            }else{

                echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarEntradasUser&pagina='.$i.'">'.$i.'</a></li>';
            }
        }

    ?>
    <?php if ($parametros['pagina']==$parametros['numpagina']):?> 
        
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
        </li> 
        <?php else: ?>
            <li class="page-item">
          <a class="page-link" href="../vistas/index.php?accion=listarEntradasUser&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
        </li> 
        <?php endif ?>
    
  </ul>
</nav>
<?php elseif ($_GET["accion"]=="ordenarAsc"): ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion=ordenarAsc&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarAsc&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarAsc&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=ordenarAsc&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>

<?php elseif ($_GET["accion"]=="ordenarDs"): ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion=ordenarDs&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarDs&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarDs&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=ordenarDs&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>

<?php elseif ($_GET["accion"]=="ordenarAscUser"): ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion=ordenarAscUser&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarAscUser&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarAscUser&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=ordenarAscUser&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>
<?php elseif ($_GET["accion"]=="ordenarDsUser"): ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion=ordenarDsUser&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarDsUser&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=ordenarDsUser&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=ordenarDsUser&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>
<?php elseif ($_GET["accion"]=="listarTablaLogs"): ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion=listarTablaLogs&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarTablaLogs&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion=listarTablaLogs&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion=listarTablaLogs&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>
<?php endif;?>
<?php else: ?>

<nav aria-label="Page navigation example">
<ul class="pagination">

<?php if ($parametros['pagina']==1):?> 
    
<li class="page-item">
  <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php else: ?>
    <li class="page-item">
  <a class="page-link" href="../vistas/index.php?accion&pagina=<?php echo $parametros["pagina"] - 1 ?>" aria-label="Previous"> <span aria-hidden="true">&laquo;</span></a>
</li> 
<?php endif ?>

    <?php
    for($i=1;$i<=$parametros['numpagina'];$i++){

        if($parametros['pagina']==$i){


            echo ' <li class="page-item"><a class="page-link" href="../vistas/index.php?accion&pagina='.$i.'">'.$i.'</a></li>';
        }else{

            echo '<li class="page-item"><a class="page-link" href="../vistas/index.php?accion&pagina='.$i.'">'.$i.'</a></li>';
        }
    }

?>
<?php if ($parametros['pagina']==$parametros['numpagina']):?> 
    
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php else: ?>
        <li class="page-item">
      <a class="page-link" href="../vistas/index.php?accion&pagina=<?php echo $parametros["pagina"] + 1 ?>" aria-label="Previous"> <span aria-hidden="true">&raquo;</span></a>
    </li> 
    <?php endif ?>

</ul>
</nav>



<?php endif;?>
</html>