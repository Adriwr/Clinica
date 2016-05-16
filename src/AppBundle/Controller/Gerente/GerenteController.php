<?php

namespace AppBundle\Controller\Gerente;


use AppBundle\Document\Gerente\Gerente;
use AppBundle\Document\User\User;
use AppBundle\Form\Type\Gerente\GerenteRegistrationType;
use AppBundle\Form\Type\Gerente\GerenteType;
use AppBundle\Form\Type\User\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

class GerenteController extends Controller
{
    /**
     * Acción para mostrar el formulario de registro de gerente
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registrarGerenteAction(Request $request)
    {
        $usuario = new User();

        $formUsuario = $this->createForm(new GerenteRegistrationType(), $usuario);

        $formUsuario->handleRequest($request);

        if ($formUsuario->isValid()) {

            $dm = $this->get('doctrine_mongodb')->getManager();
            $usuario->setEnabled(true);
            $usuario->addRole("ROLE_GERENTE");
            $usuario->setUsername($usuario->getGerente()->getNombre() . " " . $usuario->getGerente()->getApellidos());
            $dm->persist($usuario);
            $dm->flush();

            return $this->redirect($this->generateUrl('registrar_gerente'));
        }
        return $this->render(
            ':Gerente/registrar:registrarGerente.html.twig',
            array(
                'formUsuario' => $formUsuario->createView()
            )
        );
    }
    
}
