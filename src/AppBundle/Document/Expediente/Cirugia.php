<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de cirugias del paciente
 *
 * @ODM\EmbeddedDocument
 */
class Cirugia {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $tipo;
    /**
     * @ODM\Date
     */
    protected $fecha;
    /**
     * @ODM\String
     */
    protected $lugar;
    /**
     * @ODM\String
     */
    protected $estado;



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
     * Set tipo
     *
     * @param string $tipo
     * @return self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * Get tipo
     *
     * @return string $tipo
     */
    public function getTipo()
    {
        return $this->tipo;
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
     * Set lugar
     *
     * @param string $lugar
     * @return self
     */
    public function setLugar($lugar)
    {
        $this->lugar = $lugar;
        return $this;
    }

    /**
     * Get lugar
     *
     * @return string $lugar
     */
    public function getLugar()
    {
        return $this->lugar;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
        return $this;
    }

    /**
     * Get estado
     *
     * @return string $estado
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
