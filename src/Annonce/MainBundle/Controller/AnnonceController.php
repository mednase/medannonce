<?php

namespace Annonce\MainBundle\Controller;

use Annonce\MainBundle\Entity\Annonce;
use Annonce\MainBundle\Entity\Appartement;
use Annonce\MainBundle\Entity\Bureaux;
use Annonce\MainBundle\Entity\Camion;
use Annonce\MainBundle\Entity\Commentaire;
use Annonce\MainBundle\Entity\Favoris;
use Annonce\MainBundle\Entity\Maison;
use Annonce\MainBundle\Entity\Moto;
use Annonce\MainBundle\Entity\Telephone;
use Annonce\MainBundle\Entity\Terrains;
use Annonce\MainBundle\Entity\Voiture;
use Annonce\MainBundle\Form\AppartementType;
use Annonce\MainBundle\Form\BureauxType;
use Annonce\MainBundle\Form\CamionType;
use Annonce\MainBundle\Form\CommentaireType;
use Annonce\MainBundle\Form\MaisonType;
use Annonce\MainBundle\Form\MotoType;
use Annonce\MainBundle\Form\TelephoneType;
use Annonce\MainBundle\Form\TerrainsType;
use Annonce\MainBundle\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Annonce controller.
 *
 */
class AnnonceController extends Controller
{
    /**
     * Lists all Annonce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $Annonces = $em->getRepository('AnnonceMainBundle:Annonce')->findAll();

        return $this->render(':annonce:index.html.twig', array(
            'Annonces' => $Annonces,
        ));
    }

    /**
     * Creates a new Annonce entity.
     *
     */
    public function newAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm('Annonce\MainBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush();

            return $this->redirectToRoute('admin_annonce_show', array('id' => $annonce->getId()));
        }

        return $this->render('annonce/new.html.twig', array(
            'annonce' => $annonce,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Annonce entity.
     *
     */
    public function showAction(Annonce $Annonce)
    {
        $deleteForm = $this->createDeleteForm($Annonce);

        return $this->render('Annonce/show.html.twig', array(
            'annonce' => $Annonce,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Annonce entity.
     *
     */
    public function editAction(Request $request, Annonce $Annonce)
    {
        $deleteForm = $this->createDeleteForm($Annonce);
        $editForm = $this->createForm('Annonce\MainBundle\Form\AnnonceType', $Annonce);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Annonce);
            $em->flush();

            return $this->redirectToRoute('admin_annonce_edit', array('id' => $Annonce->getId()));
        }

        return $this->render('Annonce/edit.html.twig', array(
            'annonce' => $Annonce,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Annonce entity.
     *
     */
    public function deleteAction(Request $request, Annonce $Annonce)
    {
        $form = $this->createDeleteForm($Annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Annonce);
            $em->flush();
        }

        return $this->redirectToRoute('admin_annonce_index');
    }

    /**
     * Creates a form to delete a Annonce entity.
     *
     * @param Annonce $Annonce The Annonce entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Annonce $Annonce)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_annonce_delete', array('id' => $Annonce->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function AnnonceAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $Annonce=$em->getRepository('AnnonceMainBundle:Annonce')->findOneBy(array('id'=>$id));

        $entity = new Commentaire();

        $form=$this->createForm(CommentaireType::class,$entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setAnnonce($Annonce);
            $entity->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }
        return $this->render('AnnonceMainBundle::ViewAnnonce.html.twig',array("annonce"=>$Annonce,"form"=>$form->createView()));
    }

    public function removeFavAction(Request $request){

        $em=$this->getDoctrine()->getManager();
        $id=$request->query->get('num');
        $fav=$em->getRepository('AnnonceMainBundle:Favoris')->findOneBy(array('id'=>$id));
        $em->remove($fav);
        $em->flush();
        return new Response('Favoris Supprimer !');

    }

    public function getObjectFormAction(Request $request){
        $type = $request->query->get('type');
        switch( $type ) {
            case 'Voitrues':
                $form = $this->createForm(VoitureType::class, new Voiture());
                return $this->render('@AnnonceMain/Form_view/voiture_form.html.twig', array(
                    'formV' => $form->createView(),
                ));
                break;
            case 'Motos' :
                $form = $this->createForm(MotoType::class, new Moto());
                return $this->render('@AnnonceMain/Form_view/moto_form.html.twig', array(
                    'formM' => $form->createView(),
                ));

            case 'Camion & Carvaning':
                $form = $this->createForm(CamionType::class, new Camion());
                return $this->render('@AnnonceMain/Form_view/camion_form.html.twig', array(
                    'formC' => $form->createView(),
                ));

            case 'Appartement':
                $form = $this->createForm(AppartementType::class, new Appartement());
                return $this->render('@AnnonceMain/Form_view/appartement_form.html.twig', array(
                    'formA' => $form->createView(),
                ));
            case 'Bureaux':
                $form = $this->createForm(BureauxType::class, new Bureaux());
                return $this->render('@AnnonceMain/Form_view/bureaux_form.html.twig', array(
                    'formB' => $form->createView(),
                ));
            case 'maison':
                $form = $this->createForm(MaisonType::class, new Maison());
                return $this->render('@AnnonceMain/Form_view/maison_form.html.twig', array(
                    'formMai' => $form->createView(),
                ));
            case 'Terrains':
                $form = $this->createForm(TerrainsType::class, new Terrains());
                return $this->render('@AnnonceMain/Form_view/terrains_form.html.twig', array(
                    'formT' => $form->createView(),
                ));
            case 'Telephonie':
                $form = $this->createForm(TelephoneType::class, new Telephone());
                return $this->render('@AnnonceMain/Form_view/telephone_form.html.twig', array(
                    'formTel' => $form->createView(),
                ));
            default :return $response = new Response("");
        }

    }

    public function addFavorisAction(Request $request){

        $em=$this->getDoctrine()->getManager();
        $id=$request->query->get('num');
        $ann=$em->getRepository('AnnonceMainBundle:Annonce')->findOneBy(array('id'=>$id));
        $user=$this->get('security.token_storage')->getToken()->getUser();

        $fav = new Favoris();
        $fav->setUser($user);

        $fav->setAnnonce($ann);


        if($em->getRepository('AnnonceMainBundle:Favoris')->findOneBy(array('user'=>$user,'annonce'=>$ann))){
            return new Response('Déja dans Votre Liste de Favoris !');
        }
        $em->persist($fav);
        $em->flush();

        return new Response('a été ajouter a votre Liste de Favoris !');
    }
    public function getFavorisAction(){
        $Fav=$this->getUser()->getFavoris();
        var_dump($this->getUser()->getProfile()->getAdress());
    }

}
