<?php


class Plataforma
{
    private int $id;
    private string $nombre;

    //methods

    /**
     * Devuelve el contenido completo.
     * @return Plataforma[] Un array de objetos Plataforma.
     */
    public static function plataforma_completa(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM plataforma";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $plataforma = $PDOStatement->fetchAll();

        return $plataforma;
    }

    /**
     * Devuelve el contenido una plataforma en particular.
     * @param int $id El id único de la plataforma a mostrar.
     * @return ?Plataforma Devuelve un objeto Plataforma o null.
     */
    public static function plataforma_x_id(int $id): ?Plataforma
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM plataforma WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $resultado = $PDOStatement->fetch();

        return $resultado ?? null;
    }


    /**
     * Devuelve un array asociativo con todas las plataformas para el menú de filtros.
     * @return array
     */
    public static function menu_x_plataforma(): array
    {
        $conexion = Conexion::getConexion();

    
        $query = "SELECT id, nombre FROM plataforma ORDER BY nombre ASC";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        return $PDOStatement->fetchAll();
    }

    
    /**
     * Inserta una nueva Plataforma en la DB
     *  @param string $nombre Nombre de la plataforma.
     */
    public static function insert(string $nombre)
    {

        $conexion = Conexion::getConexion();

        $query = "INSERT INTO plataforma (`nombre`) 
                  VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);

        return $PDOStatement->execute([
            'nombre' => $nombre
        ]);
    }

    /**
     ** Edita los datos de una Plataforma en la BBDD.
     *  @param string $nombre Nombre de la plataforma.
     */
    public function edit($nombre)
    {
        $conexion = Conexion::getConexion();
        $query = "UPDATE plataforma
                  SET nombre = :nombre
                  WHERE id = :id";

        $PDOStatement = $conexion->prepare($query);
        return $PDOStatement->execute([
            'nombre'           => $nombre,
            'id'               => $this->id
        ]);
    }

    /**
     * Elimina una instancia de la BBDD.
     */
    public function delete()
    {
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM plataforma WHERE id = ?";

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
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
}
