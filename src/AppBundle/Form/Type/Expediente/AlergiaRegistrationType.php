<?php

namespace AppBundle\Form\Type\Expediente;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlergiaRegistrationType extends AbstractType
{
public function buildForm(FormBuilderInterface $builder, array $options)
{

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
public function getParent()
{
    return ChoiceType::class;
}

public function getName()
{
return 'form_crear_alergia';
}
}