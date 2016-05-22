<?php

namespace AppBundle\Document\Producto;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear los productos
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Producto\ProductoRepository")
 */
class Producto {
    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $nombre;
    /**
     * @ODM\Float
     */
    protected $precio;
    /**
     * @ODM\String
     */
    protected $laboratorio;
    /**
     * @ODM\Int
     */
    protected $existencias;
    /**
     * @ODM\String
     */
    protected $cantidad;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * Get precio
     *
     * @return float $precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set laboratorio
     *
     * @param string $laboratorio
     * @return self
     */
    public function setLaboratorio($laboratorio)
    {
        $this->laboratorio = $laboratorio;
        return $this;
    }

    /**
     * Get laboratorio
     *
     * @return string $laboratorio
     */
    public function getLaboratorio()
    {
        return $this->laboratorio;
    }

    /**
     * Set existencias
     *
     * @param int $existencias
     * @return self
     */
    public function setExistencias($existencias)
    {
        $this->existencias = $existencias;
        return $this;
    }

    /**
     * Get existencias
     *
     * @return int $existencias
     */
    public function getExistencias()
    {
        return $this->existencias;
    }

    /**
     * Set cantidad
     *
     * @param string $cantidad
     * @return self
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return string $cantidad
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
}
