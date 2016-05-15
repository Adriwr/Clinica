<?php

namespace AppBundle\Controller\Gerente;


use AppBundle\Form\Type\Gerente\GerenteType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class GerenteController extends Controller
{
    public function registrarGerenteAction(Request $request)
    {
        //$gerente = new \AppBundle\Document\Gerente\Gerente();
        $usuario = new User();

        $formGerente = $this->createForm(new GerenteType(), $gerente);
        $formGerente->handleRequest($request);

        $formUsuario = $this->createForm(new RegistrationType(),$usuario);
        $formUsuario->handleRequest($request);

        if ($formUsuario->isValid()) {

            $dm = $this->getDoctrine()->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_MEDICO");
            $usuario->setUsername("-");
            $dm->persist($usuario);
            $dm->flush();
            if ($formGerente->isValid()) {
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($gerente);
                $dm->flush();

            }
            return $this->redirect($this->generateUrl('home'));
        }
        return $this->render(
            ':Medico:registrarGerente.html.twig',
            array(
                'formMedico' => $formGerente->createView(),
                'formUsuario' => $formUsuario->createView()
            )
        );
    }
    
}
