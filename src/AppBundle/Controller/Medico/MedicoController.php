<?php

namespace AppBundle\Controller\Medico;

use AppBundle\Entity\Medico;
use AppBundle\Form\Type\MedicoType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MedicoController extends Controller
{
    /**
     * @Route("/", name="medico")
     */
    public function indexAction(Request $request)
    {
        $area = new Medico();


        $form = $this->createForm(new MedicoType(), $area);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->getDoctrine()->getManager();
            $dm->persist($area);
            $dm->flush();

            $request->getSession()->getFlashBag()->add(
                'exito',
                'Medico creado'
            );

            return $this->redirect($this->generateUrl('medico'));

        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Medico:index.html.twig',
            array('form' => $form->createView())
        );
    }
}
