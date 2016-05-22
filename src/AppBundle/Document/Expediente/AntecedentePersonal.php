<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el expediente para almacenar la información de antecedentes personales del paciente
 *
 * @ODM\EmbeddedDocument
 */
class AntecedentePersonal {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $frecuenciaBano;
    /**
     * @ODM\String
     */
    protected $cambiosRopa;
    /**
     * @ODM\String
     */
    protected $personasCasa;
    /**
     * @ODM\String
     */
    protected $serviciosCasa = array();
    /**
     * @ODM\String
     */
    protected $alimentacion;
    /**
     * @ODM\Boolean
     */
    protected $fuma;
    /**
     * @ODM\Boolean
     */
    protected $alcohol;
    /**
     * @ODM\Boolean
     */
    protected $drogas;


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
     * Set frecuenciaBano
     *
     * @param string $frecuenciaBano
     * @return self
     */
    public function setFrecuenciaBano($frecuenciaBano)
    {
        $this->frecuenciaBano = $frecuenciaBano;
        return $this;
    }

    /**
     * Get frecuenciaBano
     *
     * @return string $frecuenciaBano
     */
    public function getFrecuenciaBano()
    {
        return $this->frecuenciaBano;
    }

    /**
     * Set cambiosRopa
     *
     * @param string $cambiosRopa
     * @return self
     */
    public function setCambiosRopa($cambiosRopa)
    {
        $this->cambiosRopa = $cambiosRopa;
        return $this;
    }

    /**
     * Get cambiosRopa
     *
     * @return string $cambiosRopa
     */
    public function getCambiosRopa()
    {
        return $this->cambiosRopa;
    }

    /**
     * Set personasCasa
     *
     * @param string $personasCasa
     * @return self
     */
    public function setPersonasCasa($personasCasa)
    {
        $this->personasCasa = $personasCasa;
        return $this;
    }

    /**
     * Get personasCasa
     *
     * @return string $personasCasa
     */
    public function getPersonasCasa()
    {
        return $this->personasCasa;
    }

    /**
     * Set serviciosCasa
     *
     * @param string $serviciosCasa
     * @return self
     */
    public function setServiciosCasa($serviciosCasa)
    {
        $this->serviciosCasa = $serviciosCasa;
        return $this;
    }

    /**
     * Get serviciosCasa
     *
     * @return string $serviciosCasa
     */
    public function getServiciosCasa()
    {
        return $this->serviciosCasa;
    }

    /**
     * Set alimentacion
     *
     * @param string $alimentacion
     * @return self
     */
    public function setAlimentacion($alimentacion)
    {
        $this->alimentacion = $alimentacion;
        return $this;
    }

    /**
     * Get alimentacion
     *
     * @return string $alimentacion
     */
    public function getAlimentacion()
    {
        return $this->alimentacion;
    }

    /**
     * Set fuma
     *
     * @param boolean $fuma
     * @return self
     */
    public function setFuma($fuma)
    {
        $this->fuma = $fuma;
        return $this;
    }

    /**
     * Get fuma
     *
     * @return boolean $fuma
     */
    public function getFuma()
    {
        return $this->fuma;
    }

    /**
     * Set alcohol
     *
     * @param boolean $alcohol
     * @return self
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;
        return $this;
    }

    /**
     * Get alcohol
     *
     * @return boolean $alcohol
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * Set drogas
     *
     * @param boolean $drogas
     * @return self
     */
    public function setDrogas($drogas)
    {
        $this->drogas = $drogas;
        return $this;
    }

    /**
     * Get drogas
     *
     * @return boolean $drogas
     */
    public function getDrogas()
    {
        return $this->drogas;
    }
}
