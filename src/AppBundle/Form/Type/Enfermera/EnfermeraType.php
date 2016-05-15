<?php

namespace AppBundle\Form\Type\Enfermera;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnfermeraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Nombre(s)',
                    'ng-model'=> 'cajero.nombre' ),
                'label' => 'Nombre del cajero',
                'required' => true ))
            ->add('apellidos', 'text' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => 'Apellidos',
                    'ng-model'=> 'cajero.apellidos' ),
                'label' => 'Apellidos',
                'required' => true ) )
            ->add('sexo', 'choice' , array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'paciente.sexo' ),
                'label' => 'Sexo',
                'required' => true ,
                'choices'  => array('m' => 'Masculino', 'f' => 'Femenino')))
            ->add( 'Agregar', 'submit', array(
                'attr' => array(
                    'class' => 'btn btn-primary pull-right',
                    'ng-click'=> 'crear()')) );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Enfermera\Enfermera',
        ));
    }

    public function getName()
    {
        return 'form_agregar_enfermera';
    }
}