<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AntecedenteFamiliarRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', 'text', array(
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
            ->add('save', 'submit', array('label' => 'Añadir familiar'));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\AntecedenteFamiliar',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'a_f';
    }
}