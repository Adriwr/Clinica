<?php

namespace AppBundle\Controller\Producto;


use AppBundle\Entity\Area;
use AppBundle\Entity\Producto;
use AppBundle\Form\Type\AreaType;
use AppBundle\Form\Type\ProductoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProductoController extends Controller
{
    /**
     * @Route("/productos", name="productos")
     */
    public function indexAction(Request $request)
    {
        $producto = new Producto();


        $form = $this->createForm(new ProductoType(), $producto);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($producto);
            $dm->flush();


            $request->getSession()->getFlashBag()->add(
                'exito',
                'Producto guardado'
            );

            return $this->redirect($this->generateUrl('productos'));


        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Producto:index.html.twig',
            array('form' => $form->createView())
        );
    }

}
