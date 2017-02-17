<?php

namespace Annonce\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Marque',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('Modele',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('Annee',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('Kilometrage',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('Energie',null,array("label"=>false,'attr'=>array('class'=>'form-control')))
            ->add('BoitueVitesse',ChoiceType::class,array("label"=>false,'attr'=>array('class'=>'form-control'),
                'choices'=>array('Manuelle'=>'manuelle','Automatique'=>'automatique')));
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Annonce\MainBundle\Entity\Voiture'
        ));
    }
}
