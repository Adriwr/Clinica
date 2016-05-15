<?php

namespace AppBundle\Controller\Cajero;
use AppBundle\Document\Cajero\Cajero;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Cajero\CajeroType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class CajeroController extends Controller
{
    public function registrarCajeroAction(request $request)
    {
        $cajero = new Cajero();

        $formCajero  = $this->createForm(new CajeroType(),$cajero);
        $formCajero->handleRequest($request);

        $usuario = new User();
        $formUsuario = $this->createForm(new RegistrationType(),$usuario);

        if($formUsuario->isValid()){
            $dm = $this->getDoctrine()->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_MEDICO");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();
            if($formCajero->isValid()){
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($cajero);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }
        }

        return $this->render(
            ':Cajero:registrarCajero.html.twig',
            array('formCajero' => $formCajero->createView(),
                'formUsuario' => $formUsuario->createView()

            )
        );
    }

}
