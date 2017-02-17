<?php

namespace Annonce\MainBundle\Controller;

use Annonce\MainBundle\Entity\Appartement;
use Annonce\MainBundle\Entity\Bureaux;
use Annonce\MainBundle\Entity\Camion;
use Annonce\MainBundle\Entity\image;
use Annonce\MainBundle\Entity\Annonce;
use Annonce\MainBundle\Entity\Maison;
use Annonce\MainBundle\Entity\Moto;
use Annonce\MainBundle\Entity\Telephone;
use Annonce\MainBundle\Entity\Terrains;
use Annonce\MainBundle\Entity\Voiture;
use Annonce\MainBundle\Form\RechercheType;
use Annonce\MainBundle\Form\AnnoncesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    private  $zones= ['Tunisie','Gabès','Tataouine','mednine','Kébili',
                    'Tozeur','Gafsa','Sfax','Sidi Bouzid','Kasserine',
                    'Kairouan','Siliana','Le Kef','Mahdia'
                    ,'Monastir','Sousse','Zaghouan','Nabeul','Ben Arous'
                    ,'Jendouba','Béja','Bizerte','Ariana','Tunis'
                    ,'Manouba'];
    public function indexAction()
    {
        return $this->render(':default:index.html.twig');
    }

    public function messageAction()
    {
        $user=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $messages=$em->getRepository("AnnonceMainBundle:Message")->findBy(array("distinateur"=>$user));
        return $this->render("AnnonceMainBundle::messages.html.twig", array(
            'messages'=>$messages));
    }

    public function accueilAction($zone)
    {
        if(!in_array($zone,$this->zones))
            return $this->render("AnnonceMainBundle::notfound.html.twig");

        $em=$this->getDoctrine()->getManager();
        $allCat=$em->getRepository('AnnonceMainBundle:Categories')->findAll();
        $annonces=$em->getRepository('AnnonceMainBundle:Annonce')->findByGouv($zone);
        if($zone=="Tunisie")
            $annonces=$em->getRepository('AnnonceMainBundle:Annonce')->findAll();
        return $this->render("AnnonceMainBundle::accueil.html.twig",array("annonces"=>$annonces,"path2"=>$zone,"route2"=>$this->generateUrl('get_zone',array('zone'=>$zone))
        ,'categories'=>$allCat
        ,'zones'=>$this->zones));
    }


    public function categorieAction(Request $request,$zone,$categorie)
    {
        $em=$this->getDoctrine()->getManager();

        if($request->getMethod()=="GET"){
            $rech = $request->query->get('rech');
            $query=$em->getRepository('AnnonceMainBundle:Annonce')->createQueryBuilder('a')->where("a.titre LIKE :titre")->setParameter("titre","%".$rech."%");
            $annonces=$query->getQuery()->getResult();
            return $this->render('@AnnonceMain/accueil.html.twig',array("annonces"=>$annonces
            ,"path2"=>"Tunisie","route2"=>$this->generateUrl('get_zone',array('zone'=>"tunisie"))
            ,'zones'=>$this->zones));
        }

        $categories=$em->getRepository('AnnonceMainBundle:SousCategories')->findOneBy(array('nom'=>$categorie));
        $allCat=$em->getRepository('AnnonceMainBundle:Categories')->findAll();

        if($categories!=null){
            if($zone=="Tunisie") {
                $annonce = $em->getRepository('AnnonceMainBundle:Annonce')->findBy(array("categorie" => $categories));
            }else
                $annonce = $em->getRepository('AnnonceMainBundle:Annonce')->findBy(array("gouvernorat"=>$zone,"categorie"=>$categories));

        }elseif($categorie="all")
            $annonce= $em->getRepository('AnnonceMainBundle:Annonce')->findBy(array('gouvernorat'=>$zone));
        else
            return $this->render("AnnonceMainBundle::notfound.html.twig");

        return $this->render("AnnonceMainBundle::accueil.html.twig",array("annonces"=>$annonce,"path"=>$categorie
        ,"route"=>$this->generateUrl('get_categorie',array('zone'=>$zone,'categorie'=>$categorie))
        ,"path2"=>$zone,"route2"=>$this->generateUrl('get_zone',array('zone'=>$zone))
        ,'categories'=>$allCat
        ,'zones'=>$this->zones));
    }

    public function rechercheAction(Request $request)
    {
        $form=$this->createForm(RechercheType::class);
        $form->handleRequest($request);
        $em=$this->getDoctrine()->getManager();

        if ($form->isSubmitted()) {
            $titre=$form['titre']->getData();
            $categorie=$form['categorie']->getData();
            $zone=$form['zone']->getData();

            $cat=$em->getRepository('AnnonceMainBundle:SousCategories')->findOneBy(array('nom'=>$categorie));


            if($titre == null)
                $titre="";

            $parameters=array('zone'=>'%'.$zone.'%','cat'=>$cat,
                'titre'=>'%'.$titre.'%');

            if($zone=="Tunisie")
                $parameters['zone']="%%";


            if($cat == null) {

                $c=$em->getRepository("AnnonceMainBundle:Categories")->findOneBy(array('nom'=>$categorie));
                $sc=$em->getRepository("AnnonceMainBundle:SousCategories")->findBy(array("categorie"=>$c));
                $query=$em->getRepository('AnnonceMainBundle:Annonce')->createQueryBuilder('a')->where("a.titre LIKE :titre")->andWhere('a.gouvernorat LIKE :zone')
                ->andWhere('a.categorie IN (:cat)');
                $parameters['cat']=$sc;
                $query->setParameters($parameters);
            }else
            $query=$em->getRepository('AnnonceMainBundle:Annonce')->createQueryBuilder('a')->where("a.titre LIKE :titre")->andWhere('a.gouvernorat LIKE :zone')
                ->andWhere('a.categorie = :cat')->setParameters($parameters);



                $annonces=$query->getQuery()->getResult();


            return $this->render('@AnnonceMain/accueil.html.twig',array("annonces"=>$annonces
            ,"path2"=>$zone,"route2"=>$this->generateUrl('get_zone',array('zone'=>$zone))
            ,'zones'=>$this->zones));


        }


        return $this->render('@AnnonceMain/recherche.html.twig',array("form"=>$form->createView()));


    }





    // Deposer Une Annonce

    public function deposerAnnonceAction(Request $request){

        $annonce=new Annonce();
        $annonce->addImage(new image($annonce));
        $annonce->addImage(new image($annonce));
        $annonce->addImage(new image($annonce));
        $form=$this->createForm(AnnoncesType::class,$annonce);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $idCat=$request->get('annonces')['categorie'];
            $em=$this->getDoctrine()->getManager();
            $Scat=$em->getRepository('AnnonceMainBundle:SousCategories')->findOneBy(array('id'=>$idCat));
            $annonce->setCategorie($Scat);

            switch($Scat->getNom()){
                case 'voiture':

                    $voiture=new Voiture();
                    $voiture->setAnnee($request->get('voiture')['Annee']);
                    $voiture->setMarque($request->get('voiture')['Marque']);
                    $voiture->setModele($request->get('voiture')['Modele']);
                    $voiture->setKilometrage($request->get('voiture')['Kilometrage']);
                    $voiture->setEnergie($request->get('voiture')['Energie']);
                    $voiture->setBoitueVitesse($request->get('voiture')['BoitueVitesse']);

                    $annonce->setObjAnnonce($voiture);
                    break;

                case 'moto':

                    $moto=new Moto();
                    $moto->setAnnee($request->get('moto')['Annee']);
                    $moto->setMarque($request->get('moto')['Marque']);
                    $moto->setCylindre($request->get('moto')['Cylindre']);
                    $moto->setKilometrage($request->get('moto')['Kilometrage']);
                break;


                case 'camion':

                    $camion=new Camion();
                    $camion->setAnnee($request->get('camion')['Annee']);
                    $camion->setMarque($request->get('camion')['Marque']);
                    $camion->setModele($request->get('camion')['Modele']);
                    $camion->setKilometrage($request->get('camion')['Kilometrage']);
                    break;

                case 'maison':
                    $maison=new Maison();
                    $maison->setChambre($request->get('maison')['chambre']);
                    $maison->setEtage($request->get('maisons')['Etage']);
                    $maison->setSurface($request->get('maisons')['Surface']);
                    $maison->setGarage($request->get('maison')['Garage']);

                    break;


                case 'appartement':

                    $appartement=new Appartement();
                    $appartement->setChambre($request->get('appartement')['Chambre']);
                    $appartement->setSurface($request->get('appartement')['Surface']);
                    $appartement->setParking($request->get('appartement')['Parking']);
                    break;



                case 'telephone':

                    $telephone=new Telephone();
                    $telephone->setMarque($request->get('telephone')['Marque']);
                    $telephone->setModele($request->get('telephone')['Modele']);
                    break;

                case 'terrains':

                    $terrains=new Terrains();
                    $terrains->setTypeTerrains($request->get('terrains')['TypeTerrains']);
                    $terrains->setSurface($request->get('terrains')['Surface']);

                    break;

                case 'bureaux':

                    $bureaux=new Bureaux();
                    $bureaux->setSurface($request->get('bureaux')['Surface']);

                    break;



                default:break;


            }








            $annonce->setUser($this->get('security.token_storage')->getToken()->getUser());
            $annonce->removeEmptyImage();
            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('accueil');
        }
        return $this->render("AnnonceMainBundle::Deposer.html.twig",array("form"=>$form->createView()));
    }


}
