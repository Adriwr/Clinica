<?php

namespace AppBundle\Form\Type\Medico;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HorarioType extends AbstractType{

    /**
     * Builder del formulario
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add( 'horario_inicio' ,   'time' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Horario inicio',
                    'ng-model'=> 'medico.horario.horarioInicio' ),
                'label' => 'Horario Inicio',
                'required' => true ) )
            ->add( 'horario_fin' ,   'time' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Horario fin',
                    'ng-model'=> 'medico.horario.horarioFin' ),
                'label' => 'Horario Fin',
                'required' => true ) )
            ->add('consultorio', 'choice' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'medico.horario.consultorio' ),
                'label' => 'Consultorio',
                'required' => true ,
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
                )))

        ;
    }

    /**
     * Función para agregar la opción data_class
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'=> 'AppBundle\Document\Medico\Horario',

        ));
    }

    /**
     * Función para obtener el nombre del formulario
     * @return string
     */
    public function getName()
    {
        return 'form_medico_horario';
    }

}