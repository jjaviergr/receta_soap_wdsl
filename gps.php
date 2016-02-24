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
class Gps {

    private $GLatitud;
    private $GLongitud;
    private $Fecha;
    private $Foto;

    public function __construct($row) {
        $this->GLatitud = $row['GLatitud'];
        $this->GLongitud = $row['GLongitud'];
        $this->Fecha = $row['Date'];
    }

//    public function __construct($GLatitud, $GLongitud, $Fecha) {
//        $this->GLatitud = $GLatitud;
//        $this->GLongitud = $GLongitud;
//        $this->Fecha = $Fecha;
//    }

    public function getGLatitud() {
        return $this->GLatitud;
    }

    public function getGLongitud() {
        return $this->GLongitud;
    }

    public function getFecha() {
        return $this->Fecha;
    }

    public function getFoto() {
        return $this->Foto;
    }

    public function setGLatitud($GLatitud) {
        $this->GLatitud = $GLatitud;
    }

    public function setGLongitud($GLongitud) {
        $this->GLongitud = $GLongitud;
    }

    public function setFecha($Fecha) {
        $this->Fecha = $Fecha;
    }

    public function setFoto($Foto) {
        $this->Foto = $Foto;
    }

    public static function getFechaHoy() {
        $hoy = getdate();
        //print_r($hoy);
        $cad=$hoy['mday'].'/'.$hoy['mon'].'/'.$hoy['year']." ".$hoy['hours'].":".$hoy['minutes'];
        return $cad;
    }
    
    public static function creaFecha($f)
    {
        $formato = '!d-m-Y H:i';
        $fecha = DateTime::createFromFormat($formato,$f);
        return $fecha;
    }

    /*
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
     */
}
