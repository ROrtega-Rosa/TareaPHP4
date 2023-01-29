<?php


require_once '../modelos/modelo.php';


class Controlador
{

    //atributos de la clase controlador

    private $modelo; //atributo de tipo modelo

    private $mensajes; //atributo que almacenara los mensajes que mostraremos al cliente

    /**
     * contructor que va a inicializar un objeto de modelo
     */
    public function __construct()
    {
        $this->modelo = new Modelo();
        $this->mensajes = [];
    }

    //METODOS DE LA CLASE 
    /**
     * metodo que envia al usuario a la pagina de inicio
     */
    public function index()
    {

        //Mostramos la página de inicio
        include_once '../vistas/inicio.php';
    }
    /**
     * metodo que obtiene un listado de usuarios y contraseñas para el login 
     */


    //ENTRADAS
    /**
     * metodo que obtiene el listado de entradas y envia la informacion a la vista
     */
    public function listarEntradas()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpagina"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->listarEntradas();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
        //paginacion
        
             $parametros["pagina"]=$resultModelo["pagina"];
             $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros
    }
    /**
     * metodo para mostrar entradas ordenadas por fecha acendente
     */
        function ordenarAsc(){

            
        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpaginas"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->ordenarAsc();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
        
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros




        }
    /**
     * funcion para mostrar por fechas descendente
     */
    public function ordenarDs(){

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpaginas"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->ordenarDs();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
        
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros



    }
        /**
     * metodo para mostrar entradas ordenadas por fecha acendente de los usuarios
     */
    function ordenarAscUser(){

            
        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpaginas"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->ordenarAscUser();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
        
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros




        }
    /**
     * funcion para mostrar por fechas descendente de los usuarios
     */
    public function ordenarDsUser(){

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpaginas"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->ordenarDsUser();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
        
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];
            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros



    }

    /**
     * metodo para mostrar los datos en cards 
     */
    public function cards()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpagina"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->listarEntradas();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        return $parametros;
    }
    /**
     * metodo para listar una entrada y enviar la informacion a la vista
     */

    public function listarEntrada()
    {

        $id = $_GET['id'];

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => []
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->listarEntrada($id);

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo['error']})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/entrada.php'; //aqui vamos a visualizar los registros




    }
    /**
     * metodo que obtiene el listado de entradas de usuarios y envia la informacion a la vista
     */
    public function listarEntradasUser()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpagina"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->listarEntradasUser();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/listarEntradasAdmin.php'; //aqui vamos a visualizar los registros
    }
    /**
     * metodo para listar los usuarios y trasmitir la informacion a la vista
     */

    public function listarLogs()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => []
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->logs();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../includes/validarLogin.php';
    }
     /**
     * va a seleccionar los distintos id que posteriormente seran usados en diferentes acciones
     */
    public function seleccionarId()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => []
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->logs();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "la consulta se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "la consulta no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        return $parametros;
    }

    /**
     * metodo para insertar entradas y envia la informacion a la vista
     */

    public function addEntradas()
    {
        //array que almacenara mensajes de error
        $error = array();

        // al pulsar el boton de enviar se va a generar todo el codigo que hay en el interior de la condicion
        if (isset($_POST) && !empty($_POST) && isset($_POST['enviar'])) {
            $titulo = $_POST['titulo'];
            $imagen = null;
            $fecha = $_POST['fecha'];
            $descripcion = $_POST['descripcion'];
            $usuario_id=$_POST['id_user'];
            $categoria_id=1;


            if (isset($_FILES["imagen"]) && (!empty($_FILES["imagen"]["tmp_name"]))) {

                if (!is_dir("fotos")) {
                    $dir = mkdir("fotos", 0777, true);
                } else {
                    $dir = true;
                }

                if ($dir) {

                    $nombrefichimg = time() . "-" . $_FILES["imagen"]["name"];

                    $movfichimg = move_uploaded_file($_FILES["imagen"]["tmp_name"], "../fotos/" . $nombrefichimg);
                    $imagen = $nombrefichimg;

                    if ($movfichimg) {
                        $imagencargada = true;
                    } else {
                        $imagencargada = false;
                        $this->mensajes[] = [
                            "tipo" => "danger",
                            "mensaje" => "Error: La imagen no se cargó correctamente! :("
                        ];
                        $error["imagen"] = "Error: La imagen no se cargó correctamente! :(";
                    }
                }
            }
            // si hay 0 errores
            if (count($error) == 0) {

                $resultModelo = $this->modelo->addEntradas([
                    'usuario_id'=>$usuario_id,
                    'categoria_id'=>$categoria_id,
                    'titulo' => $titulo,
                    "imagen" => $imagen,
                    'descripcion' => $descripcion,
                    'fecha' => $fecha
                ]);
                if ($resultModelo["correcto"]) {
                    $this->mensajes[] = [
                        "tipo" => "success",
                        "mensaje" => "la entrada se registró correctamente!! :)"
                    ];
                } else {
                    $this->mensajes[] = [
                        "tipo" => "danger",
                        "mensaje" => "la entrada no pudo registrarse!! :( <br />({$resultModelo["error"]})"
                    ];
                }
            } else {
                $this->mensajes[] = [
                    "tipo" => "danger",
                    "mensaje" => "Datos de registro de entradas erróneos!! :("
                ];
            }
        }
        $parametros = [
            "datos" => [
                "titulo" => isset($titulo) ? $titulo : "",
                "descripcion" => isset($descripcion) ? $descripcion : "",
                "imagen" => isset($imagen) ? $imagen : "",
                "fecha" => isset($fecha) ? $fecha : ""
            ],

            "mensajes" => $this->mensajes
        ];


        include_once '../vistas/addEntradasAdmin.php';
    }

/**
 * funcion para eliminar un registro entradas de usuarios y mandar la informacion a la vista
 */

 public function delEntradasUser() {
    
    if (isset($_GET['id']) && (is_numeric($_GET['id']))) {
      $id = $_GET["id"];
      $resultModelo = $this->modelo->delEntradas($id);
     
      if ($resultModelo["correcto"]) :
        $this->mensajes[] = [
            "tipo" => "success",
            "mensaje" => "Se eliminó correctamente la entrada $id"
        ];
      else :
        $this->mensajes[] = [
            "tipo" => "danger",
            "mensaje" => "La eliminación de la entrada no se realizó correctamente!! :( <br/>({$resultModelo["error"]})"
        ];
      endif;
    } else { 
      $this->mensajes[] = [
          "tipo" => "danger",
          "mensaje" => "No se pudo acceder al id de la entrada a eliminar!! :("
      ];
    }
    //Relizamos el listado de los usuarios
    $this->listarEntradasUser();
  }


/**
 * función para eliminar entradas de administrador y mandar la información a la vista
 */

 public function delEntradasAdmin() {
    
    if (isset($_GET['id']) && (is_numeric($_GET['id']))) {
      $id = $_GET["id"];
      $resultModelo = $this->modelo->delEntradas($id);
     
      if ($resultModelo["correcto"]) :
        $this->mensajes[] = [
            "tipo" => "success",
            "mensaje" => "Se eliminó correctamente la entrada $id"
        ];
      else :
        $this->mensajes[] = [
            "tipo" => "danger",
            "mensaje" => "La eliminación de la entrada no se realizó correctamente!! :( <br/>({$resultModelo["error"]})"
        ];
      endif;
    } else { 
      $this->mensajes[] = [
          "tipo" => "danger",
          "mensaje" => "No se pudo acceder al id de la entrada a eliminar!! :("
      ];
    }
    //Relizamos el listado de los usuarios
    $this->listarEntradas();
  }

/**
 * funcion que llama al modelo para realizar una actualizacion de entradas y manda la informacion al modelo
 * 
 */
public function actEntradas() {
        $errores = array();
    // variables de inicio
        $valtitulo = "";
        $valdescripcion = "";
        $valfecha="";
        $valimagen = "";
    
    // si se ha pulsado el boton de actualizar se genera todo el codigo dentro de la condicion
        if (isset($_POST['actualizar'])) { 
        
          $id = $_POST['id']; 
          $nuevotitulo = $_POST['newtitulo'];
          $nuevadescripcion  = $_POST['newdescripcion'];
          $nuevafecha=$_POST['newfecha'];
          $nuevaimagen = "";
    
          $imagen = NULL;
    
          //IMAGEN
            
      
            if (isset($_FILES["imagen"]) and (!empty($_FILES["imagen"]["tmp_name"]))){ 

                if (!is_dir("fotos")){ 

                    $carpeta = mkdir("fotos", 0777, true);

                } else {

                    $carpeta = true;
                }

                if ($carpeta){

                    $nombreImagen = $_FILES["imagen"]["name"];

                    $moverImagen = move_uploaded_file($_FILES["imagen"]["tmp_name"], "../fotos/".$nombreImagen);

                    $imagen = $nombreImagen;

                    if ($moverImagen){

                        $imgCargada = true;

                    } else {

                        $imgCargada = false;

                        $errores["imagen"] = "Error al cargar la imagen";

                    }

                }
            }

            $nuevaimagen = $imagen; 

         
          if (count($errores) == 0) {
            $resultModelo = $this->modelo->actEntradas([
                'id' => $id,
                'titulo' => $nuevotitulo,
                'imagen' => $nuevaimagen,
                'descripcion'=>$nuevadescripcion,
                'fecha'=>$nuevafecha
            ]);
            //lanzamos mensajes segun sean correctos o no
            if ($resultModelo["correcto"]) :
              $this->mensajes[] = [
                  "tipo" => "success",
                  "mensaje" => "El usuario se actualizó correctamente!! :)"
              ];
            else :
              $this->mensajes[] = [
                  "tipo" => "danger",
                  "mensaje" => "El usuario no pudo actualizarse!! :( <br/>({$resultModelo["error"]})"
              ];
            endif;
          } else {
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "Datos de registro de usuario erróneos!! :("
            ];
          }
    
          // valores para mostrar en el formulario
          $valtitulo = $nuevotitulo;
          $valimagen = $nuevaimagen;
          $valdescripcion=$nuevadescripcion;
          $valfecha=$nuevafecha;
        } else { 
          if (isset($_GET['id']) && (is_numeric($_GET['id']))) {
            $id = $_GET['id'];
            //Ejecutamos la consulta para obtener una entrada por su id
            $resultModelo = $this->modelo->listarEntrada($id);
           //se generan mensajes
            if ($resultModelo["correcto"]) :
              $this->mensajes[] = [
                  "tipo" => "success",
                  "mensaje" => "Los datos de la entrada se obtuvieron correctamente!! :)"
              ];
              $valtitulo = $resultModelo["datos"]["titulo"];
              $valimagen = $resultModelo["datos"]["imagen"];
              $valdescripcion=$resultModelo["datos"]["descripcion"];
              $valfecha=$resultModelo["datos"]["fecha"];
            else :
              $this->mensajes[] = [
                  "tipo" => "danger",
                  "mensaje" => "No se pudieron obtener los datos de la entrada!! :( <br/>({$resultModelo["error"]})"
              ];
            endif;
          }
        }
        //Preparamos un array con todos los valores que tendremos que rellenar en
        //la vista adduser: título de la página y campos del formulario
        $parametros = [
            "tituloventana" => "Base de Datos con PHP y PDO",
            "datos" => [
                "titulo" => $valtitulo,
                "imagen"    => $valimagen,
                "descripcion"=>$valdescripcion,
                "fecha"=>$valfecha
            ],
            "mensajes" => $this->mensajes
        ];
        //Mostramos la vista actuser
        include_once '../vistas/actEntradas.php';
      }
    
/**
 * generar un pdf para administrador
 * 
 */
public function generarPDFAdmin()
{

    //almacenamos los valores que vamos a mostrar en la vista
    $parametros = [

        "datos" => null,
        "mensajes" => [],
        "pagina"=>null,
        "num_paginas"=>null
    ];

    //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
    $resultModelo = $this->modelo->listarEntradas();

    //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
    if ($resultModelo["correcto"]) {
        $parametros["datos"] = $resultModelo["datos"];

        $this->mensajes[] = [
            "tipo" => "success",
            "mensaje" => "El listado se realizó correctamente"
        ];
    } else {

        // sino mostamos un mensaje de error
        $this->mensajes[] = [
            "tipo" => "danger",
            "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
        ];
    }
    //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
    $parametros["mensajes"] = $this->mensajes;
    //
    include_once '../includes/generarPdf.php'; //aqui vamos a visualizar los registros
}
/**
 * generar un pdf para user
 * 
 */
public function generarPDFUser()
{

    //almacenamos los valores que vamos a mostrar en la vista
    $parametros = [

        "datos" => null,
        "mensajes" => [],
        "pagina"=>null,
        "num_paginas"=>null
    ];

    //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
    $resultModelo = $this->modelo->listarEntradasUser();

    //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
    if ($resultModelo["correcto"]) {
        $parametros["datos"] = $resultModelo["datos"];

        $this->mensajes[] = [
            "tipo" => "success",
            "mensaje" => "El listado se realizó correctamente"
        ];
    } else {

        // sino mostamos un mensaje de error
        $this->mensajes[] = [
            "tipo" => "danger",
            "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
        ];
    }
    //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
    $parametros["mensajes"] = $this->mensajes;
    //
    include_once '../includes/generarPdf.php'; //aqui vamos a visualizar los registros
}


    //FUNCIONES DE LA TABLA LOGS

    public function listarTablaLogs()
    {

        //almacenamos los valores que vamos a mostrar en la vista
        $parametros = [

            "datos" => null,
            "mensajes" => [],
            "pagina"=>null,
            "numpaginas"=>null
        ];

        //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
        $resultModelo = $this->modelo->listarTablaLogs();

        //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
        if ($resultModelo["correcto"]) {
            $parametros["datos"] = $resultModelo["datos"];
            //paginacion
        
            $parametros["pagina"]=$resultModelo["pagina"];
            $parametros["numpagina"]=$resultModelo["numpagina"];

            $this->mensajes[] = [
                "tipo" => "success",
                "mensaje" => "El listado se realizó correctamente"
            ];
        } else {

            // sino mostamos un mensaje de error
            $this->mensajes[] = [
                "tipo" => "danger",
                "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
            ];
        }
        //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
        $parametros["mensajes"] = $this->mensajes;
        //
        include_once '../vistas/tablaLogs.php'; //aqui vamos a visualizar los registros
    }

    /**
     * generar pdf para la tabla logs
     */
    public function generarPDFTablaLogs()
{

    //almacenamos los valores que vamos a mostrar en la vista
    $parametros = [

        "datos" => null,
        "mensajes" => [],
        "pagina"=>null,
        "num_paginas"=>null
    ];

    //llamamos a la consulta que se aloja en un metodo de la clase modelo y guardamos el resultado en la variable
    $resultModelo = $this->modelo->listarTablaLogs();

    //si la consulta es correcta la guardamos en $parametros y mostramos un mensaje
    if ($resultModelo["correcto"]) {
        $parametros["datos"] = $resultModelo["datos"];

        $this->mensajes[] = [
            "tipo" => "success",
            "mensaje" => "El listado se realizó correctamente"
        ];
    } else {

        // sino mostamos un mensaje de error
        $this->mensajes[] = [
            "tipo" => "danger",
            "mensaje" => "El listado no pudo realizarse correctamente!! :( <br/>({$resultModelo["error"]})"
        ];
    }
    //ahora vamos a relacionar el array $parametros de mensajes con el array de $mensajes
    $parametros["mensajes"] = $this->mensajes;
    //
    include_once '../includes/generarPdfTablaLogs.php'; //aqui vamos a visualizar los registros
}

}
