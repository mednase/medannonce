<?php

namespace Annonce\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnoncesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',null,array("label"=>false))
            ->add('description',TextareaType::class,array("label"=>false))
            ->add('gouvernorat',ChoiceType::class,array("label"=>false,
                'choices' => array(
        'Tunis' => 'Tunis',
        'Gabès' => 'Gabès','Ariana'   => 'Ariana',
        'Tataouine'   => 'Tataouine','Manouba'   => 'Manouba',
        'mednine' => 'mednine','Sfax' => 'Sfax','Kébili' => 'Kébili',
        'Tozeur' => 'Tozeur','Gafsa' => 'Gafsa','Sidi Bouzid' => 'Sidi Bouzid',
        'Kasserine' => 'Kasserine','Kairouan' => 'Kairouan','Siliana' => 'Siliana',
        'Le Kef' => 'Le Kef','Mahdia' => 'Mahdia','Monastir' => 'Monastir',
        'Sousse' => 'Sousse','Zaghouan' => 'Zaghouan','Nabeul' => 'Nabeul',
        'Ben Arous' => 'Ben Arous','Jendouba' => 'Jendouba','Béja' => 'Béja',
        'Bizerte' => 'Bizerte')

            ))
            ->add('adresse',null,array("label"=>false))
            ->add('prix',null,array("label"=>false))
            ->add('categorie',ChoiceType::class,array("label"=>false,'choices' => array(
                    '<--VEICHULE-->'=>null,
                    'Voitrues'=>'voiture',
                    'Motos'=>'moto',
                    'Bateau'=>'Bateau',
                    'Camion & Carvaning'=>'camion',
                    'Piece & Accessoire'=>'piece',
                    '<--MULTIMEDIA-->'=>null,
                    'Telephonie'=>'telephone',
                    'Informatique'=>'informatique',
                    'Image & Son'=>'imageson',
                    'Console & Jeux'=>'console',
                    '<--Immobilier-->'=>null,
                    'Appartement'=>'appartement',
                    'maison'=>'maison',
                    'Bureaux'=>'bureaux',
                    'Terrains'=>'terrains',
                    '<--Emploi&Services-->'=>null,
                    'Offre d emploi'=>'Oemploi',
                    'Demande d emploi'=>'Demploi',
                    'Affaire'=>'affaire',
                    'Service'=>'service',
                    '<--Loisirs-->'=>null,
                    'Livres'=>'livres',
                    'Vélos'=>'velos',
                    'Animeaux'=>'animeaux',
                    'Jeux & Jouets'=>'jouet',
                    '<--Autres-->'=>null,
                    'Autres Produits'=>'autreP'
                ),'choices_as_values' => true
                ,'choice_attr' => array('<--VEICHULE-->' => array('disabled'=>true,'class'=>'CateT'),
                        '<--MULTIMEDIA-->' => array('disabled'=>true,'class'=>'CateT'),
                        '<--Immobilier-->' => array('disabled'=>true,'class'=>'CateT'),
                        '<--Emploi&Services-->' => array('disabled'=>true,'class'=>'CateT'),
                        '<--Loisirs-->' => array('disabled'=>true,'class'=>'CateT'),
                        '<--Autres-->' => array('disabled'=>true,'class'=>'CateT text-mute'))
                )
            )

            ->add('images', CollectionType::class, array('entry_type' => imageType::class))
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
