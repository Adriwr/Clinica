<?php

namespace AppBundle\Document\Expediente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * Documento embebido en el paciente para almacenar la información de su expediente
 *
 * @ODM\EmbeddedDocument
 */
class Expediente {

    /**
     * @ODM\Id
     */
    protected $id;
    /**
     * @ODM\EmbedMany(targetDocument="Enfermedad")
     */
    protected $enfermedadesCronicas;
    /**
     * @ODM\EmbedMany(targetDocument="AntecedenteFamiliar")
     */
    protected $antedecentesFamiliares;
    /**
     * @ODM\EmbedMany(targetDocument="Cirugia")
     */
    protected $cirugias;
    /**
     * @ODM\EmbedMany(targetDocument="Alergia")
     */
    protected $alergias;
    /**
     * @ODM\EmbedMany(targetDocument="Embarazo")
     */
    protected $embarazos;
    /**
     * @ODM\EmbedMany(targetDocument="AntecedentePersonal")
     */
    protected $antecedentesPersonales;
    /**
     * @ODM\EmbedMany(targetDocument="Anticonceptivo")
     */
    protected $anticonceptivos;
    /**
     * @ODM\EmbedMany(targetDocument="Mastografia")
     */
    protected $mastografias;

    /**
     * @ODM\EmbedMany(targetDocument="Papanicolaou")
     */
    protected $papanicolaous;
    /**
     * @ODM\ReferenceMany(targetDocument="AppBundle\Document\Consulta\Consulta")
     */
    protected $consultas;

    public function __construct()
    {
        $this->enfermedadesCronicas = new ArrayCollection();
        $this->antedecentesFamiliares = new ArrayCollection();
        $this->cirugias = new ArrayCollection();
        $this->alergias = new ArrayCollection();
        $this->embarazos = new ArrayCollection();
        $this->antecedentesPersonales = new ArrayCollection();
        $this->anticonceptivos = new ArrayCollection();
        $this->mastografias = new ArrayCollection();
        $this->papanicolaous = new ArrayCollection();
        $this->consultas = new ArrayCollection();
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
     * Add enfermedadesCronica
     *
     * @param AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica
     */
    public function addEnfermedadesCronica(\AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica)
    {
        $this->enfermedadesCronicas[] = $enfermedadesCronica;
    }

    /**
     * Remove enfermedadesCronica
     *
     * @param AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica
     */
    public function removeEnfermedadesCronica(\AppBundle\Document\Expediente\Enfermedad $enfermedadesCronica)
    {
        $this->enfermedadesCronicas->removeElement($enfermedadesCronica);
    }

    /**
     * Get enfermedadesCronicas
     *
     * @return \Doctrine\Common\Collections\Collection $enfermedadesCronicas
     */
    public function getEnfermedadesCronicas()
    {
        return $this->enfermedadesCronicas;
    }

    /**
     * Add antedecentesFamiliare
     *
     * @param AppBundle\Document\Expediente\AntecedenteFamiliar $antedecentesFamiliare
     */
    public function addAntedecentesFamiliare(\AppBundle\Document\Expediente\AntecedenteFamiliar $antedecentesFamiliare)
    {
        $this->antedecentesFamiliares[] = $antedecentesFamiliare;
    }

    /**
     * Remove antedecentesFamiliare
     *
     * @param AppBundle\Document\Expediente\AntecedenteFamiliar $antedecentesFamiliare
     */
    public function removeAntedecentesFamiliare(\AppBundle\Document\Expediente\AntecedenteFamiliar $antedecentesFamiliare)
    {
        $this->antedecentesFamiliares->removeElement($antedecentesFamiliare);
    }

    /**
     * Get antedecentesFamiliares
     *
     * @return \Doctrine\Common\Collections\Collection $antedecentesFamiliares
     */
    public function getAntedecentesFamiliares()
    {
        return $this->antedecentesFamiliares;
    }

    /**
     * Add cirugia
     *
     * @param AppBundle\Document\Expediente\Cirugia $cirugia
     */
    public function addCirugia(\AppBundle\Document\Expediente\Cirugia $cirugia)
    {
        $this->cirugias[] = $cirugia;
    }

    /**
     * Remove cirugia
     *
     * @param AppBundle\Document\Expediente\Cirugia $cirugia
     */
    public function removeCirugia(\AppBundle\Document\Expediente\Cirugia $cirugia)
    {
        $this->cirugias->removeElement($cirugia);
    }

    /**
     * Get cirugias
     *
     * @return \Doctrine\Common\Collections\Collection $cirugias
     */
    public function getCirugias()
    {
        return $this->cirugias;
    }

    /**
     * Add alergia
     *
     * @param AppBundle\Document\Expediente\Alergia $alergia
     */
    public function addAlergia(\AppBundle\Document\Expediente\Alergia $alergia)
    {
        $this->alergias[] = $alergia;
    }

    /**
     * Remove alergia
     *
     * @param AppBundle\Document\Expediente\Alergia $alergia
     */
    public function removeAlergia(\AppBundle\Document\Expediente\Alergia $alergia)
    {
        $this->alergias->removeElement($alergia);
    }

    /**
     * Get alergias
     *
     * @return \Doctrine\Common\Collections\Collection $alergias
     */
    public function getAlergias()
    {
        return $this->alergias;
    }

    /**
     * Add embarazo
     *
     * @param AppBundle\Document\Expediente\Embarazo $embarazo
     */
    public function addEmbarazo(\AppBundle\Document\Expediente\Embarazo $embarazo)
    {
        $this->embarazos[] = $embarazo;
    }

    /**
     * Remove embarazo
     *
     * @param AppBundle\Document\Expediente\Embarazo $embarazo
     */
    public function removeEmbarazo(\AppBundle\Document\Expediente\Embarazo $embarazo)
    {
        $this->embarazos->removeElement($embarazo);
    }

    /**
     * Get embarazos
     *
     * @return \Doctrine\Common\Collections\Collection $embarazos
     */
    public function getEmbarazos()
    {
        return $this->embarazos;
    }

    /**
     * Add antecedentesPersonale
     *
     * @param AppBundle\Document\Expediente\AntecedentePersonal $antecedentesPersonale
     */
    public function addAntecedentesPersonale(\AppBundle\Document\Expediente\AntecedentePersonal $antecedentesPersonale)
    {
        $this->antecedentesPersonales[] = $antecedentesPersonale;
    }

    /**
     * Remove antecedentesPersonale
     *
     * @param AppBundle\Document\Expediente\AntecedentePersonal $antecedentesPersonale
     */
    public function removeAntecedentesPersonale(\AppBundle\Document\Expediente\AntecedentePersonal $antecedentesPersonale)
    {
        $this->antecedentesPersonales->removeElement($antecedentesPersonale);
    }

    /**
     * Get antecedentesPersonales
     *
     * @return \Doctrine\Common\Collections\Collection $antecedentesPersonales
     */
    public function getAntecedentesPersonales()
    {
        return $this->antecedentesPersonales;
    }

    /**
     * Add anticonceptivo
     *
     * @param AppBundle\Document\Expediente\Anticonceptivo $anticonceptivo
     */
    public function addAnticonceptivo(\AppBundle\Document\Expediente\Anticonceptivo $anticonceptivo)
    {
        $this->anticonceptivos[] = $anticonceptivo;
    }

    /**
     * Remove anticonceptivo
     *
     * @param AppBundle\Document\Expediente\Anticonceptivo $anticonceptivo
     */
    public function removeAnticonceptivo(\AppBundle\Document\Expediente\Anticonceptivo $anticonceptivo)
    {
        $this->anticonceptivos->removeElement($anticonceptivo);
    }

    /**
     * Get anticonceptivos
     *
     * @return \Doctrine\Common\Collections\Collection $anticonceptivos
     */
    public function getAnticonceptivos()
    {
        return $this->anticonceptivos;
    }

    /**
     * Add mastografia
     *
     * @param AppBundle\Document\Expediente\Mastografia $mastografia
     */
    public function addMastografia(\AppBundle\Document\Expediente\Mastografia $mastografia)
    {
        $this->mastografias[] = $mastografia;
    }

    /**
     * Remove mastografia
     *
     * @param AppBundle\Document\Expediente\Mastografia $mastografia
     */
    public function removeMastografia(\AppBundle\Document\Expediente\Mastografia $mastografia)
    {
        $this->mastografias->removeElement($mastografia);
    }

    /**
     * Get mastografias
     *
     * @return \Doctrine\Common\Collections\Collection $mastografias
     */
    public function getMastografias()
    {
        return $this->mastografias;
    }

    /**
     * Add papanicolaous
     *
     * @param AppBundle\Document\Expediente\Papanicolaou $papanicolaous
     */
    public function addPapanicolaous(\AppBundle\Document\Expediente\Papanicolaou $papanicolaous)
    {
        $this->papanicolaous[] = $papanicolaous;
    }

    /**
     * Remove papanicolaous
     *
     * @param AppBundle\Document\Expediente\Papanicolaou $papanicolaous
     */
    public function removePapanicolaous(\AppBundle\Document\Expediente\Papanicolaou $papanicolaous)
    {
        $this->papanicolaous->removeElement($papanicolaous);
    }

    /**
     * Get papanicolaous
     *
     * @return \Doctrine\Common\Collections\Collection $papanicolaous
     */
    public function getPapanicolaous()
    {
        return $this->papanicolaous;
    }

    /**
     * Add consulta
     *
     * @param AppBundle\Document\Consulta\Consulta $consulta
     */
    public function addConsulta(\AppBundle\Document\Consulta\Consulta $consulta)
    {
        $this->consultas[] = $consulta;
    }

    /**
     * Remove consulta
     *
     * @param AppBundle\Document\Consulta\Consulta $consulta
     */
    public function removeConsulta(\AppBundle\Document\Consulta\Consulta $consulta)
    {
        $this->consultas->removeElement($consulta);
    }

    /**
     * Get consultas
     *
     * @return \Doctrine\Common\Collections\Collection $consultas
     */
    public function getConsultas()
    {
        return $this->consultas;
    }
}
