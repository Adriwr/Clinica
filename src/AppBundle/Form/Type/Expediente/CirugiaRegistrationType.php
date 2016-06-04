<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CirugiaRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', 'text', array(
            'attr' => array(
                'class' => 'form-control',
                'ng-model'=> 'cirugia.tipo'
            ),
            'label' => 'Tipo de cirugía',
            'required' => true ))
            ->add('fecha', 'choice', array(
                'choices' => $this->buildYearChoices(),
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.year'
                ),
                'label' => 'Año',
                'required' => true ))
            ->add('lugar', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.lugar'
                ),
                'label' => 'Lugar de cirugía',
                'required' => true ))
            ->add('estado', 'text', array(
                'attr' => array(
                    'class' => 'form-control',
                    'ng-model'=> 'cirugia.estado'
                ),
                'label' => 'Estado',
                'required' => true ))
            ->add('save', 'submit', array('label' => 'Añadir cirugía'));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Cirugia',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'cirugias';
    }
    public function buildYearChoices() {
        $distance = 5;
        $yearsBefore = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") - $distance));
        $yearsAfter = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") + $distance));
        return array_combine(range($yearsBefore, $yearsAfter), range($yearsBefore, $yearsAfter));
    }
}