<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de las enfermedad cronicas del paciente
 *
 * @ODM\EmbeddedDocument
 */
class Enfermedad {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $codigoCie;
    /**
     * @ODM\String
     */
    protected $nombre;
    /**
     * @ODM\Date
     */
    protected $fecha;
    /**
     * @ODM\String
     */
    protected $tratada;
    /**
     * @ODM\String
     */
    protected $observaciones;


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
     * Set codigoCie
     *
     * @param string $codigoCie
     * @return self
     */
    public function setCodigoCie($codigoCie)
    {
        $this->codigoCie = $codigoCie;
        return $this;
    }

    /**
     * Get codigoCie
     *
     * @return string $codigoCie
     */
    public function getCodigoCie()
    {
        return $this->codigoCie;
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
     * Set fecha
     *
     * @param date $fecha
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Get fecha
     *
     * @return date $fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set tratada
     *
     * @param string $tratada
     * @return self
     */
    public function setTratada($tratada)
    {
        $this->tratada = $tratada;
        return $this;
    }

    /**
     * Get tratada
     *
     * @return string $tratada
     */
    public function getTratada()
    {
        return $this->tratada;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return self
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string $observaciones
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
}
