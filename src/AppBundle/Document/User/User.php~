<?php

namespace AppBundle\Document\User;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(repositoryClass="AppBundle\Repository\User\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ODM\Id(strategy="auto")
     */
    protected $id;
    /**
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Gerente\Gerente")
     */
    protected $gerente;
    /**
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Medico\Medico")
     */
    protected $medico;
    /**
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Enfermera\Enfermera")
     */
    protected $enfermera;
    /**
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Paciente\Paciente")
     */
    protected $paciente;
    /**
     * @ODM\EmbedOne(targetDocument="AppBundle\Document\Cajero\Cajero")
     */
    protected $cajero;

    /**
     * Set gerente
     *
     * @param AppBundle\Document\Gerente\Gerente $gerente
     * @return self
     */
    public function setGerente(\AppBundle\Document\Gerente\Gerente $gerente)
    {
        $this->gerente = $gerente;
        return $this;
    }

    /**
     * Get gerente
     *
     * @return AppBundle\Document\Gerente\Gerente $gerente
     */
    public function getGerente()
    {
        return $this->gerente;
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

    /**
     * Set enfermera
     *
     * @param AppBundle\Document\Enfermera\Enfermera $enfermera
     * @return self
     */
    public function setEnfermera(\AppBundle\Document\Enfermera\Enfermera $enfermera)
    {
        $this->enfermera = $enfermera;
        return $this;
    }

    /**
     * Get enfermera
     *
     * @return AppBundle\Document\Enfermera\Enfermera $enfermera
     */
    public function getEnfermera()
    {
        return $this->enfermera;
    }

    /**
     * Set paciente
     *
     * @param AppBundle\Document\Paciente\Paciente $paciente
     * @return self
     */
    public function setPaciente(\AppBundle\Document\Paciente\Paciente $paciente)
    {
        $this->paciente = $paciente;
        return $this;
    }

    /**
     * Get paciente
     *
     * @return AppBundle\Document\Paciente\Paciente $paciente
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set cajero
     *
     * @param AppBundle\Document\Cajero\Cajero $cajero
     * @return self
     */
    public function setCajero(\AppBundle\Document\Cajero\Cajero $cajero)
    {
        $this->cajero = $cajero;
        return $this;
    }

    /**
     * Get cajero
     *
     * @return AppBundle\Document\Cajero\Cajero $cajero
     */
    public function getCajero()
    {
        return $this->cajero;
    }
}
