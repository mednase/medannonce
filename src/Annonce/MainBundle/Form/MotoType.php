<?php

namespace Annonce\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MotoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Marque',null,array('label'=>false))
            ->add('Cylindre',null,array('label'=>false))
            ->add('Annee',null,array('label'=>false))
            ->add('Kilometrage',null,array('label'=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Annonce\MainBundle\Entity\Moto'
        ));
    }
}
