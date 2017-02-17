<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 23/03/2016
 * Time: 14:03
 */

namespace Annonce\MainBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function indexAction(){

        $user=$this->get("security.token_storage")->getToken()->getUser();

        return $this->render("AdminBase.html.twig",array("user"=>$user));
    }

}