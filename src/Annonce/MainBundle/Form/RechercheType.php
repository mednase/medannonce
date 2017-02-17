<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 30/03/2016
 * Time: 22:19
 */

namespace Annonce\MainBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder,array $option){

        $builder->add('titre',TextType::class,array('attr' => array('class'=>'form-control','placeholder'=> 'Recherche ...',
            'label' => false,'name'=>'recherche'),"required"=>false ))
        ->add('zone',ChoiceType::class,array("label"=>false,
                'choices' => array(
                    'Toute la Tunisie'=>'Tunisie',
                    'Tunis' => 'Tunis',
                    'Gabès' => 'Gabès','Ariana'   => 'Ariana',
                    'Tataouine'   => 'Tataouine','Manouba'   => 'Manouba',
                    'mednine' => 'mednine','Sfax' => 'Sfax','Kébili' => 'Kébili',
                    'Tozeur' => 'Tozeur','Gafsa' => 'Gafsa','Sidi Bouzid' => 'Sidi Bouzid',
                    'Kasserine' => 'Kasserine','Kairouan' => 'Kairouan','Siliana' => 'Siliana',
                    'Le Kef' => 'Le Kef','Mahdia' => 'Mahdia','Monastir' => 'Monastir',
                    'Sousse' => 'Sousse','Zaghouan' => 'Zaghouan','Nabeul' => 'Nabeul',
                    'Ben Arous' => 'Ben Arous','Jendouba' => 'Jendouba','Béja' => 'Béja',
                    'Bizerte' => 'Bizerte'),
                'data' => 'Tunisie'
            ))
            ->add('categorie',ChoiceType::class,array("label"=>false,'choices' => array(
                    '<--VEHICULE-->'=>"vehicule",
                    'Voitrues'=>'voiture',
                    'Motos'=>'moto',
                    'Bateau'=>'Bateau',
                    'Camion & Carvaning'=>'camion',
                    'Piece & Accessoire'=>'piece',
                    '<--MULTIMEDIA-->'=>"multimedia",
                    'Telephonie'=>'telephone',
                    'Informatique'=>'informatique',
                    'Image & Son'=>'imageson',
                    'Console & Jeux'=>'console',
                    '<--Immobilier-->'=>"immobilier",
                    'Appartement'=>'appartement',
                    'maison'=>'maison',
                    'Bureaux'=>'bureaux',
                    'Terrains'=>'terrains',
                    '<--Emploi&Services-->'=>"service",
                    'Offre d emploi'=>'Oemploi',
                    'Demande d emploi'=>'Demploi',
                    'Affaire'=>'affaire',
                    'Service'=>'service',
                    '<--Loisirs-->'=>"loisir",
                    'Livres'=>'livres',
                    'Vélos'=>'velos',
                    'Animeaux'=>'animeaux',
                    'Jeux & Jouets'=>'jouet',
                    '<--Autres-->'=>"autres",
                    'Autres Produits'=>'autreP'
                ),'choices_as_values' => true
                ,'choice_attr' => array('<--VEICHULE-->' => array('class'=>'CateT'),
                        '<--MULTIMEDIA-->' => array('class'=>'CateT'),
                    '<--Immobilier-->' => array('class'=>'CateT'),
                        '<--Emploi&Services-->' => array('class'=>'CateT'),
                        '<--Loisirs-->' => array('class'=>'CateT'),
                        '<--Autres-->' => array('class'=>'CateT text-mute'))
                )
            );
    }

    public function getName(){
        return 'library_mainbundle_recherche';
    }
}