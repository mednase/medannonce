<?php

namespace Annonce\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',null,array("label"=>false))
            ->add('description',null,array("label"=>false))
            ->add('gouvernorat',null,array("label"=>false))
            ->add('adresse',null,array("label"=>false))
            ->add('prix',null,array("label"=>false))
            ->add('categorie',CategoriesType::class)
            ->add('user',null,array("label"=>false))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Annonce\MainBundle\Entity\Annonce'
        ));
    }
}
