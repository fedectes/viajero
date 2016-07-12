<?php

namespace Sistema\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\UsuarioBundle\Entity\Usuario;
use Sistema\UsuarioBundle\Form\UsuarioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Default controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/registro", name="usuario_registro")
     * @Template("UsuarioBundle:Usuario:registro.html.twig")
     */
    public function registroAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entity = new Usuario();
        
        $form = $this->createForm(new UsuarioType(), $entity);
        
        if ($request->getMethod() == 'POST') {           

            $form->bind($request);

            if ($form->isValid()) {
                
                $encoder = $this->get('security.encoder_factory')
                                ->getEncoder($entity);
                $passCodificado = $encoder->encodePassword(
                        $entity->getPassword(),
                        $entity->getSalt()
                );
                $entity->setPassword($passCodificado);
                
                $em->persist($entity);
                $em->flush();

                $this->get('session')->getFlashBag()->add('info', 'Te has registrado correctamente..!!');

                $token = new UsernamePasswordToken($entity, null, 'frontend', $entity->getRoles());
                $this->container->get('security.context')->setToken($token);

                return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
            }
        }        
        return array (
            'entity' => $entity,
            'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/login", name="login")
     * @Route("/login_check", name="login_check")
     * @Route("/logout", name="usuario_logout")
     */
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        
        $error = $peticion->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR,
            $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
        );
        
        return $this->render('UsuarioBundle:Default:login.html.twig', array(
            'last_username' => $sesion->get(SecurityContext::LAST_USERNAME),
            'error' => $error
        ));
    }
    
    public function cajaLoginAction($id = '')
    {
        $usuario = $this->get('security.context')->getToken()->getUser();

        $respuesta = $this->render('UsuarioBundle:Default:cajaLogin.html.twig', array(
            'id' => $id,
            'usuario' => $usuario
        ));

        $respuesta->setMaxAge(30);

        return $respuesta;
    }
    
    /**
     * @Route("/perfil", name="usuario_perfil")
     * @Template("UsuarioBundle:Usuario:perfil.html.twig")
     */
    public function perfilAction()
    {
        $peticion = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        
        $entity = $this->get('security.context')->getToken()->getUser();
        $form = $this->createForm(new UsuarioType(), $entity);
        
        if ($peticion->getMethod() == 'POST') {
            $passwordOriginal = $form->getData()->getPassword();
            $form->bind($peticion);
            
            if ($form->isValid()) {
                if (null == $entity->getPassword()) {
                    $entity->setPassword($passwordOriginal);
                }
                else {
                    $encoder = $this->get('security.encoder_factory')
                                    ->getEncoder($entity);
                    $passCodificado = $encoder->encodePassword(
                        $entity->getPassword(),
                        $entity->getSalt()
                );
                $entity->setPassword($passCodificado);
                }
                $em->persist($entity);
                $em->flush();
               
                $this->get('session')->getFlashBag()->add('info',
                    'Los datos de tu perfil se han actualizado correctamente'
                );
                return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
            }
        }
        return array (
            'entity' => $entity,
            'form' => $form->createView()
        );
    }


    /**
     * @Route("/default")
     * @Template("UsuarioBundle:Usuario:default.html.twig")
     */
    public function defaultAction()
    {
        $contexto = $this->get('security.context');
        
        if($contexto->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')){
            
        }
        elseif ($contexto->isGranted('IS_AUTHENTICATED_REMEMBERED')){
            
        }
        elseif ($contexto->isGranted('IS_AUTHENTICATED_FULLY')){
            
        }
        $usuario = $this->get('security.context')->getToken()->getUsuario();
        $nombre = $usuario->getNombre();
    }

    /**
     * @Route("/ventas")
     * @Template("UsuarioBundle:Usuario:ventasusu.html.twig")
     */
    public function ventaAction()
    {
        $usuario_id = 1;
        
        $em = $this->getDoctrine()->getManager();
        $ventas = $em->getRepository('UsuarioBundle:Usuario')
                     ->findTodasLasVentas($usuario_id);
        
        return array (
            'ventas' => $ventas
        );
    }

}
