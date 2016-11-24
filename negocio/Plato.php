<?php
    require_once '../datos/Conexion.clase.php';
class Plato extends Conexion{
    public function listar() {
        try {
            $sql = " select * from plato order by 2";
            $sentencia = $this->dblink->prepare($sql);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (Exception $exc) {
            throw $exc;
        }
    }
    
    public function obtenerFoto($codigoPlato){
        $foto = "../imagenes/".$codigoPlato;
        
        if (file_exists($foto . ".png")) {
            $foto = $foto . ".png";
        }else if (file_exists($foto . ".PNG")){
            $foto = $foto . ".PNG";
        }else if (file_exists($foto . ".jpg")){
            $foto = $foto . ".jpg";
        }else if (file_exists($foto . ".JPG")){
            $foto = $foto . ".JPG";
        }else{
            $foto = "none";
        }
        
        if ($foto == "none") {
            return $foto;
        }else{
            return Funciones::$DIRECCION_WEB_SERVICE . $foto;
        }
    }
    
}
