<?php

namespace Sistema\BackendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\PaqueteBundle\Entity\Paquete;
use Sistema\PaqueteBundle\Entity\Venta;
use Sistema\ClienteBundle\Entity\Cliente;
use Sistema\PaqueteBundle\Form\PaqueteType;
use Sistema\PaqueteBundle\Form\VentaType;

class AdminController extends Controller
{
    /**
     * Lists all Paquete entities.
     *
     * @Route("/inicio", name="backend")
     * @Method("GET")
     * @Template("BackendBundle:Paquete:index.html.twig")
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
     * Displays a form to create a new Paquete entity.
     *
     * @Route("/nuevo", name="paquete_new")
     * @Method("GET")
     * @Template("BackendBundle:Paquete:nuevo.html.twig")
     */
    public function newAction()
    {
        $entity = new Paquete();
        $form   = $this->createForm(new PaqueteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Creates a new Paquete entity.
     *
     * @Route("/", name="paquete_create")
     * @Method("POST")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $entity  = new Paquete();
        $form = $this->createForm(new PaqueteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Paquete creado satisfactoriamente...!!!');
            
            return $this->redirect($this->generateUrl('paquete_show', array(
                
                'slug'  => $entity->getSlug())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Paquete entity.
     *
     * @Route("/{slug}/edit", name="paquete_edit")
     * @Method("GET")
     * @Template("BackendBundle:Paquete:edit.html.twig")
     */
    public function editAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $editForm = $this->createForm(new PaqueteType(), $entity);
        $deleteForm = $this->createDeleteForm($slug);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Paquete entity.
     *
     * @Route("/{slug}", name="paquete_update")
     * @Method("PUT")
     * @Template()
     */
    public function updateAction(Request $request, $slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $deleteForm = $this->createDeleteForm($slug);
        $editForm = $this->createForm(new PaqueteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Paquete modificado satisfactoriamente!!');

            return $this->redirect($this->generateUrl('paquete_show', array('slug' => $slug)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Deletes a Paquete entity.
     *
     * @Route("/{slug}", name="paquete_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $slug)
    {
        $form = $this->createDeleteForm($slug);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Paquete entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('backend'));
    }

    /**
     * Creates a form to delete a Paquete entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($slug)
    {
        return $this->createFormBuilder(array('slug' => $slug))
            ->add('slug', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * @Route("/venta", name="ventas_backend")
     * @Method("GET")
     * @Template("BackendBundle:Venta:index.html.twig")
     */
    public function ventasAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('PaqueteBundle:Venta')->findAll();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Ventas');
        }

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Displays a form to edit an existing Venta entity.
     *
     * @Route("/{id}/editar", name="venta_editar")
     * @Method("GET")
     * @Template("BackendBundle:Venta:editar.html.twig")
     */
    public function editarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Paquete entity.');
        }

        $editarForm = $this->createForm(new VentaType(), $entity);
        $eliminarForm = $this->createEliminarForm($id);

        return array(
            'entity'      => $entity,
            'editar_form'   => $editarForm->createView(),
            'eliminar_form' => $eliminarForm->createView(),
        );
    }
    
    /**
     * Edits an existing Paquete entity.
     *
     * @Route("/{id}/editado", name="venta_actualizar")
     * @Method("PUT")
     * @Template()
     */
    public function actualizarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Venta entity.');
        }

        $eliminarForm = $this->createEliminarForm($id);
        $editarForm = $this->createForm(new VentaType(), $entity);
        $editarForm->bind($request);

        if ($editarForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('venta_ver', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'editar_form'   => $editarForm->createView(),
            'eliminar_form' => $eliminarForm->createView(),
        );
    }
    
    /**
     * Deletes a Venta entity.
     *
     * @Route("/{id}/eliminar", name="venta_delete")
     * @Method("DELETE")
     */
    public function eliminarAction(Request $request, $id)
    {
        $form = $this->createEliminarForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('PaqueteBundle:Venta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Venta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ventas_backend'));
    }

    /**
     * Creates a form to delete a Venta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createEliminarForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * Finds and displays a Venta entity.
     *
     * @Route("/{id}/ver", name="venta_ver")
     * @Method("GET")
     * @Template("BackendBundle:Venta:ver.html.twig")
     */
    public function verAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No existe Venta');
        }

        $eliminarForm = $this->createEliminarForm($id);

        return array(
            'entity'      => $entity,
            'eliminar_form' => $eliminarForm->createView(),
        );
    }
    
    /**
     * Lists all Usuario entities.
     *
     * @Route("/vendedor", name="vendedor")
     * @Method("GET")
     * @Template("BackendBundle:Vendedor:index.html.twig")
     */
    public function vendedorAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UsuarioBundle:Usuario')->findAll();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Usuario');
        }

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     * Finds and displays a Usuario entity.
     *
     * @Route("/{id}/detalle", name="vendedor_show")
     * @Method("GET")
     * @Template("BackendBundle:Vendedor:detalle.html.twig")
     */
    public function mostrarAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsuarioBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }
        
        $borrarForm = $this->createBorrarForm($id);

        return array(
            'entity'      => $entity,
            'borrar_form' => $borrarForm->createView(),
        );
    }
    
    /**
     * Deletes a Usuario entity.
     *
     * @Route("/{id}/baja", name="vendedor_delete")
     * @Method("DELETE")
     */
    public function borrarAction(Request $request, $id)
    {
        $form = $this->createBorrarForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsuarioBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Usuario elimindo satisfactoriamente!!');
        }

        return $this->redirect($this->generateUrl('vendedor'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createBorrarForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    /**
     * Finds and displays a Paquete entity.
     *
     * @Route("/{slug}", name="paquete_show")
     * @Method("GET")
     * @Template("BackendBundle:Paquete:show.html.twig")
     */
    public function showAction($slug)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

        if (!$entity) {
            throw $this->createNotFoundException('No existe Paqueee');
        }
        
        $deleteForm = $this->createDeleteForm($slug);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * @Route("/admin/login", name="admin_login")
     * @Route("/admin/login_check", name="admin_login_check")
     * @Route("/admin/logout", name="admin_logout")
     */
    public function loginadminAction()
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
    
}
