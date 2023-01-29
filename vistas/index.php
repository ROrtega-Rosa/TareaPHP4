<?php

//ruta que va a enlazar con la clase controlador para así llamar a sus métodos
require_once '../controladores/controlador.php';

//objeto controlador
$controlador=new Controlador();

// si el get existe entonces sanitizamos los datos que pasamos mediante este método

if($_GET && $_GET['accion']){

    $accion = filter_input(INPUT_GET, "accion", FILTER_SANITIZE_STRING);

    //ahora verificamos que es correcta la relacion entre get y el objeto creado

    if(method_exists($controlador, $accion)){

        $controlador->$accion(); //se ejecuta la operacion iniciada en accion

    }else{

        $controlador->index(); //llamamos al metodo index que va a redirigir a la pagina de inicio
    }


}else{

    $controlador->index();

}








?>