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
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function scheduleAction(Request $request)
    {
        $cita = new PacienteCitas();

        $form = $this->createForm(new CitaType(), $cita);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $dm = $this->get( 'doctrine_mongodb' )->getManager();
            $paciente = $dm->getRepository('AppBundle:Paciente\Paciente')->findOneById($request->get('id'));
            $paciente->addCita($cita);
            $dm->persist($cita);
            $dm->flush();

            $request->getSession()->getFlashBag()->add(
                'exito',
                'Cita guardada'
            );

            return $this->redirect($this->generateUrl('consultar_citas_paciente'));

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
