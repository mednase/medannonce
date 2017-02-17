<?php

namespace Annonce\UserBundle\Controller;

use Annonce\MainBundle\Entity\Message;
use Annonce\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 */
class UserController extends Controller
{
    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AnnonceUserBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('Annonce\UserBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_users_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction(User $user)
    {
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction(Request $request, User $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('Annonce\UserBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_users_edit', array('id' => $user->getId()));
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }



    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('admin_users_index');
    }


    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_users_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



    public function envoiMessageAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $titre=$request->query->get('titre');
        $contenu=$request->query->get('contenu');
        $userS=$this->getUser();
        $userD=$em->getRepository("AnnonceUserBundle:User")->find($request->query->get('id'));

        $message = new Message();
        $message->setTitre($titre);
        $message->setContenu($contenu);
        $message->setSource($userS);
        $message->setDistinateur($userD);

        $em->persist($message);
        $em->flush();

        return new Response("sucess");
    }


    public function NotifyMessageAction()
    {
        $user=$this->getUser();
        $em=$this->getDoctrine()->getManager();
        $message=$em->getRepository("AnnonceMainBundle:Message")->getNewMessage($user);

        $response=array("html"=>$this->renderView("AnnonceMainBundle::NotifyMessage.html.twig"
            ,array("messages"=>$message)),"nbr"=>count($message));

        return  new Response(json_encode($response));

    }

    public function deleteMessageAction(Request $request)
    {
        $id=$request->query->get('id');
        $em=$this->getDoctrine()->getManager();
        $message=$em->getRepository("AnnonceMainBundle:Message")->find($id);
        $em->remove($message);
        $em->flush();
        return new Response("Success");
    }

}
