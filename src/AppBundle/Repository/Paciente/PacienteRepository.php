<?php

namespace AppBundle\Repository\Paciente;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * PacienteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PacienteRepository extends DocumentRepository
{
    /**
     * @return array
     */
    public function getAllAppointments()
    {
        $appoints = array();
        $appointGross = $this->createQueryBuilder()
            ->field('citas')->exists(true)
            ->select('citas')
            ->getQuery()
            ->execute();

        foreach($appointGross as $appoint) {
            $appoints[] = $appoint->getFecha();
        }

        return $appoints;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $pacientes = array();
        $pacientesGross = $this->createQueryBuilder()
            ->getQuery()
            ->execute();

        foreach($pacientesGross as $paciente) {
            $pacientes[] = array(
                'id'                => $paciente->getId(),
                'email'             => $paciente->getEmail(),
                'nombre'            => $paciente->getNombre(),
                'apellidos'         => $paciente->getApellidos(),
                'sexo'              => $paciente->getSexo(),
                'fechaNacimiento'    => $paciente->getFechaNacimiento()->format('d-m-Y'),
                'direccion'         => $paciente->getCalle()." ".$paciente->getNumero().", ".$paciente->getColonia().", ".$paciente->getEstado().", ".$paciente->getPais(),
                'telefonoParticular'=> $paciente->getTelefonoParticular(),
                'telefonoEmergencia'=> $paciente->getTelefonoEmergencia()
            );
        }

        return $pacientes;
    }
    
}