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
    
    public function __construct($row) {
        $this->cantidad = $row['cantidad'];
        $this->cod_ing = $row['cod_ing'];
        $this->cod_rec = $row['cod_rec'];
        $this->nombre = $row['nombre'];
        $this->unidad = $row['unidad'];
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getCod_ing() {
        return $this->cod_ing;
    }

    public function getCod_rec() {
        return $this->cod_rec;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getUnidad() {
        return $this->unidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setCod_ing($cod_ing) {
        $this->cod_ing = $cod_ing;
    }

    public function setCod_rec($cod_rec) {
        $this->cod_rec = $cod_rec;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setUnidad($unidad) {
        $this->unidad = $unidad;
    }


    
    
}
