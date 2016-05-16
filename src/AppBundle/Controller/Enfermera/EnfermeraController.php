<?php

namespace AppBundle\Controller\Enfermera;

use AppBundle\Document\Enfermera\Enfermera;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Enfermera\EnfermeraType;
use AppBundle\Form\Type\User\RegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EnfermeraController extends Controller
{
    /**
     * Acción para mostrar el formulario de registro de enfermera
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarEnfermeraAction(Request $request)
    {
        $enfermera = new Enfermera();
        $usuario = new User();
        
        $formEnfermera = $this->createForm(new EnfermeraType(), $enfermera);
        $formUsuario = $this->createForm(new RegistrationType(),$usuario);

        $formEnfermera->handleRequest($request);
        $formUsuario->handleRequest($request);
        // Se registra datos del usuario
        if($formUsuario->isValid()){
            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_ENFERMERA");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();
            // Se registra datos de enfermera
            if($formEnfermera->isValid()){
                $enfermera->setEmail($usuario->getEmail());
                $dm->persist($enfermera);
                $dm->flush();
                return $this->redirect($this->generateUrl('home'));
            }
            
        }
        return $this->render(
            ':Enfermera:registrarEnfermera.html.twig',
            array(
                'formEnfermera' => $formEnfermera->createView(),
                'formUsuario' => $formUsuario->createView()
            )
        );
    }
}