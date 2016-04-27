<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 27/04/16
 * Time: 8:01 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Entidad para mapear la tabla de emails de medicos
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmailMedicoRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="medico_email")
 */
class EmailMedico {
    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="Medico", inversedBy="emails")
     * @ORM\JoinColumn(name="id_medico", referencedColumnName="id")
     */
    protected $idMedico;
    /**
     * @ORM\Column(type="string", length=30)
     */
    protected $tipo;
    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $email;



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
     * @return EmailMedico
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
     * Set email
     *
     * @param string $email
     * @return EmailMedico
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idMedico
     *
     * @param \AppBundle\Entity\Medico $idMedico
     * @return EmailMedico
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
