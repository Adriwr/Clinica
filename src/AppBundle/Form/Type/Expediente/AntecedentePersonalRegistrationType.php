<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AntecedentePersonalRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('frecuenciaBano', 'number', array(
            'attr' => array(
                'class' => 'form-control',
                'placeholder' => '',
                'ng-model'=> 'expediente.antecedentesPer.frecuenciaBano' ),
            'label' => '¿Cuántas veces se baña a la semana?',
            'required' => true ))
            ->add('cambiosRopa', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'expediente.antecedentesPer.cambiosRopa'
                ),
                'label' => '¿Cuántas veces cambia de ropa por semana?',
                'required' => true ))
            ->add('personasCasa', 'number', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'expediente.antecedentesPer.personasCasa'
                ),
                'label' => '¿Cuántas personas viven con usted?',
                'required' => true ))
            ->add('serviciosCasa', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'placeholder' => '',
                    'ng-model'=> 'expediente.antecedentesPer.serviciosCasa'
                ),
                'label' => '¿Con qué servicios básicos cuenta?',
                'required' => true ))
            ->add('alimentacion', 'choice', array(
                'choices'  => array('Buena' => 'b', 'Regular' => 'r', 'Mala' => 'm'),
                'choices_as_values' => true,
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'expediente.antecedentesPer.alimentacion'
                ),
                'label' => '¿Cómo considera su alimentación?',
                'required' => true ))
            ->add('fuma', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'expediente.antecedentesPer.fuma'
                ),
                'label' => '¿Fuma?',
                'required' => false ))
            ->add('alcohol', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'expediente.antecedentesPer.alcohol'
                ),
                'label' => '¿Toma?',
                'required' => false ))
            ->add('drogas', 'checkbox', array(
                'attr' => array(
                    'ng-model'=> 'expediente.antecedentesPer.drogas'
                ),
                'label' => '¿Consume drogas?',
                'required' => false ));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\AntecedentePersonal',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'a_p';
    }
}