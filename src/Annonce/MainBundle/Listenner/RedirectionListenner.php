<?php
/**
 * Created by IntelliJ IDEA.
 * User: medna
 * Date: 28/03/2016
 * Time: 08:39
 */

namespace Annonce\MainBundle\Listenner;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListenner
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.token_storage');
        $this->securityCheker=$container->get('security.authorization_checker');
    }

    public function onKernelRequest(GetResponseEvent $event)
    {

        $route = $event->getRequest()->attributes->get('_route');
        if ($route != null) {
            if (is_object($this->securityContext->getToken()->getUser())) {
                if ($route == 'fos_user_security_login' || $route == 'fos_user_registration_register') {
                    $event->setResponse(new RedirectResponse($this->router->generate('fos_user_profile_show')));
                }elseif($route== 'acceuil' && $this->securityCheker->isGranted("ROLE_SUPER_ADMIN")) {
                    $event->setResponse(new RedirectResponse($this->router->generate("admin")));
                }

            } elseif (!is_object($this->securityContext->getToken()->getUser())) {
                if ($route == 'med_annonce_depose' || $route=='fos_user_profile_show' || $route == 'fos_user_profile_edit' || $route == 'fos_user_security_logout') {
                    $this->session->getFlashBag()->add('notification', '  Vous devez vous identifier  .');
                    $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
                }
            }
        }
    }
}