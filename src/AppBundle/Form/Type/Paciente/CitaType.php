<?php

namespace AppBundle\Form\Type\Paciente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CitaType extends AbstractType
{
    /**
     * Builder para el formulario de agendar cita de paciente
     * @param \Symfony\Component\Form\FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('consultorio', 'choice' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cita.consultorio',
                    'ng-click' => 'getDoctor()'
                ),
                'label' => 'Consultorio',
                'choices'  => array(
                    '1' => 'Consultorio #1',
                    '2' => 'Consultorio #2',
                    '3' => 'Consultorio #3',
                    '4' => 'Consultorio #4',
                    '5' => 'Consultorio #5',
                    '6' => 'Consultorio #6',
                    '7' => 'Consultorio #7',
                    '8' => 'Consultorio #8',
                    '9' => 'Consultorio #9',
                    '10' => 'Consultorio #10',
                    '11' => 'Consultorio #11',
                    '12' => 'Consultorio #12'
                ),
                'required' => true ) )
            ->add('medico', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Médico',
                    'ng-model'=> 'cita.medico' ),
                'label' => 'Médico',
                'read_only' => true,
                'required' => true ) )
            ->add('fecha', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Fecha',
                    'ng-model'=> 'cita.fecha'),
                'label' => 'Fecha',
                'read_only' => true,
                'required' => true ) )
            ->add( 'Guardar', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary pull-right',
                    'ng-disabled' => '!cita.fecha || !cita.consultorio || !cita.medico',
                    'ng-click'=> 'guardarCita()')) );
    }
    /**
     * Opciones default del formulario
     * @param \Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Paciente\PacienteCitas',
        ));
    }
    /**
     * Nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_paciente_cita';
    }
}