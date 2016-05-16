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
    /**
     * Acción para mostrar el formulario de registro de cajero
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarCajeroAction(request $request)
    {
        $cajero = new Cajero();
        $usuario = new User();

        $formCajero  = $this->createForm(new CajeroType(),$cajero);
        $formUsuario = $this->createForm(new RegistrationType(),$usuario);

        $formCajero->handleRequest($request);
        $formUsuario->handleRequest($request);

        if($formUsuario->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_CAJERO");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();

            if($formCajero->isValid()){
                $cajero->setEmail($usuario->getEmail());
                $dm->persist($cajero);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }
        }

        return $this->render(
            ':Cajero:registrarCajero.html.twig',
            array(
                'formCajero' => $formCajero->createView(),
                'formUsuario' => $formUsuario->createView()
            )
        );
    }

}
