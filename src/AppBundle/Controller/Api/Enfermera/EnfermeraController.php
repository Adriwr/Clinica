<?php


namespace AppBundle\Controller\Api\Enfermera;

use AppBundle\Document\User\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class EnfermeraController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de productos
     * El arreglo generado alimenta la tabla "Productos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('enfermera');
    }

    /**
     * Accion para obtener las citas del paciente
     * @return array
     */
    public function cgetCitasAction()
    {
       $usuarios =   $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->findAll();
        $citas = array();

        foreach ($usuarios as $usuario) {
            if(($paciente = $usuario->getPaciente()) !=null){
                foreach ($paciente->getCitas() as $cita) {
                    $citaAux = array(
                        "id" => $cita->getId(),
                        "nombre" => $paciente->getNombre()." ".$paciente->getApellidos(),
                        "consultorio" => $cita->getConsultorio(),
                        "medico" => $cita->getMedico(),
                        "fecha" => $cita->getFecha()
                    );
                    $citas[] = $citaAux;
                }
            }
        }
        return $citas;
    }
}

