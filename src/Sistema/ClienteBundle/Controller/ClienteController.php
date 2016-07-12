<?php

namespace Sistema\ClienteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\ClienteBundle\Entity\Cliente;
use Sistema\ClienteBundle\Form\ClienteType;


/**
 * Cliente controller.
 *
 * @Route("/cliente")
 */
class ClienteController extends Controller
{
    /**
     * Lists all Cliente entities.
     *
     * @Route("/", name="cliente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ClienteBundle:Cliente')->findAll();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Cliente');
        }

        return array(
            'entities' => $entities,
        );
    }
    
    /**
     *
     * @Route("/ver/{id}", name="cliente_muestra")
     * @Method("GET")
     * @Template("ClienteBundle:Default:muestrac.html.twig")
     */
    public function muestracAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        return array(
            'entity' => $entity,
        );
    }
    
    /**
     * Creates a new Cliente entity.
     *
     * @Route("/", name="cliente_create")
     * @Method("POST")
     * @Template("ClienteBundle:Cliente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Cliente();
        $form = $this->createForm(new ClienteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Cliente creado satisfactoriamente!!');
            
            return $this->redirect($this->generateUrl('cliente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }    

    /**
     * Displays a form to create a new Cliente entity.
     *
     * @Route("/nuevo", name="cliente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Cliente();
        $entity->setFechaNacim(new \DateTime('today - 18 years'));
        
        $form   = $this->createForm(new ClienteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    

    /**
     * Finds and displays a Cliente entity.
     *
     * @Route("/{id}", name="cliente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se ha podido encontrar el Cliente selecciondo');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Cliente entity.
     *
     * @Route("/{id}/editar", name="cliente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $editForm = $this->createForm(new ClienteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Cliente entity.
     *
     * @Route("/{id}", name="cliente_update")
     * @Method("PUT")
     * @Template("ClienteBundle:Cliente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cliente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ClienteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Cliente modificado satisfactoriamente!!');

            return $this->redirect($this->generateUrl('cliente_show', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Cliente entity.
     *
     * @Route("/{id}", name="cliente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ClienteBundle:Cliente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('No se ha podido encontrar el Cliente seleccionado');
            }

            $em->remove($entity);
            $em->flush();
            
            $this->get('session')->getFlashBag()->add('notice', 'Cliente elimindo satisfactoriamente!!');
            
        }

        return $this->redirect($this->generateUrl('cliente'));
    }

    /**
     * Creates a form to delete a Cliente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    
}
