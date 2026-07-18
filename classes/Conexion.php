<?php

/**
 * Clase para proveer la conexión de PDO al proyecto.
 */
class Conexion
{
    private const DB_HOST = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_NAME = 'playgames_db';
    private const DB_DSN = 'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8mb4';

    private static ?PDO $db = null;

    /**
     * Devuelve una conexion PDO lista para usar.
     */
    public static function conectar()
    {

        try {

            self::$db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS);
        } catch (Exception $e) {
            die('Error al conectar con MySQL.');
        }
    }



    /**
     * Método que chequea si yo tengo una conexión activa y la devuelve. De lo contrario establece una conexión PDO, la guarda en la clase de manera estática y la devuelve.
     * @return PDO
     */
    public static function getConexion()
    {
        if (self::$db === null) {
            self::conectar();
        }

        return self::$db;
    }
}
