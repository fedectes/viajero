<?php

namespace Sistema\UsuarioBundle\Listener;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Core\SecurityContext;

class LoginListener
{
    private $contexto, $router, $username;
    
    public function __construct(SecurityContext $context, Router $router)
    {
        $this->contexto = $context;
        $this->router = $router;
    }
    
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $token = $event->getAuthenticationToken();
        $this->username = $token->getUser()->getRoles();
//        print_r($this->username);
//        die();
    }
    
    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (null != $this->username) {
            if ($this->contexto->isGranted('ROLE_ADMIN')) {
                $portada = $this->router->generate('extranet');
            } else {
                $portada = $this->router->generate('venta_nueva');
            }
            $event->setResponse(new RedirectResponse($portada));
            $event->stopPropagation();
        }
    }
}