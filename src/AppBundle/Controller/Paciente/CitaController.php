<?php

namespace AppBundle\Controller\Paciente;

use AppBundle\Document\Paciente\PacienteCitas;
use AppBundle\Form\Type\Paciente\CitaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;


class CitaController extends Controller
{
    /**
     * Acción para mostrar la vista UI2 Agendar cita
     * @return \Symfony\Component\HttpFoundation\Response
     */
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function agendarAction(Request $request)
    {
        $cita = new PacienteCitas();


        $form = $this->createForm(new CitaType(), $cita);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get( 'doctrine_mongodb' )->getManager();
            $dm->persist($cita);
            $dm->flush();


            $request->getSession()->getFlashBag()->add(
                'exito',
                'Cita guardada'
            );

            return $this->redirect($this->generateUrl('agendar_cita_paciente'));


        }
        $request->getSession()->getFlashBag()->add(
            'error',
            'Datos incorrectos, por favor intenta nuevamente'
        );

        return $this->render(
            ':Paciente/cita:agendar.html.twig',
            array('form' => $form->createView())
        );
    }

}
