<?php

/*
 *obtener_nombre_receta(cod_rec)-> string
obtener_tipo_receta(cod_rec)-> string
obtener_preparacion_receta(cod_rec)-> string
obtener_presentacion_receta(cod_rec)-> string
obtener_ingredientes_receta(cod_rec) 
 */

/**
 * Description of ingredientes
 *
 * @author pc
 */
class Ingredientes 
{
    private $cantidad;
    private $cod_ing;
    private $cod_rec;
    private $nombre;
    private $unidad;
    
    function __construct($row) {
        $this->cantidad = $row['cantidad'];
        $this->cod_ing = $row['cod_ing'];
        $this->cod_rec = $row['cod_rec'];
        $this->nombre = $row['nombre'];
        $this->unidad = $row['unidad'];
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getCod_ing() {
        return $this->cod_ing;
    }

    function getCod_rec() {
        return $this->cod_rec;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getUnidad() {
        return $this->unidad;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setCod_ing($cod_ing) {
        $this->cod_ing = $cod_ing;
    }

    function setCod_rec($cod_rec) {
        $this->cod_rec = $cod_rec;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setUnidad($unidad) {
        $this->unidad = $unidad;
    }


    
    
}
