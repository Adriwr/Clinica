<?php

namespace AppBundle\Controller\Medicamento;


use AppBundle\Document\Medicamento\Medicamento;
use AppBundle\Form\Type\Medicamento\MedicamentoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MedicamentoController extends Controller
{

    public function registrarMedicamentoAction(Request $request)
    {
        $medicamento = new Medicamento();

        $formMedicamento = $this->createForm(new MedicamentoType(), $medicamento);
        //$formProducto = $this->createForm(new ProductoType(), $producto);
        $formMedicamento->handleRequest($request);
        //$formProducto->handleRequest($request);
        if ($formMedicamento->isValid()) {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($medicamento);
            $dm->flush();
            return $this->redirect($this->generateUrl('medicamentos'));
        }
        /*
        if ($formProducto->isValid()) {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($producto);
            $dm->flush();
            return $this->redirect($this->generateUrl('productos'));

        }*/
        return $this->render(
            ':Medicamento/registrar:registrarMedicamento.html.twig',
            array('form' => $formMedicamento->createView())
        );
        /*
        return $this->render(
            ':Producto:index.html.twig',
            array('form' => $formProducto->createView())
        );*/
    }
    
    public function getMedicamentosAction(Request $request)
    {
        $medicamentos = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Medicamento\Medicamento' )
            ->getAll();
        return $this->render(':Cajero/consultarMedicamentos:consultarMedicamentos.html.twig', array('medicamentos' => $medicamentos));
    }

}
