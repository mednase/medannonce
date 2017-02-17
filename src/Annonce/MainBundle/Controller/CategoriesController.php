<?php

namespace Annonce\MainBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Annonce\MainBundle\Entity\Categories;

/**
 * Categories controller.
 *
 */
class CategoriesController extends Controller
{
    /**
     * Lists all Categories entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AnnonceMainBundle:Categories')->findAll();

        return $this->render(':categories:index.html.twig', array(
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new Categories entity.
     *
     */
    public function newAction(Request $request)
    {
        $category = new Categories();
        $form = $this->createForm('Annonce\MainBundle\Form\CategoriesType', $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('admin_categories_index');
        }

        return $this->render('categories/new.html.twig', array(
            'category' => $category,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Categories entity.
     *
     */
    public function editAction(Request $request, Categories $category)
    {
        $editForm = $this->createForm('Annonce\MainBundle\Form\CategoriesType', $category);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('admin_categories_edit', array('id' => $category->getId()));
        }

        return $this->render('categories/edit.html.twig', array(
            'category' => $category,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Categories entity.
     *
     */
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $categ=$em->getRepository('AnnonceMainBundle:Categories')->find($id);
        $em->remove($categ);
        $em->flush();
        return $this->redirectToRoute('admin_categories_index');
    }
    public function categorieAction(Request $request,$type){

        $session=$request->getSession();
        $panier=$session->get('panier');
        $em=$this->getDoctrine()->getManager();
        $categories=$em->getRepository("AnnonceMainBundle:Categories")->findAll();
        return $this->render('@AnnonceMain/categorie.html.twig',array("categories" => $categories,"type" => $type,"panier"=>$panier));
    }
}
