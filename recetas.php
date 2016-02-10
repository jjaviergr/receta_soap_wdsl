<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recetas
 *
 * @author pc
 */
class Recetas {

    private $codigo_rec;
    private $nombre;
    private $preparacion;
    private $presentacion;
    private $tipo;
    private $ingredientes;
    
    function __construct($row,$ing) {
        $this->codigo_rec = $row['cod_rec'];
        $this->nombre = $row['nombre'];
        $this->preparacion = $row['tipo'];
        $this->presentacion = $row['preparacion'];
        $this->tipo = $row['presentacion'];
        $this->ingredientes=$ing;
    }
    function getIngredientes() {
        return $this->ingredientes;
    }

    function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }

        function getCodigo_rec() {
        return $this->codigo_rec;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPreparacion() {
        return $this->preparacion;
    }

    function getPresentacion() {
        return $this->presentacion;
    }

    function getTipo() {
        return $this->tipo;
    }

    function setCodigo_rec($codigo_rec) {
        $this->codigo_rec = $codigo_rec;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPreparacion($preparacion) {
        $this->preparacion = $preparacion;
    }

    function setPresentacion($presentacion) {
        $this->presentacion = $presentacion;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}
