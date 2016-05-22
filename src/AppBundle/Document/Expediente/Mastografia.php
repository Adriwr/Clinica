<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de mastografias del paciente
 *
 * @ODM\EmbeddedDocument
 */
class Mastografia {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\Date
     */
    protected $fecha;
    /**
     * @ODM\String
     */
    protected $notas;


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
     * Set notas
     *
     * @param string $notas
     * @return self
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;
        return $this;
    }

    /**
     * Get notas
     *
     * @return string $notas
     */
    public function getNotas()
    {
        return $this->notas;
    }
}
