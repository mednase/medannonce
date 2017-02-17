<?php

namespace Annonce\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Nom', 'label' => false)))
            ->add('prenom', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Prenom', 'label' => false)))
            ->add('date_naissance',DateType::class, array('label' => false,'format'=>'dd-MM-yyyy','widget'=>'single_text',
                'attr' => array('class'=>'form-control input-inline datepicker','data-provider'=>'datepicker','data-date-format' => 'dd-mm-yyyy' ),
            ))->add('photo',PhotoType::class)
            ->add('genre', ChoiceType::class, array('choices' => array(
                'Homme' => 'Homme',
                'Femme' => 'Femme'
            ), 'label' => false,
                'multiple' => false,
                'expanded' => true,
                'required' => true,

            ))
            ->add('telephone', TextType::class, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg bfh-phone', 'placeholder' =>
                'Telepone', 'format' => '(+213) dd-ddd-ddd', 'label' => false)))
            ->add('adresse', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Adresse', 'label' => false)))

            ->add('gouvernorat', ChoiceType::class, array( 'choices' => array(
                'Tunis' => 'Tunis',
                'Gabès' => 'Gabès','Ariana'   => 'Ariana',
                'Tataouine'   => 'Tataouine','Manouba'   => 'Manouba',
                'mednine' => 'mednine','Sfax' => 'Sfax','Kébili' => 'Kébili',
                'Tozeur' => 'Tozeur','Gafsa' => 'Gafsa','Sidi Bouzid' => 'Sidi Bouzid',
                'Kasserine' => 'Kasserine','Kairouan' => 'Kairouan','Siliana' => 'Siliana',
                'Le Kef' => 'Le Kef','Mahdia' => 'Mahdia','Monastir' => 'Monastir',
                'Sousse' => 'Sousse','Zaghouan' => 'Zaghouan','Nabeul' => 'Nabeul',
                'Ben Arous' => 'Ben Arous','Jendouba' => 'Jendouba','Béja' => 'Béja',
                'Bizerte' => 'Bizerte',)
            ,'label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Gouvernorat', 'label' => false)))
            ->add('codePostale', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Code Postale', 'label' => false)))
            ->add('facebok', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'FaceBook', 'label' => false)))
            ->add('skype', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Skype', 'label' => false)))
            ->add('twitter', null, array('label' => false, 'translation_domain' => 'FOSUserBundle', 'attr' => array('class' => 'form-control input-lg', 'placeholder' =>
                'Twitter', 'label' => false)));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Annonce\UserBundle\Entity\Profile'
        ));
    }
}
