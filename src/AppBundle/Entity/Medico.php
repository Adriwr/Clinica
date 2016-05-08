<?php
/**
 * Created by PhpStorm.
 * User: Adriwr
 * Date: 31/03/16
 * Time: 2:24 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Entidad para mapear la tabla de medicos
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedicoRepository")
 * @ORM\Table(name="medico")
 */
class Medico {

    /**
     * @ORM\Column(type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="medico")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     */
    protected $idUser;
    /**
     * @ORM\Column(type="string", length=14)
     */
    protected $rfc;
    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $cedulaProfesional;
    /**
     * @ORM\Column(type="string", length=75)
     * @Assert\NotBlank(message="Por favor introduzca el nombre del médico.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=75,
     *     minMessage="El nombre es muy corto.",
     *     maxMessage="El nombre es muy largo.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $nombre;
    /**
     * @ORM\Column(type="string", length=75)
     */
    protected $apellidos;
    /**
     * @ORM\Column(type="string", length=14)
     */
    protected $curp;
    /**
     * @ORM\Column(name="fecha_ingreso",type="datetimetz", nullable=true)
     */
    protected $fechaIngreso;
    /**
     * @ORM\OneToOne(targetEntity="Direccion" , cascade={"persist"})
     * @ORM\JoinColumn(name="direccion_id", referencedColumnName="id")
     */
    protected $direccion;
    /**
     * @ORM\OneToMany(targetEntity="EmailMedico", mappedBy="idMedico")
     */
    private $emails;
    /**
     * @ORM\OneToMany(targetEntity="TelefonoMedico", mappedBy="idMedico")
     */
    private $telefonos;

    public function __construct() {
        //parent::__construct();
        $this->emails = new ArrayCollection();
        $this->telefonos = new ArrayCollection();
        //$this->username = "-";
        //$this->enabled  = true;
        //$this->roles = array('ROLE_MEDICO');
    }


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
     * Set rfc
     *
     * @param string $rfc
     * @return Medico
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string 
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set cedulaProfesional
     *
     * @param string $cedulaProfesional
     * @return Medico
     */
    public function setCedulaProfesional($cedulaProfesional)
    {
        $this->cedulaProfesional = $cedulaProfesional;

        return $this;
    }

    /**
     * Get cedulaProfesional
     *
     * @return string 
     */
    public function getCedulaProfesional()
    {
        return $this->cedulaProfesional;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Medico
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Medico
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }
    /**
     * Set curp
     *
     * @param string $curp
     * @return Medico
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string 
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     * @return Medico
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime 
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    /**
     * Set direccion
     *
     * @param \AppBundle\Entity\Direccion $direccion
     * @return Medico
     */
    public function setDireccion(\AppBundle\Entity\Direccion $direccion = null)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return \AppBundle\Entity\Direccion 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Add emails
     *
     * @param \AppBundle\Entity\EmailMedico $emails
     * @return Medico
     */
    public function addEmail(\AppBundle\Entity\EmailMedico $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \AppBundle\Entity\EmailMedico $emails
     */
    public function removeEmail(\AppBundle\Entity\EmailMedico $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add telefonos
     *
     * @param \AppBundle\Entity\TelefonoMedico $telefonos
     * @return Medico
     */
    public function addTelefono(\AppBundle\Entity\TelefonoMedico $telefonos)
    {
        $this->telefonos[] = $telefonos;

        return $this;
    }

    /**
     * Remove telefonos
     *
     * @param \AppBundle\Entity\TelefonoMedico $telefonos
     */
    public function removeTelefono(\AppBundle\Entity\TelefonoMedico $telefonos)
    {
        $this->telefonos->removeElement($telefonos);
    }

    /**
     * Get telefonos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTelefonos()
    {
        return $this->telefonos;
    }

    /**
     * Set idUser
     *
     * @param \AppBundle\Entity\User $idUser
     * @return Medico
     */
    public function setIdUser(\AppBundle\Entity\User $idUser = null)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return \AppBundle\Entity\User 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}
