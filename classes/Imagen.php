<?php


class Imagen {

    /**
    *Sube una imagen a la BBDD. 
    *@param string $directorio El directorio en el que se va a guardar la img.
    * @param array $datosArchivo Los datos del archivo que queremos subir.
    * @return string $fileName El archivo que subimos.
    */
    public static function subirImagen($directorio, $datosArchivo): string {

        

        $og_name = explode(".", $datosArchivo['name']);
        $extension = end($og_name);
        $filename = time(). ".$extension";

        $fileUpload = move_uploaded_file(
            $datosArchivo['tmp_name'],
            "$directorio/$filename"
        );

        if (!$fileUpload){
            throw new Exception("No se pudo subir la imágen.");
        } else {
            return $filename;
        }


    }

    /**
    *Borra una imagen de la BBDD.
    *@param string $archivo El nombre del archivo a borrar de la BBDD.
    *@return bool Nos retorna un TRUE si el archivo fue eliminado con éxito. 
    * 
    */
    public static function borrarImagen( string $archivo): bool{


        if(file_exists($archivo)){
            $fileDelete = unlink($archivo);

            if(!$fileDelete){
                throw new Exception(("No se pudo eliminar la imagen."));
            } else {
                return TRUE;
            }
        } else{
                return FALSE;
            }
    }
}


