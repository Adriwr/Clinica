<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 31/03/16
 * Time: 2:24 AM
 */

namespace AppBundle\Document\Medicamento;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento embebido para mapear los activos de un medicamento
 *
 * @ODM\EmbeddedDocument
 */
class Activo {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $nombre;
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
