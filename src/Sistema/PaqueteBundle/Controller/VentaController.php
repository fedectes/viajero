<?php

namespace Sistema\PaqueteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sistema\PaqueteBundle\Entity\Venta;
use Sistema\PaqueteBundle\Entity\Paquete;
use Sistema\ClienteBundle\Entity\Cliente;
use Sistema\UsuarioBundle\Entity\Usuario;
use Sistema\PaqueteBundle\Form\VentaType;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Venta controller.
 *
 * @Route("/venta")
 */
class VentaController extends Controller
{
    /**
     * Lists all Ventas entities.
     *
     * @Route("/", name="ventas")
     * @Method("GET")
     * @Template("PaqueteBundle:Venta:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $total = $em->getRepository('PaqueteBundle:Venta')->cuentaVentas();
        //die(" ".$total);
        $page = $request->get('page');
        $porpagina = 4;
        $totalPaginas = ceil($total / $porpagina);
        if(!is_numeric($page))
            {
                $page = 1;
            }else
            {
                $page = floor($page);
            }
            if($total <= $porpagina)
            {
                $page = 1;
            }
            if(($page * $porpagina) > $total)
            {
                $page = $totalPaginas;
            }
            $offset = 0;
            if($page > 1)
            {
                $offset = $porpagina * ($page - 1);
            }
                    
        $entities = $em->getRepository('PaqueteBundle:Venta')->totalVentas($offset, $porpagina);
                        
        $ventas = $em->getRepository('PaqueteBundle:Venta')->findUltimasVentas();
        
        if (!$entities) {
            throw $this->createNotFoundException('No existe Ventas');
        }
        return array(
            'entities' => $entities,
            'ventas' => $ventas,
            'porpagina' => $porpagina,
            'totalPaginas' => $totalPaginas,
            'total' => $total,
            'page' => $page
        );
    }
    
    /**
     * Creates a new Venta entity.
     *
     * @Route("/nueva", name="venta_nueva")
     * 
     * @Template("PaqueteBundle:Venta:nueva.html.twig")
     */
    public function venderAction(Request $request)
    {
        $user = $this->get('security.context')->getToken()->getUser();

        $entity = new Venta();
        $form = $this->createForm(new VentaType(), $entity);
        $form->bind($request);
        
        if($user != 'anon.') {
        $entity->setUsuario($user);

        if($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();

            $total = $entity->getPaquete()->getPrecio();
            $entity->setTotal($total);
            
            $slug = $entity->getPaquete()->getSlug();
            $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);
            if($paquete->getDisponibilidad() > 0 ){
                $dispo = $paquete->getDisponibilidad() - 1;
                $paquete->setDisponibilidad($dispo);
            
                $em->persist($entity);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Venta registrada !!');
                
                return $this->redirect($this->generateUrl('venta_show', array('id' => $entity->getId())));
            }else
                {throw $this->createNotFoundException('Disponibilidad = 0');
                }
        }
//
//        $em1 = $this->getDoctrine()->getManager();
//        $cliente = $em1->getRepository('PaqueteBundle:Paquete')->findAll();
//                echo count($cliente);
//                foreach ($cliente as $nombre => $valor){
//                    echo $valor;
//                }
        return array(
            'entity' => $entity,
            'user'=> $user,
            'form'   => $form->createView(),
        );
        }else
            {return $this->redirect($this->generateUrl('login'));
            }
     }
     
    /**  
     * @Route("/{slug}/carga", name="venta_paquete")
     * @Method("GET")
     * @Template("PaqueteBundle:Venta:venderpaq.html.twig")
     */
    public function cargapAction($slug)
    {        
        $user = $this->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);
        print_r($paquete->getNombre());

        $entity = new Venta();
        $editForm = $this->createForm(new VentaType(), $entity);
        
        if($user != 'anon.') {
        
        return array(
            'paquete' => $paquete,
            'entity' => $entity,
            'user' => $user,
            'edit_form' => $editForm->createView(),
        );
        }else
            {return $this->redirect($this->generateUrl('login'));
            }
    }
    
    /**
     * @Route("/{slug}/vender", name="vender_paquete")
     * 
     * @Template()
     */
    public function venderpAction(Request $request, $slug)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $entity = new Venta();
        $editForm = $this->createForm(new VentaType(), $entity);
        $editForm->bind($request);
        
        if($request->getMethod() == 'POST') {
            $em = $this->getDoctrine()->getManager();
            $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);

            $total = $paquete->getPrecio();
            $entity->setTotal($total);
            $entity->setUsuario($user);
            
            if($paquete->getDisponibilidad() > 0 ){
                $dispo = $paquete->getDisponibilidad() - 1;
                $paquete->setDisponibilidad($dispo);
            
                $em->persist($entity);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Venta registrada !!');
                
                return $this->redirect($this->generateUrl('venta_show', array('id' => $entity->getId())));
            }else
                {throw $this->createNotFoundException('Disponibilidad 0');
                }
        }
        return array(
            'entity' => $entity,
            'user' => $user,
            'edit_form' => $editForm->createView()
        );
    }
     
    /**
     * Finds and displays a Venta entity.
     *
     * @Route("/{id}", name="venta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PaqueteBundle:Venta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No existe Venta');
        }

        return array(
            'entity'      => $entity,
            //'page' => $page,
        );
    }
    
        /**  
     * @Route("/{id}/cargar", name="venta_cliente")
     * @Method("GET")
     * @Template("PaqueteBundle:Venta:vendercli.html.twig")
     */
    public function cargacAction($id)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $em = $this->getDoctrine()->getManager();
        $cliente = $em->getRepository('ClienteBundle:Cliente')->findOneById($id);
        
        $entity = new Venta();
        $editForm = $this->createForm(new VentaType(), $entity);
        
        if($user != 'anon.') {
        
        return array(
            'cliente' => $cliente,
            'entity' => $entity,
            'user' => $user,
            'edit_form' => $editForm->createView(),
        );
        }else
            {return $this->redirect($this->generateUrl('login'));
            }
    }
    
    /**
     * @Route("/{id}/venderc", name="vender_cliente")
     * 
     * @Template()
     */
    public function vendercAction(Request $request, $id)
    {
        $user = $this->get('security.context')->getToken()->getUser();
        
        $entity = new Venta();
        $editForm = $this->createForm(new VentaType(), $entity);
        $editForm->bind($request);
        
        if($request->getMethod() == 'POST') {
          $slug = $entity->getPaquete()->getSlug();
          //$cliente = $entity->getCliente()->getId();
          $em = $this->getDoctrine()->getManager();
          $paquete = $em->getRepository('PaqueteBundle:Paquete')->findOneBySlug($slug);
          $cliente = $em->getRepository('ClienteBundle:Cliente')->findOneById($id);
          
          $total = $entity->getPaquete()->getPrecio();
          $entity->setTotal($total);
          $entity->setUsuario($user);
          $entity->setCliente($cliente);
            
            if($paquete->getDisponibilidad() > 0 ){
                $dispo = $paquete->getDisponibilidad() - 1;
                $paquete->setDisponibilidad($dispo);
            
                $em->persist($entity);
                $em->flush();
                
                $this->get('session')->getFlashBag()->add('notice', 'Mensaje: Venta registrada !!');
                
                return $this->redirect($this->generateUrl('venta_show', array('id' => $entity->getId())));
            }else
                {throw $this->createNotFoundException('Disponibilidad 0');
                }
        }
        return array(
            'entity' => $entity,
            'user' => $user,
            'edit_form' => $editForm->createView()
        );
    }
    
}    