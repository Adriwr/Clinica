<?php


namespace AppBundle\Controller\Api\Paciente;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class PacienteController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de los pacientes
     * El arreglo generado alimenta la tabla "Pacientes"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('paciente');
    }

    /**
     * Acción para generar los datos de las citas
     * El arreglo generado sirve para deshabilitar las citas que ya esten ocupadas
     *
     * @return array
     * @Rest\View()
     */
    public function getCitasAction(){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllAppointments();
    }

    /**
     * Acción para generar los datos de las citas
     * El arreglo generado sirve para deshabilitar las citas que ya esten ocupadas
     *
     * @return array
     * @Rest\View()
     */
    public function deleteCitaAction($id){
        $dm = $this->get('doctrine_mongodb')->getManager();
        $paciente = $this->getUser()->getPaciente();
        foreach($paciente->getCitas() as $cita){
            if($cita->getId() == $id){
                $citaEliminar = $cita;
            }
        }

        if($citaEliminar){
            $paciente->removeCita($citaEliminar);
            $dm->flush();

            return array("mensaje" => "La cita se ha eliminado");

        }


        return array("mensaje" => "Ocurrio algo inesperado");

    }

}

