<?php

namespace AppBundle\Document\Producto;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear los pacientes
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
     * @ODM\Int
     */
    protected $stock;




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
     * Set stock
     *
     * @param int $stock
     * @return self
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * Get stock
     *
     * @return int $stock
     */
    public function getStock()
    {
        return $this->stock;
    }
}
