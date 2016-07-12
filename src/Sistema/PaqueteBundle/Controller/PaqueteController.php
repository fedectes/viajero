<?php

namespace Sistema\PaqueteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\PaqueteBundle\Entity\Paquete;
use Sistema\PaqueteBundle\Form\PaqueteType;
use Sistema\ClienteBundle\Entity\Cliente;

/**
 * Paquete controller.
 *
 * @Route("/paquete")
 */
class PaqueteController extends Controller
{
    /**
     * Lists all Paquete entities.
     *
     * @Route("/", name="paquete")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PaqueteBundle:Paquete')->findAll();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Paquete');
        }

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Finds and displays a Paquete entity.
     *
     * @Route("/ver/{id}", name="paquete_muestra")
     * @Method("GET")
     * @Template("PaqueteBundle:Default:muestra.html.twig")
     */
    public function muestraAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneById($id);

        if (!$entity) {
            throw $this->createNotFoundException('No existe Paque');
        }

        return array(
            'entity' => $entity,
        );
    }
    
    /**
     * Finds and displays a Paquete entity.
     *
     * @Route("/{slug}", name="paquete_ver")
     * @Method("GET")
     * @Template("PaqueteBundle:Paquete:ver.html.twig")
     */
    public function verAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('No existe Paque');
        }

        return array(
            'entity' => $entity,
        );
    }
    
}
