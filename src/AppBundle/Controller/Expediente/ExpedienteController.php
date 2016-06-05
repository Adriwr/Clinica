<?php

namespace AppBundle\Controller\Expediente;

use AppBundle\Document\Expediente\Alergia;
use AppBundle\Document\Expediente\AntecedenteFamiliar;
use AppBundle\Document\Expediente\AntecedentePersonal;
use AppBundle\Document\Expediente\Anticonceptivo;
use AppBundle\Document\Expediente\Cirugia;
use AppBundle\Document\Expediente\Embarazo;
use AppBundle\Document\Expediente\Enfermedad;
use AppBundle\Document\Expediente\Mastografia;
use AppBundle\Document\Expediente\Papanicolaou;
use AppBundle\Form\Type\Expediente\AlergiaRegistrationType;
use AppBundle\Form\Type\Expediente\AntecedenteFamiliarRegistrationType;
use AppBundle\Form\Type\Expediente\AntecedentePersonalRegistrationType;
use AppBundle\Form\Type\Expediente\AnticonceptivoRegistrationType;
use AppBundle\Form\Type\Expediente\CirugiaRegistrationType;
use AppBundle\Form\Type\Expediente\EmbarazoRegistrationType;
use AppBundle\Form\Type\Expediente\EnfermedadRegistrationType;
use AppBundle\Form\Type\Expediente\PapanicolaouRegistrationType;
use AppBundle\Form\Type\Expediente\MastografiaRegistrationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ExpedienteController extends Controller
{
    /**
     * Acción para mostrar el formulario de registrar médico
     * @Route("/", name="medico")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function crearAction(Request $request)
    {
        $id = $request->get('id');
        /*
         * , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> '.'
                ),
                'label' => '',
                'required' => true )
         * */

        $alergia = new Alergia();
        $paciente = $this->get( 'doctrine_mongodb' )->getManager()
            ->getRepository('AppBundle:Paciente\Paciente')
            ->find($id);

        $form_alergias = $this->createForm(new AlergiaRegistrationType(),$alergia)  ;

        $antecedenteF = new AntecedenteFamiliar();

        $form_a_f= $this->createForm(new AntecedenteFamiliarRegistrationType(),$antecedenteF);

        $anticonceptivo = new Anticonceptivo();

        $form_antic= $this->createForm(new AnticonceptivoRegistrationType(),$anticonceptivo);

        $antecedenteP = new AntecedentePersonal();

        $form_a_p = $this->createForm(new AntecedentePersonalRegistrationType(),$antecedenteP);


        $cirugia = new Cirugia();

        $form_cirugias= $this->createForm(new CirugiaRegistrationType(),$cirugia);


        $embarazo = new Embarazo();

        $form_embarazos= $this->createForm(new EmbarazoRegistrationType(),$embarazo);


        $enfermedad = new Enfermedad();

        $form_enfermedades= $this->createForm(new EnfermedadRegistrationType(),$enfermedad);

        $mastografia = new Mastografia();

        $form_mastografias= $this->createForm(new MastografiaRegistrationType(),$mastografia);

        $papanicolaou= new Papanicolaou();

        $form_papa= $this->createForm(new PapanicolaouRegistrationType(),$papanicolaou);
        /*

        $ = new ();

        $form_= $this->get('form.factory')->createNamedBuilder('', 'form',$)
            ->add('', '')
            ->add('save', 'submit', array('label' => 'Añadir '))
            ->getForm();
        */

        if('POST' === $request->getMethod()) {

            if ($request->request->has('alergias')) {
                $form_alergias->handleRequest($request);

                if ($form_alergias->isSubmitted() && $form_alergias->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    dump($alergia);
                    $dm->persist($alergia);
                    $dm->flush();
                }
            }

            if ($request->request->has('a_f')) {
                $form_a_f->handleRequest($request);
                if ($form_a_f->isSubmitted() && $form_a_f->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($antecedenteF);
                    $dm->flush();


                }
            }

            if ($request->request->has('a_p')) {
                $form_a_p->handleRequest($request);
                if ($form_a_p->isSubmitted() && $form_a_p->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($antecedenteP);
                    $dm->flush();


                }
            }

            if ($request->request->has('cirugias')) {
                $form_cirugias->handleRequest($request);
                if ($form_cirugias->isSubmitted() && $form_cirugias->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($cirugia);
                    $dm->flush();

                }
            }
            if ($request->request->has('antic')) {
                $form_antic->handleRequest($request);
                if ($form_antic->isSubmitted() && $form_antic->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($anticonceptivo);
                    $dm->flush();

                }
            }
            if ($request->request->has('embarazos')) {
                $form_embarazos->handleRequest($request);
                if ($form_embarazos->isSubmitted() && $form_embarazos->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($embarazo);
                    $dm->flush();
                }
            }
            if ($request->request->has('enfermedades')) {
                $form_enfermedades->handleRequest($request);
                if ($form_enfermedades->isSubmitted() && $form_enfermedades->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($enfermedad);
                    $dm->flush();
                    echo 'hola';
                    print_r($enfermedad);
                    echo 'hola';
                }
            }
            if ($request->request->has('mastografias')) {
                $form_mastografias->handleRequest($request);
                if ($form_mastografias->isSubmitted() && $form_mastografias->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($mastografia);
                    $dm->flush();
                }
            }
            if ($request->request->has('papa')) {
                $form_papa->handleRequest($request);
                if ($form_papa->isSubmitted() && $form_papa->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($papanicolaou);
                    $dm->flush();
                }
            }
            /*
             if ($request->request->has('')) {
                $form_->handleRequest($request);
                if ($form_->isSubmitted() && $form_->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($);
                    $dm->flush();

                }
            }
             * */
        }

        return $this->render(
            ':Expediente/crear:crearExpediente.html.twig',
            array(
                'form_alergias' => $form_alergias->createView(),
                'form_a_f' => $form_a_f->createView(),
                'form_a_p' => $form_a_p->createView(),
                'form_cirugias' => $form_cirugias->createView(),
                'form_antic' => $form_antic->createView(),
                'form_embarazos' => $form_embarazos->createView(),
                'form_enfermedades' => $form_enfermedades->createView(),
                'form_mastografias' => $form_mastografias->createView(),
                'form_papa' => $form_papa->createView(),
                'id' => $id
            )
        );
        /*

        $ = new ();

        $form_= $this->get('form.factory')->createNamedBuilder('', 'form',$)
            ->add('', '')
            ->getForm();

        if ($request->request->has('')) {
            $form_->handleRequest($request);
            if ($form_->isSubmitted() && $form_->isValid()) {
                // ... perform some action, such as saving the task to the database
                $dm = $this->get('doctrine_mongodb')->getManager();
                $dm->persist($);
                $dm->flush();

            }
        }

        */
    }
    public function buildYearChoices() {
        $distance = 5;
        $yearsBefore = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") - $distance));
        $yearsAfter = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") + $distance));
        return array_combine(range($yearsBefore, $yearsAfter), range($yearsBefore, $yearsAfter));
    }

    public static function getEnfermedades(){

    }
}
