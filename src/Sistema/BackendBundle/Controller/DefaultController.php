<?php

namespace Sistema\BackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sistema\PaqueteBundle\Entity\Paquete;
use Sistema\PaqueteBundle\Form\PaqueteType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
//    /**
//     * @Route("/cambiar-a-{slug}", name="backend_cambiar")
//     * @Method("GET")
//     * @Template()
//     */
//    public function cambiarAction($slug)
//    {
//        $this->getRequest()->server->set('slug', $slug);
//        
//        $pagina = $this->getRequest()->server->get('HTTP_REFERER');
//        return new RedirectResponse($pagina, 302);
//    }
//    
//    /**
//     * @Route("/inicio", name="backend")
//     * @Template("BackendBundle:Paquete:index.html.twig")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        
//        $paquetes = $em->getRepository('PaqueteBundle:Paquete')->findAll();
//        
//        return array('paquetes' => $paquetes);
//    }
//    
//    /**
//     * @Route("/ver/{id}", name="backend_ver")
//     * @Template("BackendBundle:Paquete:ver.thml.twig")
//     */
//    public function verAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//        
//        $paquete = $em->getRepository('PaqueteBundle:Paquete')->find($id);
//        
//        if (!$paquete) {
//            throw $this->createNotFoundException('No existe Paquete');
//        }
//        return array('paquete' => $paquete);
//    }
//    
//    /**
//     * @Route("/nuevo", name="backend_nuevo")
//     * @Template("BackendBundle:Paquete:nuevo.html.twig")
//     */
//    public function nuevoAction()
//    {
//        $peticion = $this->getRequest();
//        
//        $paquete = new Paquete();
//        $form = $this->createForm(new PaqueteType(), $paquete);
//        
//        if ($peticion->getMethod() == 'POST') {
//            $form->bind($peticion);
//        
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($paquete);
//                $em->flush();
//
//                return $this->redirect($this->generateUrl('backend_ver', array('slug' => $paquete->getSlug())));
//            }
//        }
//        return array(
//            'paquete' => $paquete,
//            'form' => $form->createView());
//    }
//    
//    /**
//     * @Route("/editar/{slug}", name="backend_editar")
//     * @Template("BackendBundle:Paquete:editar.html.twig")
//     */
//    public function editarAction($slug)
//    {
//        $peticion = $this->getRequest();
//        $em = $this->getDoctrine()->getManager();
//
//        $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);
//
//        if (!$paquete) {
//            throw $this->createNotFoundException('Unable to find Paquete entity.');
//        }
//
//        $editForm = $this->createForm(new PaqueteType(), $paquete);
//
//        if ($peticion->getMethod() == 'POST') {
//            $editForm->bind($peticion);
//            
//            if ($editForm->isValid()) {
//                $em->persist($paquete);
//                $em->flush();
//                
//                return $this->redirect($this->generateUrl('backend_ver', array('slug' => $slug)));
//            }
//        }
//        return array(
//            'paquete'      => $paquete,
//            'edit_form'   => $editForm->createView(),
//        );
//    }
//    
//    /**
//     * @Route("/{slug}", name="backend_borrar")
//     * @Method("DELETE")
//     */
//    public function borrarAction(Request $request, $slug)
//    {
//        $form = $this->createDeleteForm($slug);
//        $form->bind($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);
//
//            if (!$paquete) {
//                throw $this->createNotFoundException('Unable to find Paquete entity.');
//            }
//
//            $em->remove($paquete);
//            $em->flush();
//        }
//
//        return $this->redirect($this->generateUrl('backend'));
//    }
//    
//    /**
//     * Creates a form to delete a Paquete entity by slug.
//     *
//     * @param mixed $slug The entity slug
//     *
//     * @return Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm($slug)
//    {
//        return $this->createFormBuilder(array('slug' => $slug))
//            ->add('slug', 'hidden')
//            ->getForm()
//        ;
//    }
}
