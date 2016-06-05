<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EnfermedadRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codigoCie', 'text', array(
            'attr' => array(
                'class' => 'form-control',
                'ng-model'=> 'enfermedad.codigo'
            ),
            'label' => 'Codigo CIE de la enfermedad',
            'required' => false ))
            ->add('nombre', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'enfermedad.nombre'
                ),
                'label' => 'Nombre',
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
                'required' => false ))
            ->add('observaciones', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'enfermedad.observaciones'
                ),
                'label' => 'Observaciones',
                'required' => true ))
            ->add('save', 'button', array(
                    'label' => 'Añadir enfermedad',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addEnfermedad()')
                )
            );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Enfermedad',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'enfermedades';
    }
}