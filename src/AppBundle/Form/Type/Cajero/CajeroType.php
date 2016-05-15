<?php

namespace AppBundle\Form\Type\Cajero;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CajeroType extends  AbstractType
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
        ->add( 'Agregar', 'submit', array(
            'attr' => array(
                'class' => 'btn btn-primary pull-right',
                'ng-click'=> 'crear()')) );

    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Document\Cajero\Cajero',
        ));
    }

    public function getName()
    {
        return 'form_agregar_cajero';
    }
}