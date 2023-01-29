<?php

class Modelo
{
    // atributos que serán empleados en la conexion
    private $conexion;

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "bdblog";

    //constructor de la clase y ejecutará el metodo conectar
    public function __construct()
    {

        $this->conectar();
    }

    /**
     * metodo conectar para realizar la union con la base de datos. Va a devolver un dato de tipo boolena true si 
     * la conexion es correcta y false si no se ha realizado.
     * @return boolean
     */

    public function conectar()
    {

        try {

            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $ex) {

            return $ex->getMessage();
        }
    }

    /**
     * funcion que nos permite saber si estamos conectados a la base de datos
     * @return boolean
     */
    public function estaConectado()
    {
        if ($this->conexion) {

            return true;
        } else {

            return false;
        }
    }

   /**
    * funcion para el login con la tabla usuarios
    */

    public function logs(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null
        ];

        try {
            //instruccion
            //$sql="SELECT *
            //FROM usuarios
           // INNER JOIN entradas
           // ON usuarios.id = entradas.usuario_id
           // INNER JOIN categorias
           // ON entradas.categoria_id = categorias.id";
            $sql = "SELECT * FROM usuarios";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;
    }
   
   

    //Funciones de la tabla entrada

    /***
     * funcion para listar todas las entradas de la base de datos
     * contendrá un array: correcto que nos dice si el listado se ha realizado bien o no;
     * datos que almacena los datos obtenidos en la consulta de la tabla, error que
     * almacena un mensaje de la situcion erronea
     */


    public function listarEntradas(){

        
        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
            
        ];
        
        try {
            //variables de la paginacion
            $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
           $arrayReturn['pagina']=$pagina;
            $postPagina=5;
            $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;
            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM entradas LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);

            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);

               
            }
               //variable procedimiento almacenado
               $operacion="se ha realizado un listado";
               $fech=date("Y-m-d H:i:s");
           //procedimiento almacenado
           $sqlLog = 'CALL insertar_operacion(:fecha,:operacion)';
           $resultadolog = $this->conexion->prepare($sqlLog);
           $resultadolog->bindparam(':fecha', $fech, PDO::PARAM_STR);
           $resultadolog->bindparam(':operacion', $operacion, PDO::PARAM_STR);
           $resultadolog->execute();

           //paginacion
           $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
            $totalUser=$totalUser->fetch()['total'];
            //se redondea el numero de paginas
            $numeroPagina= ceil($totalUser / $postPagina);
            $arrayReturn['numpagina']=$numeroPagina;

        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;
    }
    /**
     * funcion para ordenar por fecha
     */
    public function ordenarAsc(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
            
        ];
        

       

        try {
             //variables de la paginacion
             $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
             $arrayReturn['pagina']=$pagina;
              $postPagina=5;
              $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;

            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM entradas ORDER BY fecha ASC LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
           
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
             //paginacion
           $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
           $totalUser=$totalUser->fetch()['total'];
           //se redondea el numero de paginas
           $numeroPagina= ceil($totalUser / $postPagina);
           $arrayReturn['numpagina']=$numeroPagina;
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;


    }
    /**
     * funcion para mostrar por orden descendente
     */
    public function ordenarDs(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
            
        ];
        //paginacion

       

        try {
             //variables de la paginacion
             $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
             $arrayReturn['pagina']=$pagina;
              $postPagina=5;
              $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;

            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM entradas ORDER BY fecha DESC LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
           
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
             //paginacion
           $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
           $totalUser=$totalUser->fetch()['total'];
           //se redondea el numero de paginas
           $numeroPagina= ceil($totalUser / $postPagina);
           $arrayReturn['numpagina']=$numeroPagina;
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;


    }
         /**
     * funcion para mostrar por orden ascendente para el user
     */
    public function ordenarAscUser(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
        ];
        
        try {
              //variables de la paginacion
              $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
              $arrayReturn['pagina']=$pagina;
               $postPagina=5;
               $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;
            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios INNER JOIN entradas ON entradas.usuario_id=usuarios.id WHERE usuarios.perfil LIKE 'user' ORDER BY fecha ASC LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
           
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
            //paginacion
           $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
           $totalUser=$totalUser->fetch()['total'];
           //se redondea el numero de paginas
           $numeroPagina= ceil($totalUser / $postPagina);
           $arrayReturn['numpagina']=$numeroPagina;
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;


    }
     /**
     * funcion para mostrar por orden descendente para el user
     */
    public function ordenarDsUser(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
            
        ];
        //paginacion

       

        try {
              //variables de la paginacion
              $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
              $arrayReturn['pagina']=$pagina;
               $postPagina=5;
               $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;
            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios INNER JOIN entradas ON entradas.usuario_id=usuarios.id  WHERE usuarios.perfil LIKE 'user' ORDER BY fecha DESC LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
           
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
            //paginacion
           $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
           $totalUser=$totalUser->fetch()['total'];
           //se redondea el numero de paginas
           $numeroPagina= ceil($totalUser / $postPagina);
           $arrayReturn['numpagina']=$numeroPagina;
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;


    }


    /**
     * funcion que va a listar las entradas del usuario User
     */
    public function listarEntradasUser(){

        $arrayReturn = [

            "correcto" => false,
            "datos" => null,
            "error" => null,
            "pagina"=>null,
            "numpagina"=>null
        ];

        try {
            //variables de la paginacion
            $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
           $arrayReturn['pagina']=$pagina;
            $postPagina=5;
            $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;

            //instruccion
            $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM usuarios INNER JOIN entradas ON entradas.usuario_id=usuarios.id  WHERE usuarios.perfil LIKE 'user'LIMIT $inicio,$postPagina";
            //conexion y consulta
            $resultquery = $this->conexion->query($sql);
            if ($resultquery) {

                $arrayReturn["correcto"] = true;
                $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);
            }
             //variable procedimiento almacenado
             $operacion="se ha realizado un listado";
             $fech=date("Y-m-d H:i:s");
         //procedimiento almacenado
         $sqlLog = 'CALL insertar_operacion(:fecha,:operacion)';
         $resultadolog = $this->conexion->prepare($sqlLog);
         $resultadolog->bindparam(':fecha', $fech, PDO::PARAM_STR);
         $resultadolog->bindparam(':operacion', $operacion, PDO::PARAM_STR);
         $resultadolog->execute();
         
         //paginacion
         $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
         $totalUser=$totalUser->fetch()['total'];
         //se redondea el numero de paginas
         $numeroPagina= ceil($totalUser / $postPagina);
         $arrayReturn['numpagina']=$numeroPagina;
        } catch (PDOException $ex) {

            $arrayReturn["error"] = $ex->getMessage();
        }

        return $arrayReturn;
    }

    /**
     * listar una entrada
     */

     public function listarEntrada($id){

        $arrayReturn=[

            "correcto"=> false,
            "datos"=> null,
            "error"=>null,

        ];

        if($id && is_numeric($id)){

            try{

                // instruccion
                $sql = "SELECT * FROM usuarios INNER JOIN entradas ON entradas.usuario_id=usuarios.id WHERE entradas.id= :id";
               // $sql="SELECT * FROM entradas WHERE id=:id";
                //se prepara la consulta 
                
                  //se prepara la consulta
                  $query = $this->conexion->prepare($sql);

                  //se ejecuta la consulta
                  $query->execute(['id' => $id]);

                if ($query) {

                    $arrayReturn["correcto"] = true;
                    $arrayReturn["datos"] = $query->fetch(PDO::FETCH_ASSOC);
                }

            }catch(PDOException $ex){

              $arrayReturn["error"]=  $ex->getMessage();

            }

        }


       return $arrayReturn;

     }
       

    /**
     * funcion que va a eliminar una entrada por el id
     */

    public function delEntradas($id){
        //variable procedimiento almacenado
        $operacion="se ha eliminado una entrada";
        $fech=date("Y-m-d H:i:s");

        $arrayReturn = [
            "correcto" => false,
            "error" => null
        ];

        if ($id && is_numeric($id)) {
            try{
                //hacemos una transaccion
                $this->conexion->beginTransaction();
                //realizamos la consulta
                $sql="DELETE FROM entradas WHERE id= :id";
                //preparamos la conexion
                $query= $this->conexion->prepare($sql);
                //ejecutamos
                $query->execute(['id' => $id]);

                //procedimiento almacenado
                $sqlLog = 'CALL insertar_operacion(:fecha,:operacion)';
                $resultadolog = $this->conexion->prepare($sqlLog);
                $resultadolog->bindparam(':fecha', $fech, PDO::PARAM_STR);
                $resultadolog->bindparam(':operacion', $operacion, PDO::PARAM_STR);
                $resultadolog->execute();
                
                if($query){
                    $this->conexion->commit(); //se confirman los cambios en la transaccion
                    $arrayReturn["correcto"]= true;
                   
                    
                }


            }catch(PDOException $ex){
                $this->conexion->rollback(); //no se realizan los cambios
                $arrayReturn["error"] = $ex->getMessage();
            }

        }
        return $arrayReturn;
    }

    public function addEntradas($datos){

         //variable procedimiento almacenado
         $operacion="se ha insertado una entrada";
         $fech=date("Y-m-d H:i:s");

         $arrayReturn=[

        "correcto"=> false,
        "error"=> null,

        ];

        try{

        // inicio de transaccion
        $this->conexion->beginTransaction();
        // instruccion sql
        $sql= "INSERT INTO entradas(usuario_id,categoria_id,titulo,imagen,descripcion,fecha) VALUES (:usuario_id, :categoria_id, :titulo, :imagen, :descripcion, :fecha)";
        //preparar consulta
        $query=$this->conexion->prepare($sql);
        //ejecutamos
        $query->execute([
            
            'usuario_id'=>$datos['usuario_id'],
            'categoria_id'=>$datos['categoria_id'],
            'titulo'=> $datos['titulo'],
            'imagen'=>$datos['imagen'],
            'descripcion'=>$datos['descripcion'],
            'fecha'=>$datos["fecha"]

        ]);

        //procedimiento almacenado
        $sqlLog = 'CALL insertar_operacion(:fecha,:operacion)';
        $resultadolog = $this->conexion->prepare($sqlLog);
        $resultadolog->bindparam(':fecha', $fech, PDO::PARAM_STR);
        $resultadolog->bindparam(':operacion', $operacion, PDO::PARAM_STR);
        $resultadolog->execute();

        if($query){
            $this->conexion->commit(); // confirmar transaccion
            $arrayReturn["correcto"]= true;


        }


        }catch(PDOException $ex){
        $this->conexion->rollback(); // se vuelve al punto de partida
        $arrayReturn["error"]=$ex->getMessage();
    
     }


        return $arrayReturn;

    }

/**
 * funcion para actualizar las entradas
 */
    public function actEntradas($datos){

        $arrayReturn=[
            "correcto" => false,
            "error"=> null
        ];

        try{

            //iniciamos la transaccion
            $this->conexion->beginTransaction();
            // instruccion sql
            $sql="UPDATE entradas SET titulo= :titulo, imagen= :imagen, descripcion= :descripcion, fecha= :fecha WHERE id= :id";
            //hacemos la conexion
            $query= $this->conexion->prepare($sql);
            $query->execute([
                'id'=> $datos["id"],
                'titulo'=> $datos["titulo"],
                'imagen'=>$datos["imagen"],
                'descripcion'=>$datos["descripcion"],
                'fecha'=> $datos["fecha"]
            ]);
             //variable procedimiento almacenado
                $operacion="se ha actualizado una entrada";
                $fech=date("Y-m-d H:i:s");
            //procedimiento almacenado
            $sqlLog = 'CALL insertar_operacion(:fecha,:operacion)';
            $resultadolog = $this->conexion->prepare($sqlLog);
            $resultadolog->bindparam(':fecha', $fech, PDO::PARAM_STR);
            $resultadolog->bindparam(':operacion', $operacion, PDO::PARAM_STR);
            $resultadolog->execute();
            if ($query) {
                $this->conexion->commit();  // confirmacion de los cambios realizados en la transacción
                $arrayReturn["correcto"] = TRUE;
              }

        }catch(PDOException $ex){

            $this->conexion->rollback(); 
            $arrayReturn["error"]=$ex->getMessage();
        }
        


        return $arrayReturn;

    }


//FUNCIONES TABLA DE LOGS

public function listarTablaLogs(){

        
    $arrayReturn = [

        "correcto" => false,
        "datos" => null,
        "error" => null,
        "pagina"=>null,
        "numpagina"=>null
        
    ];
    

    try {
        //variables de la paginacion
        $pagina=  isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;
        $arrayReturn['pagina']=$pagina;
         $postPagina=5;
         $inicio= ($pagina>1)? ($pagina * $postPagina - $postPagina) : 0;
        //instruccion
        $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM logs LIMIT $inicio,$postPagina";
        //conexion y consulta
        $resultquery = $this->conexion->query($sql);

        if ($resultquery) {

            $arrayReturn["correcto"] = true;
            $arrayReturn["datos"] = $resultquery->fetchAll(PDO::FETCH_ASSOC);

           
        }
        //paginacion
        $totalUser=$this->conexion->query("SELECT FOUND_ROWS() as total");
        $totalUser=$totalUser->fetch()['total'];
        //se redondea el numero de paginas
        $numeroPagina= ceil($totalUser / $postPagina);
        $arrayReturn['numpagina']=$numeroPagina;
  
    } catch (PDOException $ex) {

        $arrayReturn["error"] = $ex->getMessage();
    }

    return $arrayReturn;

}




}
?>