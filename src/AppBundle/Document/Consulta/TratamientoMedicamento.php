<?php

namespace AppBundle\Document\Consulta;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento embebido para mapear los medicamentos de un tratamiento
 *
 * @ODM\EmbeddedDocument
 */
class TratamientoMedicamento {

    /**
     * @ODM\String
     */
    protected $nombre;
    /**
     * @ODM\String
     */
    protected $frecuencia;
    /**
     * @ODM\String
     */
    protected $duracion;
    /**
     * @ODM\String
     */
    protected $cantidad;


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
     * Set frecuencia
     *
     * @param string $frecuencia
     * @return self
     */
    public function setFrecuencia($frecuencia)
    {
        $this->frecuencia = $frecuencia;
        return $this;
    }

    /**
     * Get frecuencia
     *
     * @return string $frecuencia
     */
    public function getFrecuencia()
    {
        return $this->frecuencia;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     * @return self
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;
        return $this;
    }

    /**
     * Get duracion
     *
     * @return string $duracion
     */
    public function getDuracion()
    {
        return $this->duracion;
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
