<?php


namespace AppBundle\Controller\Api\Medico;

use AppBundle\Document\Consulta\Tratamiento;
use AppBundle\Document\Consulta\TratamientoMedicamento;
use AppBundle\Document\Consulta\TratamientoRecomendacion;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\Request;


class MedicoController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos del obtener medico
     * El arreglo generado alimenta la tabla "Medicos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:User\User' )
            ->getAllUsers('medico');
    }

    /**
     * Acción para generar los datos de productos
     * El arreglo generado sirve para obtener el nombre de un medico en un horario y consultorio
     *
     * @return array
     * @Rest\View()
     */
    public function getNombreAction($fecha, $consultorio){
        return  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Medico\Medico' )
            ->getDoctorName($fecha, $consultorio);
    }

    /**
     * Acción para generar los datos de productos
     * El arreglo generado sirve para obtener el nombre de un medico en un horario y consultorio
     *
     * @return array
     * @Rest\View()
     */
    public function postTratamientoAction(Request $request){
        $dm = $this->get('doctrine_mongodb')->getManager();

        $tratamientoArray = $request->request->get('tratamiento');
        $medicamentos = $tratamientoArray['medicamentos'];
        $recomendaciones = $tratamientoArray['recomendaciones'];
        $idConsulta = $tratamientoArray['idConsulta'];
        $consulta = $dm->getRepository('AppBundle:Consulta\Consulta')->findOneById($idConsulta);

        $tratamiento = new Tratamiento();
        foreach($medicamentos as $medicamento){
            $mediDoc = new TratamientoMedicamento();
            $mediDoc->setNombre($medicamento['nombre']);
            $mediDoc->setCantidad($medicamento['cantidad']);
            $mediDoc->setDuracion($medicamento['duracion']);
            $mediDoc->setFrecuencia($medicamento['frecuencia']);
            $tratamiento->addMedicamento($mediDoc);
        }

        foreach($recomendaciones as $recomendacion){
            $recoDoc = new TratamientoRecomendacion();
            $recoDoc->setDuracion($recomendacion['duracion']);
            $recoDoc->setDescripcion($recomendacion['descripcion']);
            $tratamiento->addRecomendacione($recoDoc);
        }
        //return $tratamiento;
        $consulta->setTratamiento($tratamiento);
        $dm->persist($consulta);
        $dm->flush();

        return array("mensaje" => "El tratamiento se agrego a la consulta exitosamente");
    }

}

