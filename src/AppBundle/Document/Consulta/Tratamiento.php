<?php

namespace AppBundle\Document\Consulta;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido para mapear el tratamiento de una consulta
 *
 * @ODM\EmbeddedDocument
 */
class Tratamiento {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\EmbedMany(targetDocument="TratamientoMedicamento")
     */
    protected $medicamentos;
    /**
     * @ODM\EmbedMany(targetDocument="TratamientoRecomendacion")
     */
    protected $recomendaciones;

    public function __construct()
    {
        $this->medicamentos = new ArrayCollection();
        $this->recomendaciones = new ArrayCollection();
    }


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
     * Add medicamento
     *
     * @param AppBundle\Document\Consulta\TratamientoMedicamento $medicamento
     */
    public function addMedicamento(\AppBundle\Document\Consulta\TratamientoMedicamento $medicamento)
    {
        $this->medicamentos[] = $medicamento;
    }

    /**
     * Remove medicamento
     *
     * @param AppBundle\Document\Consulta\TratamientoMedicamento $medicamento
     */
    public function removeMedicamento(\AppBundle\Document\Consulta\TratamientoMedicamento $medicamento)
    {
        $this->medicamentos->removeElement($medicamento);
    }

    /**
     * Get medicamentos
     *
     * @return \Doctrine\Common\Collections\Collection $medicamentos
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * Add recomendacione
     *
     * @param AppBundle\Document\Consulta\TratamientoRecomendacion $recomendacione
     */
    public function addRecomendacione(\AppBundle\Document\Consulta\TratamientoRecomendacion $recomendacione)
    {
        $this->recomendaciones[] = $recomendacione;
    }

    /**
     * Remove recomendacione
     *
     * @param AppBundle\Document\Consulta\TratamientoRecomendacion $recomendacione
     */
    public function removeRecomendacione(\AppBundle\Document\Consulta\TratamientoRecomendacion $recomendacione)
    {
        $this->recomendaciones->removeElement($recomendacione);
    }

    /**
     * Get recomendaciones
     *
     * @return \Doctrine\Common\Collections\Collection $recomendaciones
     */
    public function getRecomendaciones()
    {
        return $this->recomendaciones;
    }
}
