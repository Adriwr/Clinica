<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmbarazoRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fecha', 'date', array(
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
            ->add('save', 'button', array(
                    'label' => 'Añadir embarazo',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addEmbarazo()')
                )
            );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Embarazo',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'embarazos';
    }
}