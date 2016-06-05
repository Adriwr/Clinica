<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AnticonceptivoRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', 'text', array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => '',
                'ng-model'=> 'anticonceptivo.nombre'
            ),
            'label' => 'Nombre',
            'required' => true ))
            ->add('save', 'button', array(
                    'label' => 'Añadir anticonceptivo',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addAnticonceptivo()')
                )
            );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Anticonceptivo',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'antic';
    }
}