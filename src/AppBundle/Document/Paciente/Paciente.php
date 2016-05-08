<?php

namespace AppBundle\Document\Paciente;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Documento para mapear los pacientes
 *
 * @ODM\Document(repositoryClass="AppBundle\Repository\Paciente\PacienteRepository")
 */
class Paciente {
    /**
     * @ODM\Id
     */
    protected $id;

}
