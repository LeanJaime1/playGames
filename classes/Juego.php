<?php




class Juego
{
    private int $id;
    private string $titulo;
    private array $generos;
    private bool $exclusivo_de_ps;
    private int $lanzamiento;
    private Plataforma $plataforma;
    private float $precio;
    private string $img;
    private string $descripcion;


    private static $createValues = ['id', 'titulo', 'exclusivo_de_ps', 'lanzamiento', 'precio', 'img', 'descripcion'];
   

    

    //methods

    /**
     * Devuelve una instancia del objeto Juego, con todas sus propiedades configuradas.
     * @return Juego
     */
    private static function createJuego($juegoData): Juego
    {

        $juego = new self();




        foreach (self::$createValues as $value) {
            $juego->{$value} = $juegoData[$value];
        }



        $juego->plataforma = Plataforma::plataforma_x_id($juegoData['plataforma_id']);

        $GIds = !empty($juegoData['generos']) ? explode(",", $juegoData['generos']) : [];

        $generos = [];

        foreach ($GIds as $GId) {
            $generos[] = Genero::genero_x_id($GId);
        }

        $juego->generos = $generos;

        return $juego;
    }


    /**
     * Devuelve el catálogo completo.
     * @return Juego[] Un array de objetos Juego.
     */
    public static function catalogo_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT juego.*, GROUP_CONCAT(gxj.genero_id) AS generos 
                 FROM juego 
                 LEFT JOIN genero_x_juego AS gxj ON juego.id = gxj.juego_id 
                 GROUP BY juego.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $catalogo = [];

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createJuego($result);
        }

        return $catalogo;
    }

    /**
     * Devuelve el catálogo de productos de una plataforma en particular.
     * @param string $plataforma_nombre Un string con la plataforma a buscar.
     * @return Juego[] Un array lleno de instancias de objeto Juego.
     */
    public static function catalogo_x_plataforma(string $plataforma_nombre): array
    {
        $conexion = Conexion::getConexion();


        $query = "SELECT juego.*, GROUP_CONCAT(gxj.genero_id) AS generos
                  FROM juego
                  LEFT JOIN genero_x_juego AS gxj ON juego.id = gxj.juego_id
                  INNER JOIN plataforma ON juego.plataforma_id = plataforma.id
                  WHERE plataforma.nombre = ?
                  GROUP BY juego.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$plataforma_nombre]);

        $catalogo = [];
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createJuego($result);
        }

        return $catalogo;
    }



    /**
     * Devuelve los datos de un producto en particular.
     * @param int $id El Id único del producto a mostrar.
     * @return ?Juego devuelve un objeto Juego o null.
     */
    public static function juego_x_id(int $id): ?Juego
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT juego.* , GROUP_CONCAT(gxj.genero_id) AS generos 
                  FROM juego 
                  LEFT JOIN genero_x_juego AS gxj 
                  ON juego.id = gxj.juego_id 
                  WHERE juego.id = ?
                  GROUP BY juego.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$id]);

        $result = self::createJuego($PDOStatement->fetch());

        return $result ?? null;
    }


    /**
     * Devuelve el catálogo de productos de una fecha en particular.
     * @return Juego[] Un array lleno de instancias de objeto Juego.
     */
    public static function juegos_x_fecha(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT juego.*, GROUP_CONCAT(gxj.genero_id) AS generos 
                  FROM juego 
                  LEFT JOIN genero_x_juego AS gxj ON juego.id = gxj.juego_id 
                  WHERE juego.lanzamiento > 2024
                  GROUP BY juego.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $catalogo = [];
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createJuego($result);
        }

        return $catalogo;
    }


    /**
     * Devuelve el catálogo de productos exclusivos de Ps.
     * @return Juego[] Un array lleno de instancias de objeto Juego.
     */
    public static function juegos_x_exclusividad(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT juego.*, GROUP_CONCAT(gxj.genero_id) AS generos 
                  FROM juego 
                  LEFT JOIN genero_x_juego AS gxj ON juego.id = gxj.juego_id 
                  WHERE juego.exclusivo_de_ps = 1
                  GROUP BY juego.id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $catalogo = [];
        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createJuego($result);
        }

        return $catalogo;
    }

    /**
     * Devuelve el precio de la unidad, formateado correctamente.
     * 
     */
    public function precio_formateado()
    {
        return "$" . number_format($this->precio, 2, ",", ".");
    }


    /**
     *Se encarga de retornar las primeras palabras de un párrafo.
     * @param string $texto es el párrafo a reducir.
     * @param int $cantidad es la cantidad de palabras a extraer. De no existir se asumirá 20.
     * @return string la cantidad de palabras solicitadas sumado a un (...) concatenado al final, en caso de que lo requiera.
     */
    function recortar_palabras(string $texto, int $cantidad = 20): string
    {

        $parrafo = explode(" ", $texto);

        if (count($parrafo) <= $cantidad) {
            return $texto;
        } else {
            $palabrasRecortadas = array_slice($parrafo, 0, $cantidad);

            $resultado = implode(" ", $palabrasRecortadas) . "...";

            return $resultado;
        }
    }

    /**
     * Devuelve el catálogo de productos de genero en particular.
     * @param int $generoID Un string con el genero a buscar.
     * @return Juego[] Un array lleno de instancias de objeto Juego.
     */
    public static function catalogo_x_genero(int $generoID): array
    {
        $conexion = Conexion::getConexion();


        $query = "SELECT juego.*, GROUP_CONCAT(gxj.genero_id) AS generos
                  FROM juego
                  LEFT JOIN genero_x_juego AS gxj ON juego.id = gxj.juego_id
                  WHERE gxj.genero_id = ?
                  GROUP BY juego.id";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$generoID]);

        $catalogo = [];

        while ($result = $PDOStatement->fetch()) {
            $catalogo[] = self::createJuego($result);
        }

        return $catalogo;
    }


    /**
     * Inserta un nuevo Juego en la DB
     * @param string $titulo Título del juego.
     * @param int $exclusivo_de_ps Indica si es exclusivo.
     * @param int $lanzamiento Año de lanzamiento.
     * @param int $plataforma_id ID de la plataforma.
     * @param float $precio Precio del juego.
     * @param string $img Ruta o nombre del archivo de imagen.
     * @param string $descripcion Texto descriptivo del juego.
     * @return int El Id del juego recién insertado.
     */
    public static function insert(
        string $titulo,
        int $exclusivo_de_ps,
        int $lanzamiento,
        int $plataforma_id,
        float $precio,
        string $img,
        string $descripcion
    ): int {

        $conexion = Conexion::getConexion();


        $query = "INSERT INTO juego (`titulo`, `exclusivo_de_ps`, `lanzamiento`, `plataforma_id`, `precio`, `img`, `descripcion`) 
                  VALUES (:titulo, :exclusivo_de_ps, :lanzamiento, :plataforma_id, :precio, :img, :descripcion)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'titulo'           => $titulo,
            'exclusivo_de_ps'  => $exclusivo_de_ps,
            'lanzamiento'      => $lanzamiento,
            'plataforma_id'    => $plataforma_id,
            'precio'           => $precio,
            'img'              => $img,
            'descripcion'      => $descripcion
        ]);

        return $conexion->lastInsertId();
    }

    /**
     * Crea un vinculo entre un Juego y un género.
     * @param int $juego_id
     * @param int $genero_id
     * 
     */
    public static function add_generos(int $juego_id, int $genero_id)
    {

        $conexion = Conexion::getConexion();
        $query = "INSERT INTO genero_x_juego VALUES (NULL, :juego_id, :genero_id)";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'juego_id' => $juego_id,
            'genero_id' => $genero_id
        ]);
    }


    /**
     * Vaciar lista de géneros.
     */
    public function clear_generos()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM genero_x_juego WHERE juego_id = :juego_id";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([
            'juego_id' => $this->id
        ]);
    }

    /**
     * Get the value of géneros.
     */
    public function getGeneros()
    {
        return $this->generos;
    }

    /**
     * Devuelve un array compuesto por IDs de todos los géneros.
     */
    public function getGeneros_ids()
    {

        $result = [];
        foreach ($this->generos as $value) {
            $result[] = intval($value->getId());
        }

        return $result;
    }



    /**
     * Edita los datos de un Juego en la BBDD.
     * @param string $titulo Título del juego.
     * @param int $exclusivo_de_ps Indica si es exclusivo.
     * @param int $lanzamiento Año de lanzamiento.
     * @param int $plataforma_id ID de la plataforma.
     * @param float $precio Precio del juego.
     * @param string $img Ruta o nombre del archivo de imagen.
     * @param string $descripcion Texto descriptivo del juego.
     */
    public function edit($titulo, $exclusivo_de_ps, $lanzamiento, $plataforma_id, $precio, $img, $descripcion)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE juego
                  SET titulo = :titulo, exclusivo_de_ps = :exclusivo_de_ps, lanzamiento = :lanzamiento, plataforma_id = :plataforma_id, precio = :precio, img = :img, descripcion = :descripcion
                  WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        return $PDOStatement->execute([
            'titulo'           => $titulo,
            'exclusivo_de_ps'  => $exclusivo_de_ps,
            'lanzamiento'      => $lanzamiento,
            'plataforma_id'    => $plataforma_id,
            'precio'           => $precio,
            'img'              => $img,
            'descripcion'      => $descripcion,
            'id'               => $this->id
        ]);
    }


    /**
     * Elimina esta instancia de la BBDD.
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM juego WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->execute([$this->id]);
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }


    /**
     * Get the value of exclusivo_de_ps 
     */
    public function getExclusivo_de_ps()
    {
        return $this->exclusivo_de_ps;
    }


    /**
     * Set the value of exclusivo_de_ps
     *
     * @return  self
     */
    public function setExclusivo_de_ps($exclusivo_de_ps)
    {
        $this->exclusivo_de_ps = $exclusivo_de_ps;

        return $this;
    }

    /**
     * Get the value of lanzamiento
     */
    public function getLanzamiento()
    {
        return $this->lanzamiento;
    }

    /**
     * Set the value of lanzamiento
     *
     * @return  self
     */
    public function setLanzamiento($lanzamiento)
    {
        $this->lanzamiento = $lanzamiento;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }


    /**
     * Get the value of plataforma 
     */
    public function getPlataforma()
    {
        return $this->plataforma;
    }
}
