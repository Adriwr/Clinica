<?php


namespace AppBundle\Controller\Api\Cajero;

use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\Medico\Medico;
use AppBundle\Document\Pago\Pago;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use JMS\Serializer\SerializationContext;
use MongoDBODMProxies\__CG__\AppBundle\Document\Medicamento\Medicamento;
use Symfony\Component\HttpFoundation\Request;


class MedicamentoController extends FOSRestController implements ClassResourceInterface{

    /**
     * Acción para generar los datos de productos
     * El arreglo generado alimenta la tabla "Productos"
     *
     * @return array
     * @Rest\View()
     */
    public function cgetAction(){
        $medicamentos =  $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Medicamento\Medicamento' )
            ->getAll();
        $array = array();
        $counter = 0;
        foreach ($medicamentos as $medicamento){
            if($medicamento['existencias']>0) {
                $array[] = array(
                    'posicion' => $counter,
                    'id' => $medicamento["id"],
                    'nombreComercial' => $medicamento["nombreComercial"],
                    'precio' => "$".$medicamento["precio"],
                    'existencias' => $medicamento["existencias"],
                );
                $counter++;
            }
        }
        return $array;
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function postAction(Request$request){

        $medicamentos = $request->request->get('medicamentos');
        $monto = $request->request->get('monto');
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pago = new Pago();
        $pago->setConcepto("Compra de medicamentos");

        foreach ($medicamentos as $medicamento) {
            $med = $this->get( 'doctrine_mongodb' )->getManager()
                ->getRepository( 'AppBundle:Medicamento\Medicamento' )
                ->findOneBy(array('nombreComercial'=>$medicamento['nombreComercial']));
            $pago->addMedicamento($med);
            $med->setExistencias($med->getExistencias()-$medicamento['cantidad']);
            $dm->persist($med);
            $dm->flush();
        }
        $pago->setMonto($monto);
        $dm->persist($pago);
        $dm->flush();
        return array('mensaje'=>'La venta del medicamento se realizó satisfactoriamente');
    }
}

