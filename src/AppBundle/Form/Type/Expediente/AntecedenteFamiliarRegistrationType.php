<?php

namespace AppBundle\Form\Type\Expediente;

use AppBundle\Form\Type\Enfermera\EnfermeraRegistrationType;
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
                'ng-model'=> 'antecedenteFamiliar.nombre' ),
            'label' => 'Nombre',
            'required' => true ))
            ->add('sexo', 'choice', array(
                'choices'  =>  array('H' => 'H', 'M' => 'M'),
                'choices_as_values' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedenteFamiliar.sexo'
                ),
                'label' => 'Sexo',
                'required' => true ))
            ->add('edad', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedenteFamiliar.edad' ),
                'label' => 'Edad',
                'required' => true ))
            ->add('parentesco', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedenteFamiliar.parentesco' ),
                'label' => 'Teléfono',
                'required' => true ))
            ->add('telefono', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'antecedenteFamiliar.telefono' ),
                'label' => 'Parentesco',
                'required' => true ))
           // ->add('enfermedadesCronicas', new EnfermeraRegistrationType())
            ->add('save', 'button', array(
                    'label' => 'Añadir familiar',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addFamiliar()')
                )
            );
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