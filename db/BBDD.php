<?php

/**
 * Class BBDD
 * AUTHOR Javier Sanz Roa
 * Date 05/03/2020
 * contiene todas las funciones que sacan información de la base de datos
 */
class BBDD
{
    public const HOST="localhost";
    public const US="root";
    public const PW="";
    public const BBDD="tienda_music";
    public $bbdd;

    /**
     * BBDD constructor.
     * @throws Exception muestra mensaje de error en el intento de conexión con la BBDD
     */
    public function __construct()
    {
        $this->bbdd = new mysqli();
        try {
            $this->bbdd->connect(self::HOST, self::US, self::PW, self::BBDD);
            $this->bbdd->query("SET NAMES 'utf8'");
        } catch (Exception $e) {
            $this->bbdd = null;
            throw new Exception ("Error de conexión".$e->getMessage());
        }
    }

    /**
     * cierra la conexión a la BBDD
     */
    public function __destruct()
    {
        $this->bbdd->close();
        $this->bbdd=null;
    }

    /**
     * @param $user (nombre de usuario pasado a través de formulario)
     * @param $password (contraseña introducida por el usuario en el formulario)
     * @return bool true en caso de usuario validado, false en caso de que la validación sea errónea
     */
    public function validateUser ($user, $password) {
        $validated=false;
        $passwordhash=hash('md5',$password);
        $sql=$this->bbdd->query("SELECT user, password FROM users WHERE user LIKE '$user' AND password LIKE '$passwordhash'");

        if ($sql->num_rows==1) {
            $validated=true;
        } else {
            $validated=false;
        }
        return $validated;
    }

    /**
     * @param $user
     * @return bool true en caso de que el usuario pasado como parámetro no esté duplicado, false en caso contrario
     */
    public function validateDuplicateUser ($user) {
        $validated=true;
        $sql=$this->bbdd->query("SELECT user FROM users WHERE user LIKE '$user'");

        if ($sql->num_rows==1) {
            $validated=false;
        }
        return $validated;
    }

    /**
     * @param $email
     * @return bool true en caso de que el email pasado como parámetro no esté duplicado, false en caso contrario
     */
    public function validateDuplicateEmail ($email) {
        $validated=true;
        $sql=$this->bbdd->query("SELECT email FROM users WHERE user LIKE '$email'");

        if ($sql->num_rows==1) {
            $validated=false;
        }
        return $validated;
    }

    /**
     * Valida que no se introduzcan valores repetidos en la base de datos para el listado de canciones de un CD
     * @param $numero (valor que ocupa una canción en el listado de un album)
     * @param $cod_cd (código del álbum)
     * @return bool
     */
    public function validateSongs ($numero,$cod_cd) {
        $validated=false;
        $sql=$this->bbdd->query("SELECT numero FROM canciones WHERE cod_cd LIKE '$cod_cd' AND numero LIKE '$numero'");

        if ($sql->num_rows>=1) {
            $validated=true;
        }
        return $validated;
    }

    /** Valida que haya canciones de un álbum en la base de datos
     * @param $cod_cd
     * @return bool
     */
    public function hayCanciones ($cod_cd) {
        $validated=false;
        $sql=$this->bbdd->query("SELECT numero FROM canciones WHERE cod_cd LIKE '$cod_cd'");

        if ($sql->num_rows>=1) {
            $validated=true;
        }
        return $validated;
    }

    /**
     * Valida que no haya otro artista con el mismo nombre que el pasado como parámetro
     * @param $nombre (nombre del artista cuyo nombre se quiere validar)
     * @return bool (true si no hay ya un artista con ese nombre, false en caso contrario)
     */
    public function validateSinger ($nombre) {
        $validated=true;
        $sql=$this->bbdd->query("SELECT nombre FROM artistas WHERE nombre LIKE '$nombre'");

        if ($sql->num_rows>=1) {
            $validated=false;
        }
        return $validated;
    }

    /**
     * @param User $user
     * inserta un usuario nuevo en la base de datos
     */
    public function uploadUser (User $user) {
        $nombre=$user->getUser();
        $clave=$user->getClave();
        $clavehash=hash('md5',$clave);
        $email=$user->getEmail();

        $sql=$this->bbdd->query("INSERT INTO users (user, password, email) VALUES ('$nombre', '$clavehash', '$email')");
    }

    /**
     * @param Artista $artist (objeto artista con sus campos ya validados)
     * sube los datos de un artista a la base de datos
     */
    public function uploadSinger (Artista $artist) {
        if ($artist instanceof Artista) {
            $nombre=$artist->getNombre();
            $descp=$artist->getDescripcion();
            $sql=$this->bbdd->query("INSERT INTO artistas (nombre, descripcion) VALUES ('$nombre', '$descp')");
        }
    }

    public function uploadSong (Cancion $cancion) {
        if ($cancion instanceof Cancion) {
            $nombre=$cancion->getNombre();
            $numero=$cancion->getNumero();
            $cd=$cancion->getCD();
            $sql=$this->bbdd->query("INSERT INTO canciones(nombre_pista, cod_cd, numero) VALUES (\"$nombre\", '$cd', '$numero')");
        }
    }

    /**
     * @return array multidimensional con los códigos asociados a cada género y sus respectivos nombres
     */
    public function selectGenre () {
        $ret=null;

        $sql=$this->bbdd->query("SELECT cod_genero, nombre_genero FROM genero");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_genero'], "NOMBRE" => $valor['nombre_genero']);
        }
        return $ret;
    }

    /**
     * @return array multidimensional con los códigos asociados a los artistas y sus respectivos nombres
     */
    public function selectArtistas () {
        $ret=[];

        $sql=$this->bbdd->query("SELECT cod_artista, nombre FROM artistas");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_artista'], "ARTISTA" => $valor['nombre']);
        }
        return $ret;
    }

    /**
     * @param $cod (código del género musical cuyo nombre deseamos saber)
     * @return mixed|string (nombre del género musical correspondiente al código pasado)
     */
    public function nombreGenero ($cod) {
        $nombre="";
        $sql=$this->bbdd->query("SELECT nombre_genero FROM genero WHERE cod_genero LIKE '$cod'");

        foreach ($sql as $valor) {$nombre=$valor['nombre_genero'];}

        return $nombre;
    }

    /**
     * @return array (array multidimensional con los códigos asociados a los CD y sus respectivos nombres)
     */
    public function selectDiscos () {
        $ret=[];

        $sql=$this->bbdd->query("SELECT cod_cd, titulo FROM cd");

        foreach ($sql as $indice => $valor) {
            $ret[]=array("COD" => $valor['cod_cd'], "TITULO" => $valor['titulo']);
        }
        return $ret;
    }


    /**
     * @param $cod (código del CD que se desea eliminar)
     * elimina los datos de un CD de la base de datos
     */
    public function borrarDisco ($cod) {
        $sql=$this->bbdd->query("DELETE FROM cd WHERE cod_cd LIKE '$cod'");
    }

    /**
     * valida si la imagen pasada está duplicada, para no subir duplicaciones a la base de datos
     * @param $img (ruta de la imagen a validar)
     * @return bool (true si no hay duplicados, false en caso contrario)
     */
    public function validarRuta ($img) {
        $validado=true;
        $sql=$this->bbdd->query("SELECT portada FROM cd");

        foreach ($sql as $valor) {if ($valor['portada']==$img) {$validado=false;}}

        return $validado;
    }

    /**
     * sube la información de un CD a la base de datos
     * @param CD $cd (objeto cd con toda su información)
     * @return bool|string
     */
    public function subirCD (CD $cd) {
        $correcto=false;
        if ($cd instanceof CD) {
            $portada=$cd->getPortada();
            if ($this->validarRuta($portada)==true) {
                $titulo=$cd->getTitulo();
                $fecha=$cd->getFecha();
                $portada=$cd->getPortada();
                $precio=$cd->getPrecio();
                $codA=$cd->getCodArtista();
                $codG=$cd->getCodGenero();
                $sql=$this->bbdd->query("INSERT INTO cd (titulo,fecha_lanz, portada, precio, cod_artista, cod_genero) 
                                     VALUES (\"$titulo\", '$fecha', '$portada', '$precio', '$codA','$codG')");
                if ($sql==true) {
                    $correcto=true;
                }
            } else {$correcto=false;}
        } else {$correcto=false;}
        return $correcto;
    }

    /**
     * @param $user (se le pasa un nombre de usuario)
     * @return int|mixed (devuelve el número de compras que ha realizado)
     */
    public function getCompras ($user) {
        $compras=0;
        $sql=$this->bbdd->query("SELECT n_cd FROM users WHERE user LIKE '$user'");

        foreach ($sql as $valor) { $compras=$valor['n_cd']; }

        return $compras;
    }

    /**
     * Devuellve el nombre de un CD
     * @param $cod (código del CD cuyo nombre deseamos saber)
     * @return mixed|string (nombre del CD cuyo código ha sido pasado como parámetro)
     */
    public function getNombreCD ($cod) {
        $nombre="";
        $sql=$this->bbdd->query("SELECT titulo FROM cd WHERE cod_cd LIKE '$cod'");

        foreach ($sql as $valor) {$nombre=$valor['titulo'];}
        return $nombre;
    }

    /* funciones de saldo*/
    /**
     * @param $user (se le pasa un usuario)
     * @return int|mixed (devuelve el saldo del que dispone en el momento)
     */
    public function getSaldo ($user) {
        $saldo=0;
        $sql=$this->bbdd->query("SELECT saldo FROM users WHERE user LIKE '$user'");

        foreach ($sql as $valor) { $saldo=$valor['saldo']; }

        return $saldo;
    }

    /**
     * @param $user (usuario al que se la va a añadir saldo)
     * @param $money (cantidad a añadir)
     * añade saldo a la cuenta de usuario con la que se ha iniciado sesión
     */
    public function addSalary ($user,$money) {
        if (isset($user)) {
            $saldo_previo=$this->getSaldo($user);
            if (is_numeric($money)) {
                $saldo_nuevo=$saldo_previo+$money;
                $this->bbdd->query("UPDATE users SET saldo='$saldo_nuevo' WHERE user LIKE '$user'");
            }
        }
    }

    public function updateSalary ($user, $money) {
        $this->bbdd->query("UPDATE users SET saldo='$money' WHERE user LIKE '$user'");
    }

    public function getPrecioCD ($cod_cd) {
        $precio=0;

        $sql=$this->bbdd->query("SELECT precio FROM cd WHERE cod_cd LIKE '$cod_cd'");

        foreach ($sql as $valor) {$precio=$valor['precio'];}
        return $precio;
    }

    /**
     * @param $user (nombre de usuario)
     * @return mixed|string (número de compras actual del usuario pasado como parámetro)
     */
    public function obtainCompras ($user) {
        $compras="";
        $sql=$this->bbdd->query("SELECT n_cd FROM users WHERE user LIKE '$user'");

        foreach ($sql as $valor) {$compras=$valor['n_cd'];}

        return $compras;
    }

    /**
     * @param $cod_cd (código del cd cuyas ventas se van a actualizar)
     * suma uno a la ventas de un cd
     */
    public function updateVentas ($cod_cd, $user) {
        $ventas=0;
        $comprasUser=$this->obtainCompras($user); //obtenemos las compras del usuario

        $sql=$this->bbdd->query("SELECT n_ventas FROM cd WHERE cod_cd LIKE '$cod_cd'");

        foreach ($sql as $valor) {$ventas=$valor['n_ventas'];}
        $mas_ventas=$ventas+1;
        $n_compras=$comprasUser+1;

        $actualizacion=$this->bbdd->query("UPDATE cd SET n_ventas='$mas_ventas' WHERE cod_cd LIKE $cod_cd");
        $actualizacionCompras=$this->bbdd->query("UPDATE users SET n_cd='$n_compras' WHERE user LIKE '$user'");
    }

    /**
     * @param $cod_cd (código del CD cuya información sobre las canciones queremos obtener
     * @return array|null (devuelve un array multidimensional con la numeración y nombres del cd deseado)
     */
  public function dataCancion ($cod_cd) {
        $ret=null;
        $sql=$this->bbdd->query("SELECT numero, nombre_pista FROM canciones WHERE cod_cd='$cod_cd' ORDER BY numero");

        foreach ($sql as $valor) {$ret[]=array("NUM" => $valor['numero'], "PISTA" => $valor['nombre_pista']);}

        return $ret;
  }


    /**
     * @return array (devuelve un array con los códigos de los cds en catálogo)
     */
    public function listadoCodigos () {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cod_cd FROM cd");

        foreach ($sql as $valor) {
            $ret[]=$valor['cod_cd'];
        }
        return $ret;
    }

    /**
     * @param int $cod_genero (código del género cuyos discos se quiere sacar los códigos)
     * @return array (array con los códigos de los discos del género deseado)
     */
    public function listadoCodGenero (int $cod_genero) {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cod_cd FROM cd WHERE cod_genero LIKE '$cod_genero'");

        foreach ($sql as $valor) {
            $ret[]=$valor['cod_cd'];
        }
        return $ret;
    }

    public function listadoGeneros () {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cod_genero, nombre_genero FROM genero");

        foreach ($sql as $valor) {
            $ret[]=array("COD" => $valor['cod_genero'], "NOMBRE" => $valor['nombre_genero']);
        }
        return $ret;
    }

    /**
     * @param array $cod (array con códigos de cd)
     * @return array (array multidimensional que contiene array con código, título y portada de cd)
     */
    public function obtenerDatosBasicos (array $cod) {
        $ret=[];

        foreach ($cod as $valor) {
            $sql=$this->bbdd->query("SELECT titulo, portada, cod_artista FROM cd WHERE cod_cd LIKE '$valor'");
            foreach ($sql as $data) {
                $ret[]=array("COD" => $valor, "TITULO" => $data['titulo'], "PORTADA" => $data['portada'],
                    "ARTISTA" => $data['cod_artista']);
            }
        }
        return $ret;
    }

    /**
     * @param $cod_cd
     * @param $cod_artist
     * @return array|mixed (devuelve array con los datos a mostrar en la tabla de la página de compra)
     */
    public function obtenerDatosTabla ($cod_cd, $cod_artist) {
        $ret=[];
        $sql=$this->bbdd->query("SELECT cd.fecha_lanz, cd.n_ventas, artistas.nombre, artistas.descripcion FROM cd 
                                  JOIN artistas WHERE cod_cd='$cod_cd' AND artistas.cod_artista='$cod_artist'");

        foreach ($sql as $valor) {
            $ret=$valor;
        }
        return $ret;
    }

    public function obtenerDatosCompra ($cod_cd) {
        $ret=[];
        $sql=$this->bbdd->query("SELECT portada, titulo, precio FROM cd WHERE cod_cd LIKE '$cod_cd'");

        foreach ($sql as $valor) {$ret=$valor;}

        return $ret;
    }

    /**
     * @return mixed|string (devuelve el último CD insertado en la bbdd)
     */

    public function lastAlbum () {
        $cd="";
        $sql=$this->bbdd->query("SELECT titulo FROM cd WHERE cod_cd=(SELECT max(cod_cd) FROM cd)");

        foreach ($sql as $valor) {$cd=$valor['titulo'];}
        return $cd;
    }

    /**
     * @return mixed|string (devuelve la última canción introducida en la bbdd)
     */
    public function lastSong () {
        $song="";
        $sql=$this->bbdd->query("SELECT nombre_pista FROM canciones WHERE cod_cancion=(SELECT max(cod_cancion) FROM canciones)");

        foreach ($sql as $valor) {$song=$valor['nombre_pista'];}
        return $song;
    }

    /**
     * @return mixed|string (devuelve el último artista introducido en la bbdd)
     */
    public function lastArtist () {
        $artist="";
        $sql=$this->bbdd->query("SELECT nombre FROM artistas WHERE cod_artista=(SELECT max(cod_artista) FROM artistas)");

        foreach ($sql as $valor) {$artist=$valor['nombre'];}
        return $artist;
    }
}