<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de alergias del paciente
 *
 * @ODM\EmbeddedDocument
 */
class Alergia {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $sustancia;
    /**
     * @ODM\Boolean
     */
    protected $controlada;
    /**
     * @ODM\Date
     */
    protected $fechaDiagnostico;


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
     * Set sustancia
     *
     * @param string $sustancia
     * @return self
     */
    public function setSustancia($sustancia)
    {
        $this->sustancia = $sustancia;
        return $this;
    }

    /**
     * Get sustancia
     *
     * @return string $sustancia
     */
    public function getSustancia()
    {
        return $this->sustancia;
    }

    /**
     * Set controlada
     *
     * @param boolean $controlada
     * @return self
     */
    public function setControlada($controlada)
    {
        $this->controlada = $controlada;
        return $this;
    }

    /**
     * Get controlada
     *
     * @return boolean $controlada
     */
    public function getControlada()
    {
        return $this->controlada;
    }

    /**
     * Set fechaDiagnostico
     *
     * @param date $fechaDiagnostico
     * @return self
     */
    public function setFechaDiagnostico($fechaDiagnostico)
    {
        $this->fechaDiagnostico = $fechaDiagnostico;
        return $this;
    }

    /**
     * Get fechaDiagnostico
     *
     * @return date $fechaDiagnostico
     */
    public function getFechaDiagnostico()
    {
        return $this->fechaDiagnostico;
    }
}
