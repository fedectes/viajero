<?php

namespace Sistema\PaqueteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\PaqueteBundle\Entity\Paquete;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Default controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/inicio", name="inicio")
     * @Method("GET")
     * @Template("PaqueteBundle:Default:portada.html.twig")
     */
    public function portadaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PaqueteBundle:Paquete')->findPaqueteDelDia();
        
                
        if (!$entities) {
            throw $this->createNotFoundException('No existe Paque');
        }

        return array('entities' => $entities,
        );
    }

//   /**
//     * @Route("/paquete/cambiar-a-{slug}", name="paquete_cambiar")
//     * @Method("GET")
//     * @Template()
//     */
//    public function cambiarAction($slug)
//    {
//        return new RedirectResponse ($this->generateUrl('paquete_muestra', array('slug' => $slug,)));
//    }
//    
//    public function listaPaqueteAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        
//        $entities = $em->getRepository('PaqueteBundle:Paquete')->findAll();
//        
//        if (!$entities) {
//            throw $this->createNotFoundException('No existe Paquete');
//        }
//        
//        return $this->render('PaqueteBundle:Default:listaPaquete.html.twig', array('entities' => $entities,));
//    }
    
   /**
     * @Route("/cliente/cambiar-a-{id}", name="cliente_cambiar")
     * @Method("GET")
     * @Template()
     */    
    public function cambiarAction($id)
    {
        return new RedirectResponse ($this->generateUrl('cliente_muestrac', array('id' => $id,)));
    }
    
    public function listaClienteAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('ClienteBundle:Cliente')->findAll();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Cliente');
        }
        
        return $this->render('PaqueteBundle:Default:listaCliente.html.twig', array('entities' => $entities,));
    }
    
    /**
     * @Route("/java", name="java")
     * @Method("GET")
     * @Template("PaqueteBundle:Default:javascript.html.twig")
     */
    public function javascriptAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PaqueteBundle:Paquete')->findAll();

        return array('entities' => $entities,
        );
    }
    
}
