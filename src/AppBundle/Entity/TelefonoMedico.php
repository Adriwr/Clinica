<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 27/04/16
 * Time: 8:00 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad para mapear la tabla de telefonos del medico
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TelefonoMedicoRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="medico_telefono")
 */
class TelefonoMedico {

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Medico", inversedBy="telefonos")
     * @ORM\JoinColumn(name="id_medico", referencedColumnName="id")
     */
    protected $idMedico;
    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $tipo;
    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $telefono;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return TelefonoMedico
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return TelefonoMedico
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set idMedico
     *
     * @param \AppBundle\Entity\Medico $idMedico
     * @return TelefonoMedico
     */
    public function setIdMedico(\AppBundle\Entity\Medico $idMedico = null)
    {
        $this->idMedico = $idMedico;

        return $this;
    }

    /**
     * Get idMedico
     *
     * @return \AppBundle\Entity\Medico 
     */
    public function getIdMedico()
    {
        return $this->idMedico;
    }
}
