<?php

namespace AppBundle\Document\Paciente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear las citas
 *
 * @ODM\EmbeddedDocument
 */
class PacienteCitas {
    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $consultorio;
    /**
     * @ODM\String
     */
    protected $medico;
    /**
     * @ODM\Date
     */
    protected $fecha;

    /**
     * Set consultorio
     *
     * @param string $consultorio
     * @return self
     */
    public function setConsultorio($consultorio)
    {
        $this->consultorio = $consultorio;
        return $this;
    }

    /**
     * Get consultorio
     *
     * @return string $consultorio
     */
    public function getConsultorio()
    {
        return $this->consultorio;
    }

    /**
     * Set medico
     *
     * @param string $medico
     * @return self
     */
    public function setMedico($medico)
    {
        $this->medico = $medico;
        return $this;
    }

    /**
     * Get medico
     *
     * @return string $medico
     */
    public function getMedico()
    {
        return $this->medico;
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
}
