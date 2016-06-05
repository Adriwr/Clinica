<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MastografiaRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fecha', 'choice',array(
            'choices' => $this->buildYearChoices(),
            'attr'=>array(
                'class' => 'form-control',
                'ng-model'=> 'mastografia.year'
            ),
            'label' => 'Año',
            'required' => true))
            ->add('notas', 'text',array(
                'attr'=>array(
                    'class' => 'form-control',
                    'ng-model'=> 'mastografia.notas'
                ),
                'label' => 'Notas',
                'required' => true))
            ->add('save', 'button', array(
                    'label' => 'Añadir mastografía',
                    'attr' => array(
                        'style'     =>'margin:5px',
                        'class'     => 'btn btn-primary pull-right',
                        'ng-click'  => 'addMastografia()')
                )
            );
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'        => 'AppBundle\Document\Expediente\Mastografia',
            'csrf_protection'   => false,
            'cascade_validation' => true,
            'allow_add' => true
        ));
    }
    public function getName()
    {
        return 'mastografias';
    }
    public function buildYearChoices() {
        $distance = 5;
        $yearsBefore = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") - $distance));
        $yearsAfter = date('Y', mktime(0, 0, 0, date("m"), date("d"), date("Y") + $distance));
        return array_combine(range($yearsBefore, $yearsAfter), range($yearsBefore, $yearsAfter));
    }
}