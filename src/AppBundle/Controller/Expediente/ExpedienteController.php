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
    public function crearAction(Request $request,$id)
    {

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

        $form_alergias = $this->get('form.factory')->createNamedBuilder('alergias', 'form',$alergia)
            ->add('sustancia', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'alergia.sustancia' ),
                'label' => 'Sustancia',
                'required' => true ))
            ->add('fechaDiagnostico', 'date', array(
                'attr' => array(
                    'placeholder' => '',
                    'ng-model'=> 'alergia.fecha_diagnostico' ),
                'label' => 'Fecha diagnosticada',
                'required' => true ))
            ->add('controlada', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'alergia.controlada' ),
                'label' => 'Controlada',
                'required' => false ))
            ->add('save', 'submit', array('label' => 'Añadir alergia'))
            ->getForm();

        $antecedenteF = new AntecedenteFamiliar();

        $form_a_f= $this->get('form.factory')->createNamedBuilder('a_f', 'form',$antecedenteF)
            ->add('nombre', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.nombre' ),
                'label' => 'Nombre',
                'required' => true ))
            ->add('sexo', 'choice', array(
                'choices'  =>  array('H' => 'H', 'M' => 'M'),
                'choices_as_values' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.sexo'
                ),
                'label' => 'Sexo',
                'required' => true ))
            ->add('edad', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.edad' ),
                'label' => 'Edad',
                'required' => true ))
            ->add('parentesco', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.parentesco' ),
                'label' => 'Teléfono',
                'required' => true ))
            ->add('telefono', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.telefono' ),
                'label' => 'Parentesco',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir familiar'))
            ->getForm();


        $anticonceptivo = new Anticonceptivo();

        $form_antic= $this->get('form.factory')->createNamedBuilder('antic', 'form',$anticonceptivo)
            ->add('nombre', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'anticonceptivo.nombre'
                ),
                'label' => 'Nombre',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir anticonceptivo'))
            ->getForm();

        $antecedenteP = new AntecedentePersonal();

        $form_a_p = $this->get('form.factory')->createNamedBuilder('a_p', 'form',$antecedenteP)
            ->add('frecuenciaBano', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.frecuencia_bano' ),
                'label' => '¿Cuántas veces se baña a la semana?',
                'required' => true ))
            ->add('cambiosRopa', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.cambios_ropa'
                ),
                'label' => '¿Cuántas veces cambia de ropa por semana?',
                'required' => true ))
            ->add('personasCasa', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.personas_casa'
                ),
                'label' => '¿Cuántas personas viven con usted?',
                'required' => true ))
            ->add('serviciosCasa', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedente_familiar.servicios_casa'
                ),
                'label' => '¿Con qué servicios básicos cuenta?',
                'required' => true ))
            ->add('alimentacion', 'choice', array(
                'choices'  => array('Buena' => 'b', 'Regular' => 'r', 'Mala' => 'm'),
                'choices_as_values' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'antecedente_familiar.alimentacion'
                ),
                'label' => '¿Cómo considera su alimentación?',
                'required' => true ))
            ->add('fuma', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'antecedente_familiar.fuma'
                ),
                'label' => '¿Fuma?',
                'required' => false ))
            ->add('alcohol', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'antecedente_familiar.alcohol'
                ),
                'label' => '¿Toma?',
                'required' => false ))
            ->add('drogas', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'antecedente_familiar.drogas'
                ),
                'label' => '¿Consume drogas?',
                'required' => false ))
            ->getForm();


        $cirugia = new Cirugia();

        $form_cirugias= $this->get('form.factory')->createNamedBuilder('cirugias', 'form',$cirugia)
            ->add('tipo', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.tipo'
                ),
                'label' => 'Tipo de cirugía',
                'required' => true ))
            ->add('fecha', 'choice', array(
                'choices' => $this->buildYearChoices(),
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.year'
                ),
                'label' => 'Año',
                'required' => true ))
            ->add('lugar', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.lugar'
                ),
                'label' => 'Lugar de cirugía',
                'required' => true ))
            ->add('estado', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.estado'
                ),
                'label' => 'Estado',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir cirugía'))
            ->getForm();


        $embarazo = new Embarazo();

        $form_embarazos= $this->get('form.factory')->createNamedBuilder('embarazos', 'form',$embarazo)
            ->add('fecha', 'date', array(
                'attr' => array(
                    'ng-model'=> 'embarazo.fecha'
                ),
                'label' => 'Fecha',
                'required' => true ))
            ->add('descripcion', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'embarazo.descripcion'
                ),
                'label' => 'Descripción',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir descripción'))
            ->getForm();


        $enfermedad = new Enfermedad();

        $form_enfermedades= $this->get('form.factory')->createNamedBuilder('enfermedades', 'form',$enfermedad)
            ->add('codigoCie', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'enfermedad.'
                ),
                'label' => 'Enfermedad',
                'required' => true ))
            ->add('fecha', 'date', array(
                'attr' => array(
                    'ng-model'=> 'enfermedad.fecha'
                ),
                'label' => 'Fecha diagnosticada',
                'required' => true ))
            ->add('tratada', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'enfermedad.tratada'
                ),
                'label' => 'Tratada',
                'required' => true ))
            ->add('observaciones', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'enfermedad.observaciones'
                ),
                'label' => 'Observaciones',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir enfermedad'))
            ->getForm();

        $mastografia = new Mastografia();

        $form_mastografias= $this->get('form.factory')->createNamedBuilder('mastografias', 'form',$mastografia)
            ->add('fecha', 'choice',array(
                'choices' => $this->buildYearChoices(),
                'attr'=>array(
                    'class' => 'form-control',
                    'ng-model'=> 'mastografia.year'
                ),
                'label' => 'Año',
                'required' => true))
            ->add('notas', 'text',array(
                'attr'=>array(
                    'class' => 'form-control',
                    'ng-model'=> 'mastografia.notas'
                ),
                'label' => 'Notas',
                'required' => true))
            ->add('save', 'submit', array('label' => 'Añadir mastografía'))
            ->getForm();

        $papanicolaou= new Papanicolaou();

        $form_papa= $this->get('form.factory')->createNamedBuilder('papa', 'form',$papanicolaou)
            ->add('fecha', 'choice',array(
                'choices' => $this->buildYearChoices(),
                'attr'=>array(
                    'class' => 'form-control',
                    'ng-model'=> 'papanicolaou.year'
                ),
                'label' => 'Año',
                'required' => true))
            ->add('notas', 'text',array(
                'attr'=>array(
                    'class' => 'form-control',
                    'ng-model'=> 'papanicolaou.notas'
                ),
                'label' => 'Notas',
                'required' => true))
            ->add('save', 'submit', array('label' => 'Añadir papanicolaou'))
            ->getForm();
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
                    $dm->persist($alergia);
                    $dm->flush();

                    return $this->redirectToRoute('home');
                }
            }

            if ($request->request->has('a_f')) {
                $form_a_f->handleRequest($request);
                if ($form_a_f->isSubmitted() && $form_a_f->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($antecedenteF);
                    $dm->flush();

                    return $this->redirectToRoute('home');
                }
            }

            if ($request->request->has('a_p')) {
                $form_a_p->handleRequest($request);
                if ($form_a_p->isSubmitted() && $form_a_p->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($antecedenteP);
                    $dm->flush();

                    return $this->redirectToRoute('home');
                }
            }

            if ($request->request->has('cirugias')) {
                $form_cirugias->handleRequest($request);
                if ($form_cirugias->isSubmitted() && $form_cirugias->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($cirugia);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
                }
            }
            if ($request->request->has('antic')) {
                $form_antic->handleRequest($request);
                if ($form_antic->isSubmitted() && $form_antic->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($anticonceptivo);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
                }
            }
            if ($request->request->has('embarazos')) {
                $form_embarazos->handleRequest($request);
                if ($form_embarazos->isSubmitted() && $form_embarazos->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($embarazo);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
                }
            }
            if ($request->request->has('enfermedades')) {
                $form_enfermedades->handleRequest($request);
                if ($form_enfermedades->isSubmitted() && $form_enfermedades->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($enfermedad);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
                }
            }
            if ($request->request->has('mastografias')) {
                $form_mastografias->handleRequest($request);
                if ($form_mastografias->isSubmitted() && $form_mastografias->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($mastografia);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
                }
            }
            if ($request->request->has('papa')) {
                $form_papa->handleRequest($request);
                if ($form_papa->isSubmitted() && $form_papa->isValid()) {
                    // ... perform some action, such as saving the task to the database
                    $dm = $this->get('doctrine_mongodb')->getManager();
                    $dm->persist($papanicolaou);
                    $dm->flush();
                    return $this->redirectToRoute('crear_expediente');
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
                    return $this->redirectToRoute('crear_expediente');
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
                return $this->redirectToRoute('crear_expediente');
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
