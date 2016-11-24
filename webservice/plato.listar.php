<?php

require_once '../negocio/Plato.php';
require_once '../util/funciones/Funciones.clase.php';

try {
    $obj = new Plato();
    $resultado = $obj->listar();
    
    $listarPlato = array();
    for ($i=0; $i<count($resultado);$i++){
        /*Obtener foto articulo*/
            $foto = $obj->obtenerFoto($resultado[$i]["codigo_plato"]);
            /*Obtener foto articulo*/
            
            $datosArticulo = array
                    (
                        "codigo" => $resultado[$i]["codigo_plato"],
                        "nombre" => $resultado[$i]["nombre"],
                        "precio" => $resultado[$i]["precio_venta"],
                        "foto" => $foto
                    );
            $listaArticulo[$i] = $datosArticulo;
        }
        
        Funciones::imprimeJSON(200,"",$listaArticulo);
    }
   
 catch (Exception $exc) {
    Funciones::imprimeJSON(500, $exc->getMessage(), "");
}
