<?php

namespace Annonce\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaisonType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Chambre',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('Surface',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('etage',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('garage',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Annonce\MainBundle\Entity\Maison'
        ));
    }
}
