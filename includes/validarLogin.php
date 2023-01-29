<?php

$usuario = "";
$contrasenia = "";

$usuariobd =[];
$contraseniabd = [];
$perfil = [];
$cadena="";
$error="";
$id_user= [];

if (isset($_POST['enviar'])) {
    $usuario=$_POST["usuario"];
    $contrasenia=$_POST["contrasenia"];
if (!empty($usuario) && !empty($contrasenia)) {

    //setcookie("usuarioProcedimiento",$usuario,time()+(365*24*60*60));

    if(!empty($_POST['check'])){

        setcookie("usuario",$usuario,time()+(365*24*60*60));
        setcookie("contrasenia",$contrasenia,time()+(365*24*60*60));
        setcookie("recuerdame",$_POST['check'],time()+(365*24*60*60));

    }else{
        setcookie("usuario","",time()-100);
        setcookie("contrasenia","",time()-100);
        setcookie("recuerdame","",time()-100);
    }
    if(!empty($_POST['check2'])){

       
        setcookie("abierta",$_POST['check2'],time()+(365*24*60*60));

    }else{
      
        setcookie("abierta","",time()-100);
    }

    foreach ($parametros["datos"] as $d) {
        $usuariobd["nombre"] = $d["nombre"];
        $contraseniabd["pass"] = $d["pass"];
        $perfil["perfil"] = $d["perfil"];
        
        if ($usuario==$usuariobd["nombre"] && $contrasenia==$contraseniabd["pass"]) {
            if ($perfil["perfil"]=="admin") {
                 session_start();
                $_SESSION["logeadoAdmin"] = $usuario;
                     $cadena="Location:../vistas/index.php?accion=listarEntradas";
                     
                   
            }else if($perfil["perfil"]=="user"){
                 session_start();
                $_SESSION["logeadoUser"] = $usuario;
                $cadena="Location:../vistas/index.php?accion=listarEntradasUser";
                
            }
        }else{
            $error="Location:../vistas/login.php?error=datos";
        }
        
    }
if (!empty($cadena)) {
    header($cadena);
}else{
    header($error);
}
        
 


}else{

    header("Location:../vistas/login.php?error=si");
}
}