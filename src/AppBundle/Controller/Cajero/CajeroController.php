<?php

namespace AppBundle\Controller\Cajero;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Form\Type\Cajero\CajeroType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class CajeroController extends Controller
{
    public function registrarCajeroAction(request $request)
    {
        $cajero = new Cajero();
        $form  = $this->createForm(new CajeroType(),$cajero);
        $form->handleRequest($request);

        if($form->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $dm->persist($cajero);
            $dm->flush();
            return $this->redirect($this->generateUrl('home'));
        }

        return $this->render(
            ':Cajero:registrarCajero.html.twig',
            array('form' => $form->createView())
        );
    }

}
