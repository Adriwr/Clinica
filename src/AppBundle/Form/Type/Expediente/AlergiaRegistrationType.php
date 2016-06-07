<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlergiaRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sustancia', 'text', array(
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
            ->add('save', 'button', array(
                    'label' => 'Añadir alergia',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addAlergia()')
                )
            );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Alergia',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'alergias';
    }
}