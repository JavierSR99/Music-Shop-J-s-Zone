<?php
/**
 * Class App
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * Contiene las funciones de gestión de la aplicación dependiendo de dónde esté el usuario y funciones de creación de
 * elementos dinámicos según la información que les llegue
 */

class App
{
    /**
     * @param User $user
     * @return bool true si se han confirmado las validaciones y se ha subido el usuario a la bbdd
     * @throws Exception
     */
    public function validacionFinalUser (User $user) {
        $subido=false;
        $nombre=$user->getUser();
        $email=$user->getEmail();
        $bbdd = new BBDD();

        //valida duplicados
        $duplicatedUser=$bbdd->validateDuplicateUser($nombre);
        $duplicatedEmail=$bbdd->validateDuplicateEmail($email);

        //si no están duplicados...
        if ($duplicatedUser==true && $duplicatedEmail==true) {
            //se suben los datos a la bbdd
            $bbdd->uploadUser($user);
            $subido=true;
        }
        return $subido;
    }

    /**
     * @param $saldo (saldo del que dispone un usuario)
     * @param $precio (precio del CD que desea comprar el usuario)
     * @return bool (true si el usuario dispone del saldo para adquirir un CD, false en caso contrario)
     */
    public function validarCompra ($saldo, $precio) {
        $validada=false;

        if ($saldo>$precio) {
            $validada=true;
        } else {
            $validada=false;
        }
        return $validada;
    }

    /**
     * @return string (etiquetas option de los géneros musicales cuyo value es su código)
     * @throws Exception
     */
    public function mostrarSelectGeneros () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectGenre();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'>$valor[NOMBRE]</option>";
        }
        return $select;
    }

    public function mostrarSelectArtistas () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectArtistas();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'>$valor[ARTISTA]</option>";
        }
        return $select;
    }

    public function mostrarSelectCD () {
        $select="";
        $bbdd = new BBDD();
        $datos=$bbdd->selectDiscos();

        foreach ($datos as $valor) {
            $select.="<option value='$valor[COD]'>$valor[TITULO]</option>";
        }
        return $select;
    }

    public function mostrarListadoGeneros () {
        $bbdd = new BBDD();
        $listado=$bbdd->listadoGeneros();

        $html="";
        foreach ($listado as $valor) {
            $html.="<li><button class='btn' name='gen' value='$valor[COD]'>$valor[NOMBRE]</button></li>";
        }
        return $html;
    }

    /**
     * genera la estructura de la página de catálogo
     * @return string
     * @throws Exception
     */
    public function mostrarCatalogo () {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodigos();
        $info=$bbdd->obtenerDatosBasicos($cod);

        foreach ($info as $valor) {
            $html.="<div class='col-4 text-center p-3'><img class='portada'  src=\"$valor[PORTADA]\" alt='portada'/>
                      <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[TITULO]</button>
                      <input type='hidden' name='artist' value=\"$valor[ARTISTA]\">
                      <input type='hidden' name='func' value='5' /></form></div>";
        }
        return $html;
    }

    public function mostrarCatalogoGenero ($genero) {
        $html="";
        $bbdd = new BBDD();
        $cod=$bbdd->listadoCodGenero($genero);
        $info=$bbdd->obtenerDatosBasicos($cod);
        $nombreGenero=$bbdd->nombreGenero($genero);

        $html="<div class='col-12 text-center'><h1>$nombreGenero</h1></div>";
        foreach ($info as $valor) {
            $html.="<div class='col-4 text-center p-3'><img class='portada'  src=\"$valor[PORTADA]\" alt='portada'/>
                      <form><button class='btn' name='ver' value=\"$valor[COD]\">$valor[TITULO]</button>
                      <input type='hidden' name='artist' value=\"$valor[ARTISTA]\">
                      <input type='hidden' name='func' value='5' /></form></div>";
        }
        return $html;
    }

    /**
     * @param array $datos (array con los datos a mostrar en la tabla)
     * @return string (fila en código html de los datos de la tabla)
     */
    public function mostrarDatosTablaCompra (array $datos) {
        $html="";

        //recorremos el array de datos recibidos y creamos las celdas de la tabla
        foreach ($datos as $valor) {
            $html.="<td>$valor</td>";
        }
        return $html;
    }

    public function mostrarInfoCompra (array $datos) {
        $html="";

        for ($i=0; $i<=2; $i++) {
            switch ($i) {
                case 0:
                    $html.="<div class='col-4'><img class='portada' src='$datos[portada]' alt='portada'/></div>";
                    break;
                case 1:
                    $html.="<div class='col-6 text-center mt-5'> <h1>$datos[titulo]</h1>";
                    break;
                case 2:
                    $html.="<h6>$datos[precio]€</h6>";
                    break;
            }
        }
        return $html;
    }

    public function mostrarTablaCanciones ($cod_cd) {
        $html="";
        $bbdd = new BBDD();
        $canciones=$bbdd->dataCancion($cod_cd);

        foreach ($canciones as $valor) {
            $html.="<tr><td>$valor[NUM]</td><td>$valor[PISTA]</td></tr>";
        }

        return $html;
    }

    /**
     * @return string (devuelve en código html un título secundario del último cd añadido a la bbdd)
     * @throws Exception
     */
    public function mostrarLastAlbum () {
        $html="";
        $bbdd = new BBDD();
        $album=$bbdd->lastAlbum();
        $html="<h5>Último CD subido: $album</h5>";
        return $html;
    }

    /**
     * @return string (devuelve en código html un título secundario de la última canción añadida a la bbdd)
     * @throws Exception
     */
    public function mostrarLastSong () {
        $html="";
        $bbdd = new BBDD();
        $song=$bbdd->lastSong();
        $html="<h5>Última canción subida: $song</h5>";
        return $html;
    }

    /**
     * @return string (devuelve en código html un título secundario del último artista añadido a la bbdd)
     * @throws Exception
     */
    public function mostrarLastArtist () {
        $html="";
        $bbdd = new BBDD();
        $artist=$bbdd->lastArtist();
        $html="<h5>Último artista subid@: $artist</h5>";
        return $html;
    }



    /**
     * gestiona la aplicación cuando no se está logueado
     * @throws Exception
     */
    public function logueo () {
        $user=$_REQUEST['user']??null;
        $password=$_REQUEST['password']??null;
        $email=$_REQUEST['email']??null;
        $btnRegistro=$_REQUEST['btnRegistro']??null;
        $registro=$_REQUEST['registro']??null;
        $bbdd = new BBDD();
        $vista = new Vista();

        /* registro */
        //si se han mandado los datos de registro
        if (isset($registro) && $registro==true) {
            $newUser = new User($user, $password, $email);
            //limpiamos los campos de user y email
            $userLimpio = $newUser->limpiarDato($user);
            $emailLimpio = $newUser->limpiarDato($email);
            $newUser->setNombre($userLimpio);
            $newUser->setEmail($emailLimpio);

            //se validan duplicados y en caso de no haber duplicados, se guarda el nuevo usuario
            $subida=$this->validacionFinalUser($newUser);

            if ($subida==true) {
                $_SESSION['login']="$userLimpio";
                $btnRegistro=null;
            }
        }
        //si se pulsa el enlace de "¿No tienes cuenta?" carga el formulario de registro
        if (isset($btnRegistro)) {
            $vista->printCabecera();
            $vista->printRgistro();
        }

        /** comprobación de usuario en caso de haber introducido datos en el formulario de log in **/
        //si hemos enviado los datos del formulario
        if (isset($user) && isset($password) && !isset($registro)) {
            //validamos
            $validated=$bbdd->validateUser($user, $password);

            //si la validación es correcta
            if ($validated==true) {
                //si se ha accedido con el usuario administrador, se refleja en la sesión
                if ($user==="admin" || $user==="a") { $_SESSION['login']="admin";}
                else {
                    //se crea la sesión
                    $_SESSION['login']="$user";
                }
            }
        }
    }

    /**
     * Gestiona todo el movimiento entre ventanas una vez se ha completado el log in
     * @throws Exception
     */
    public function tienda () {
        $vista = new Vista();
        $func=$_REQUEST['func']??null;
        $money=$_REQUEST['money']??null; //manda saldo a añadir

        $vista->printCabecera();

        //si se ha conectado un administrador...
        if ($_SESSION['login']=="admin") {
            $vista->printEncabezadoAdmin();
            //dependiendo de la opción que seleccione el administrador, se pinta el código
            switch ($func) {
                case 0:
                    $vista->printInsertarCD();
                    break;
                case 1:
                    //si se ha seleccionado un CD para eliminarlo...
                    if (isset($_REQUEST['cd'])) {
                        $bbdd = new BBDD();
                        $bbdd->borrarDisco($_REQUEST['cd']);
                    }
                    $vista->printBorrarCD();
                    break;
                case 2:
                    //si se han enviado datos para subir un artista a la bbdd...
                    if (isset($_REQUEST['nartista'])) {$this->gestionArtista($_REQUEST['nartista'], $_REQUEST['descp']);}
                    $vista->printAddArtist();
                    break;
                case 3:
                    if (isset($_REQUEST['nsong']) && isset($_REQUEST['disco'])) {
                        $this->gestionCancion($_REQUEST['nsong'], $_REQUEST['number'],$_REQUEST['disco']);
                    }
                    $vista->printAddSong();
                    break;
            }
        } else { //si se conecta un usuario, accede a la tienda
            $vista->printEncabezado();
            switch ($func) {
                case 0:
                    $vista->printPagBienvenida();
                    break;
                case 1:
                    $vista->printPagCatalogo();
                    break;
                case 2:
                    $vista->printPagGeneros();
                    break;
                case 3:
                    //si se han enviado los datos para añadir saldo...
                    if (isset($money) && isset($_REQUEST['user']) && $_REQUEST['user']===$_SESSION['login']) {
                        $bbdd = new BBDD();
                        $bbdd->addSalary( $_REQUEST['user'],$money);
                    }
                    $vista->printSaldo();
                    break;
                case 5:
                    $vista->printPagCompra();
                    break;
            }
        }
    }

    /**
     * pinta por pantalla la interfaz inicial de log in, la que se muestra cuando entramos a la aplicación o cuando
     * hacemos log out
     */
    public function logIn() {
        $vista = new Vista();
        $vista->printCabecera();
        $vista->printLogIn();
    }


    /**
     * gestionamos la tabla que aparece en la página de compra
     * @throws Exception
     */
    public function gestionTablaCompra () {
        //si se han enviado datos..
        if (isset($_REQUEST['ver']) && isset($_REQUEST['artist'])) {
            $bbdd = new BBDD();
            //sacamos los datos correspondientes al CD
            $info=$bbdd->obtenerDatosTabla($_REQUEST['ver'], $_REQUEST['artist']);
            //y los metemos en una tabla
            $fila=$this->mostrarDatosTablaCompra($info);

        } else {$fila="";}
        return $fila;
    }

    /**
     * Gestiona la interfaz de compra de un CD y todo lo que conlleva
     * @return string
     * @throws Exception
     */
    public function gestionDatosCompra() {
        //si se ha pulsado el botón de compra..
        if (isset($_REQUEST['compra'])) {
            $bbdd = new BBDD();
            //validamos si el usuario dispone del saldo y gestiona la compra
            $saldo=$bbdd->getSaldo($_SESSION['login']);
            $precio=$bbdd->getPrecioCD($_REQUEST['ver']);
            $compra=$this->validarCompra($saldo, $precio);
        }

        //si se ha seleccionado un CD en la interfaz de selección de CD
        if (isset($_REQUEST['ver'])) {
            $bbdd = new BBDD();
            //obtenemos los datos de CD seleccionado y los mostramos
            $info=$bbdd->obtenerDatosCompra($_REQUEST['ver']);
            $datos=$this->mostrarInfoCompra($info);

            $datos.="<form action=\"index.php\" method=\"post\">
             <input type='hidden' name='func' value='5'> <input type='hidden' name='ver' value='$_REQUEST[ver]'>
             <input type='hidden' name='artist' value='$_REQUEST[artist]' >
            <button name=\"compra\" class=\"btn btn-warning\">Comprar</button></form>";

            //si se ha realizado la compra, actualizamos datos de ventas y compras
            if (isset($compra)) {
                if ($compra==true) {
                    $nuevo_saldo=$saldo-$precio;
                    $bbdd->updateSalary($_SESSION['login'],$nuevo_saldo);
                    $bbdd->updateVentas($_REQUEST['ver'], $_SESSION['login']);
                    $datos.="<h6 class='pt-2'>Compra realizada con éxito</h6></div>";
                } else {$datos.="<h6 class='pt-2' style='color: red'>No dispones del saldo suficiente para comprar este CD</h6></div>";}
            } else {
                $datos.="</div>";
            }


        }
        return $datos;
    }

    /**
     * Se gestiona la subida de un CD a la bbdd
     * @throws Exception
     */
    public function gestionSubidaCD () {
        //validamos que se hayan pasado datos y la portada sea una imagen jpg
        if (isset($_REQUEST['titulo']) &&
            ($_FILES['portada']['type'] == "image/jpeg")) {

            $cd = new CD($_REQUEST['titulo']??null,$_REQUEST['fecha']??null, $_FILES['portada']['tmp_name']??null
                ,$_REQUEST['precio']??null, $_REQUEST['artista']??null, $_REQUEST['genero']??null);



            $tituloV=$cd->limpiarDato($_REQUEST['titulo']); //limpiamos datos de código html y espacios en blanco
            $cd->setTitulo($tituloV);

            //guardamos la imagen en el directorio correspondiente
            @rename($_FILES['portada']['tmp_name'],"img/portadas/{$_FILES['portada']['name']}");
            @$foto="img/portadas/{$_FILES['portada']['name']}";
            @$foto=trim($foto);
            $cd->setNPortada($foto);

            //subimos los datos a la bbdd
            $bbdd = new BBDD();
            $bbdd->subirCD($cd);
        }
    }

    /**
     * Gestiona la subida de un artista a la bbdd
     * @param string $nombre
     * @param string $descrip
     * @throws Exception
     */
    public function gestionArtista (string $nombre, string $descrip) {
        $artist = new Artista($nombre, $descrip);
        $artist->validacionArtista(); //validaciones necesarias para la subida a la bbdd
        $bbdd = new BBDD();
        $bbdd->uploadSinger($artist);
    }

    /**
     * Gestiona la subida correcta o incorrecta de una canción a la bbdd
     * @param $nombre
     * @param $numero
     * @param $cd
     * @throws Exception
     */
    public function gestionCancion ($nombre, $numero, $cd) {
        //validamos el campo del nombre
        if (strlen($nombre)<=255) {
            $cancion = new Cancion($nombre, $numero, $cd);
            $bbdd = new BBDD();

            //validamos la posibilidad de que ya esté esa misma canción en la bbdd
            $validada=$bbdd->validateSongs($numero,$cd);
            if ($validada==false) {
                //limpiamos los datos y se sube a la bbdd
                $cancion->limpiarCancion($nombre);
                $bbdd->uploadSong($cancion);
            }
        }
    }

}
