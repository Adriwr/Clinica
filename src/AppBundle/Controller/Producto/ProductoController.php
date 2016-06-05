<?php

namespace AppBundle\Controller\Producto;


use AppBundle\Document\Producto\Producto;
use AppBundle\Form\Type\Cajero\CajeroBuscarProductoType;
use AppBundle\Form\Type\Producto\ProductoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductoController extends Controller
{

    public function registrarProductoAction(Request $request)
    {
        $producto = new Producto();

        $formProducto = $this->createForm(new ProductoType(), $producto);
        $formProducto->handleRequest($request);

        if ($formProducto->isValid()) {
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($producto);
            $dm->flush();
            return $this->redirect($this->generateUrl('productos'));

        }

        return $this->render(
            ':Producto:index.html.twig',
            array('form' => $formProducto->createView())
        );
    }

    public function getInventarioAction(Request $request)
    {
        $productos = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Producto\Producto' )
            ->getAll();
        return $this->render(':Cajero/actividad:consultarInventario.html.twig', array('productos' => $productos));
    }


    public function buscarProductoAction(Request $request)
    {

        $producto = new Producto();

        $formBuscarProducto = $this->createForm(new CajeroBuscarProductoType(), $producto);
        $formBuscarProducto->handleRequest($request);

        /*if ($formProducto->isValid()) {

            $dm = $productos = $this->get( 'doctrine_mongodb' )->getManager()
                ->getRepository( 'AppBundle:Producto\Producto' )
                ->getProductoByName();
            return $this->redirect($this->generateUrl('productos'));

        }*/

        return $this->render(
            ':Producto:buscarProducto.html.twig',
            array('formBuscarProducto' => $formBuscarProducto->createView())
        );

       /* $productos = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository( 'AppBundle:Producto\Producto' )
            ->getAll();
        return $this->render(':Cajero/actividad:consultarInventario.html.twig', array('productos' => $productos));*/
    }

}
