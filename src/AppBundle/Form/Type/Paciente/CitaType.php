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
            ->add('consultorio', 'text' , array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => 'Consultorio',
                'ng-model'=> 'cita.consultorio' ),
            'label' => 'Consultorio',
            'required' => true ) )
             ->add('medico', 'text' , array(
                 'attr' => array(
                     'class' => 'form-control',
                     'placeholder' => 'Médico',
                     'ng-model'=> 'cita.medico' ),
                 'label' => 'Médico',
                 'required' => true ) )
             ->add('fecha', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Fecha',
                    'ng-model'=> 'cita.fecha'),
                'label' => 'Fecha',
                 'disabled' => true,
                'required' => true ) )
            ->add( 'Guardar', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary pull-right',
                    'ng-click'=> 'crear()')) );
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