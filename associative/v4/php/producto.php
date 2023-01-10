<?php

class Producto {
    private $nombre;
    private $detalle;
    private $cantidad;
    private $precio;

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setDetalle($detalle) {
        $this->detalle = $detalle;
    }

    public function getdetalle() {
        return $this->detalle;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getcantidad() {
        return $this->cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getprecio() {
        return $this->precio;
    }
}