<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 31/03/16
 * Time: 2:24 AM
 */

namespace AppBundle\Document\Medico;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento embebido para mapear el horario del médico
 *
 * @ODM\EmbeddedDocument
 */
class Horario {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\Date
     */
    protected $fecha;
    /**
     * @ODM\Date
     */
    protected $horarioInicio;
    /**
     * @ODM\Date
     */
    protected $horarioFin;
    /**
     * @ODM\String
     */
    protected $estado;
    /**
     * @ODM\String
     */
    protected $consultorio;

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
     * Set horarioInicio
     *
     * @param date $horarioInicio
     * @return self
     */
    public function setHorarioInicio($horarioInicio)
    {
        $this->horarioInicio = $horarioInicio;
        return $this;
    }

    /**
     * Get horarioInicio
     *
     * @return date $horarioInicio
     */
    public function getHorarioInicio()
    {
        return $this->horarioInicio;
    }

    /**
     * Set horarioFin
     *
     * @param date $horarioFin
     * @return self
     */
    public function setHorarioFin($horarioFin)
    {
        $this->horarioFin = $horarioFin;
        return $this;
    }

    /**
     * Get horarioFin
     *
     * @return date $horarioFin
     */
    public function getHorarioFin()
    {
        return $this->horarioFin;
    }
}
