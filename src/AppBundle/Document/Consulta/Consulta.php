<?php

namespace AppBundle\Document\Consulta;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento para mapear las consultas
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Consulta\ConsultaRepository")
 */
class Consulta {

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
    protected $sintomas;
    /**
     * @ODM\String
     */
    protected $peso;
    /**
     * @ODM\String
     */
    protected $estatura;
    /**
     * @ODM\String
     */
    protected $temperatura;
    /**
     * @ODM\String
     */
    protected $frecuenciaCardiaca;
    /**
     * @ODM\String
     */
    protected $presionAlta;
    /**
     * @ODM\String
     */
    protected $presionBaja;
    /**
     * @ODM\String
     */
    protected $observaciones;
    /**
     * @ODM\String
     */
    protected $estatus;
    /**
     * @ODM\EmbedOne(targetDocument="Tratamiento")
     */
    protected $tratamiento;
    /**
     * @ODM\ReferenceOne(targetDocument="AppBundle\Document\Medico\Medico")
     */
    protected $medico;


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
     * Set sintomas
     *
     * @param string $sintomas
     * @return self
     */
    public function setSintomas($sintomas)
    {
        $this->sintomas = $sintomas;
        return $this;
    }

    /**
     * Get sintomas
     *
     * @return string $sintomas
     */
    public function getSintomas()
    {
        return $this->sintomas;
    }

    /**
     * Set peso
     *
     * @param string $peso
     * @return self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
        return $this;
    }

    /**
     * Get peso
     *
     * @return string $peso
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set estatura
     *
     * @param string $estatura
     * @return self
     */
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;
        return $this;
    }

    /**
     * Get estatura
     *
     * @return string $estatura
     */
    public function getEstatura()
    {
        return $this->estatura;
    }

    /**
     * Set temperatura
     *
     * @param string $temperatura
     * @return self
     */
    public function setTemperatura($temperatura)
    {
        $this->temperatura = $temperatura;
        return $this;
    }

    /**
     * Get temperatura
     *
     * @return string $temperatura
     */
    public function getTemperatura()
    {
        return $this->temperatura;
    }

    /**
     * Set frecuenciaCardiaca
     *
     * @param string $frecuenciaCardiaca
     * @return self
     */
    public function setFrecuenciaCardiaca($frecuenciaCardiaca)
    {
        $this->frecuenciaCardiaca = $frecuenciaCardiaca;
        return $this;
    }

    /**
     * Get frecuenciaCardiaca
     *
     * @return string $frecuenciaCardiaca
     */
    public function getFrecuenciaCardiaca()
    {
        return $this->frecuenciaCardiaca;
    }

    /**
     * Set presionAlta
     *
     * @param string $presionAlta
     * @return self
     */
    public function setPresionAlta($presionAlta)
    {
        $this->presionAlta = $presionAlta;
        return $this;
    }

    /**
     * Get presionAlta
     *
     * @return string $presionAlta
     */
    public function getPresionAlta()
    {
        return $this->presionAlta;
    }

    /**
     * Set presionBaja
     *
     * @param string $presionBaja
     * @return self
     */
    public function setPresionBaja($presionBaja)
    {
        $this->presionBaja = $presionBaja;
        return $this;
    }

    /**
     * Get presionBaja
     *
     * @return string $presionBaja
     */
    public function getPresionBaja()
    {
        return $this->presionBaja;
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

    /**
     * Set estatus
     *
     * @param string $estatus
     * @return self
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
        return $this;
    }

    /**
     * Get estatus
     *
     * @return string $estatus
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * Set tratamiento
     *
     * @param AppBundle\Document\Consulta\Tratamiento $tratamiento
     * @return self
     */
    public function setTratamiento(\AppBundle\Document\Consulta\Tratamiento $tratamiento)
    {
        $this->tratamiento = $tratamiento;
        return $this;
    }

    /**
     * Get tratamiento
     *
     * @return AppBundle\Document\Consulta\Tratamiento $tratamiento
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * Set medico
     *
     * @param AppBundle\Document\Medico\Medico $medico
     * @return self
     */
    public function setMedico(\AppBundle\Document\Medico\Medico $medico)
    {
        $this->medico = $medico;
        return $this;
    }

    /**
     * Get medico
     *
     * @return AppBundle\Document\Medico\Medico $medico
     */
    public function getMedico()
    {
        return $this->medico;
    }
}
