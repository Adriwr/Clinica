<?php

namespace AppBundle\Controller\Producto;


use AppBundle\Document\Producto\Producto;
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
            ':Producto:Index.html.twig',
            array('form' => $formProducto->createView())
        );
    }

}
