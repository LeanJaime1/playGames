<?php


class Compra
{
    
//methods


    /**
     * Devuelve las compras de un usuario en particular.
     * @param int $idUsuario El ID del usuario a mostrar.
     */
    public static function compras_x_idUsuario(int $idUsuario)
    {
        $conexion = Conexion::getConexion();
        $query = "
            SELECT
            compras.id,
            compras.fecha,
            GROUP_CONCAT(CONCAT(item_x_compra.cantidad, 'x' ,juego.titulo) SEPARATOR ', ') detalle
            
            FROM compras
            JOIN item_x_compra ON compras.id = item_x_compra.compra_id
            JOIN juego ON item_x_compra.item_id = juego.id
            
            WHERE compras.id_usuario = ?
            GROUP BY (compras.id);";

        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
        $PDOStatement->execute([$idUsuario]);

        $result = $PDOStatement->fetchAll();

        return $result ?? [];
    }
}
