<?php


namespace AppBundle\Controller\Api\Enfermera;

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

    public function cgetCitasAction()
    {
       $users =   $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->findAll();
        $citas = array('array'=>'array');
        foreach ($users as $usuario) {
            if(($paciente = $usuario->getPaciente())!=null){
                return $paciente;
            }
            $pacienteReal = $paciente->getPaciente();
            foreach ($pacienteReal->getCitas() as $cita) {
                $citas[] = $cita;
                return $cita;
            }
        }
        return $citas;
    }
}

