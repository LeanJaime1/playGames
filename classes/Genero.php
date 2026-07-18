<?php

class Genero
{
    private int $id;
    private string $nombre;



    //methods

    /**
     * Devuelve el contenido completo.
     * @return Genero[] Un array de objetos Genero.
     */
    public static function genero_completo(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM genero";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute();

        $genero = $PDOStatement->fetchAll();

        return $genero;
    }

    /**
     * Devuelve el contenido un genero en particular.
     * @param int $id El id unico del genero a mostrar.
     * @return ?Genero Devuelve un objeto Genero o null.
     */
    public static function genero_x_id(int $id): ?Genero
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT * FROM genero WHERE id = ?";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
        $PDOStatement->execute([$id]);

        $resultado = $PDOStatement->fetch();

        return $resultado ?? null;
    }

    /**
     * 
     */
    public static function menu_x_genero(): array
    {
        $conexion = Conexion::getConexion();

        $query = "SELECT id, nombre FROM genero ORDER BY nombre ASC";


        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute();

        $lista = $PDOStatement->fetchAll();

        return $lista;
    }


    /**
     * Inserta un nuevo Género en la DB
     *  @param string $nombre Nombre del género.
     */
    public static function insert(string $nombre)
    {

        $conexion = Conexion::getConexion();

        $query = "INSERT INTO genero (`nombre`) 
                  VALUES (:nombre)";

        $PDOStatement = $conexion->prepare($query);

        return $PDOStatement->execute([
            'nombre' => $nombre
        ]);
    }


    /**
    ** Edita los datos de un Género en la BBDD.
    *  @param string $titulo Nombre del género.
    */
    public function edit($titulo){
        $conexion = Conexion::getConexion();
        $query = "UPDATE genero
                  SET nombre = :titulo
                  WHERE id = :id";
        
        $PDOStatement = $conexion->prepare($query);
        return $PDOStatement->execute([
            'titulo'           => $titulo,
            'id'               => $this->id
        ]);
    }

     /**
     * Elimina una instancia de la BBDD.
     */
    public function delete(){
        $conexion = Conexion::getConexion();
        $query = "DELETE FROM genero WHERE id = ?";

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
