<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // inicio
        if ($pathinfo === '/inicio') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_inicio;
            }

            return array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\DefaultController::portadaAction',  '_route' => 'inicio',);
        }
        not_inicio:

        // cliente_cambiar
        if (0 === strpos($pathinfo, '/cliente/cambiar-a') && preg_match('#^/cliente/cambiar\\-a\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_cliente_cambiar;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_cambiar')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\DefaultController::cambiarAction',));
        }
        not_cliente_cambiar:

        // java
        if ($pathinfo === '/java') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_java;
            }

            return array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\DefaultController::javascriptAction',  '_route' => 'java',);
        }
        not_java:

        if (0 === strpos($pathinfo, '/paquete')) {
            // paquete
            if (rtrim($pathinfo, '/') === '/paquete') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'paquete');
                }

                return array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\PaqueteController::indexAction',  '_route' => 'paquete',);
            }
            not_paquete:

            // paquete_muestra
            if (0 === strpos($pathinfo, '/paquete/ver') && preg_match('#^/paquete/ver/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete_muestra;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_muestra')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\PaqueteController::muestraAction',));
            }
            not_paquete_muestra:

            // paquete_ver
            if (preg_match('#^/paquete/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete_ver;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_ver')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\PaqueteController::verAction',));
            }
            not_paquete_ver:

        }

        if (0 === strpos($pathinfo, '/venta')) {
            // ventas
            if (rtrim($pathinfo, '/') === '/venta') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ventas;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ventas');
                }

                return array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::indexAction',  '_route' => 'ventas',);
            }
            not_ventas:

            // venta_nueva
            if ($pathinfo === '/venta/nueva') {
                return array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::venderAction',  '_route' => 'venta_nueva',);
            }

            // venta_paquete
            if (preg_match('#^/venta/(?P<slug>[^/]++)/carga$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_venta_paquete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_paquete')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::cargapAction',));
            }
            not_venta_paquete:

            // vender_paquete
            if (preg_match('#^/venta/(?P<slug>[^/]++)/vender$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vender_paquete')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::venderpAction',));
            }

            // venta_show
            if (preg_match('#^/venta/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_venta_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_show')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::showAction',));
            }
            not_venta_show:

            // venta_cliente
            if (preg_match('#^/venta/(?P<id>[^/]++)/cargar$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_venta_cliente;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_cliente')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::cargacAction',));
            }
            not_venta_cliente:

            // vender_cliente
            if (preg_match('#^/venta/(?P<id>[^/]++)/venderc$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vender_cliente')), array (  '_controller' => 'Sistema\\PaqueteBundle\\Controller\\VentaController::vendercAction',));
            }

        }

        if (0 === strpos($pathinfo, '/cliente')) {
            // cliente
            if (rtrim($pathinfo, '/') === '/cliente') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'cliente');
                }

                return array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::indexAction',  '_route' => 'cliente',);
            }
            not_cliente:

            // cliente_muestra
            if (0 === strpos($pathinfo, '/cliente/ver') && preg_match('#^/cliente/ver/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_muestra;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_muestra')), array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::muestracAction',));
            }
            not_cliente_muestra:

            // cliente_create
            if ($pathinfo === '/cliente/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_cliente_create;
                }

                return array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::createAction',  '_route' => 'cliente_create',);
            }
            not_cliente_create:

            // cliente_new
            if ($pathinfo === '/cliente/nuevo') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_new;
                }

                return array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::newAction',  '_route' => 'cliente_new',);
            }
            not_cliente_new:

            // cliente_show
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_show')), array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::showAction',));
            }
            not_cliente_show:

            // cliente_edit
            if (preg_match('#^/cliente/(?P<id>[^/]++)/editar$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_cliente_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_edit')), array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::editAction',));
            }
            not_cliente_edit:

            // cliente_update
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_cliente_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_update')), array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::updateAction',));
            }
            not_cliente_update:

            // cliente_delete
            if (preg_match('#^/cliente/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_cliente_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'cliente_delete')), array (  '_controller' => 'Sistema\\ClienteBundle\\Controller\\ClienteController::deleteAction',));
            }
            not_cliente_delete:

        }

        if (0 === strpos($pathinfo, '/usuario')) {
            // usuario_registro
            if ($pathinfo === '/usuario/registro') {
                return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::registroAction',  '_route' => 'usuario_registro',);
            }

            if (0 === strpos($pathinfo, '/usuario/log')) {
                if (0 === strpos($pathinfo, '/usuario/login')) {
                    // login
                    if ($pathinfo === '/usuario/login') {
                        return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
                    }

                    // login_check
                    if ($pathinfo === '/usuario/login_check') {
                        return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login_check',);
                    }

                }

                // usuario_logout
                if ($pathinfo === '/usuario/logout') {
                    return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::loginAction',  '_route' => 'usuario_logout',);
                }

            }

            // usuario_perfil
            if ($pathinfo === '/usuario/perfil') {
                return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::perfilAction',  '_route' => 'usuario_perfil',);
            }

            // sistema_usuario_default_default
            if ($pathinfo === '/usuario/default') {
                return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::defaultAction',  '_route' => 'sistema_usuario_default_default',);
            }

            // sistema_usuario_default_venta
            if ($pathinfo === '/usuario/ventas') {
                return array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\DefaultController::ventaAction',  '_route' => 'sistema_usuario_default_venta',);
            }

            // usuario_show
            if (preg_match('#^/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_usuario_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_show')), array (  '_controller' => 'Sistema\\UsuarioBundle\\Controller\\UsuarioController::showAction',));
            }
            not_usuario_show:

        }

        if (0 === strpos($pathinfo, '/admin')) {
            // backend
            if ($pathinfo === '/admin/inicio') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_backend;
                }

                return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::indexAction',  '_route' => 'backend',);
            }
            not_backend:

            // paquete_new
            if ($pathinfo === '/admin/nuevo') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete_new;
                }

                return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::newAction',  '_route' => 'paquete_new',);
            }
            not_paquete_new:

            // paquete_create
            if ($pathinfo === '/admin/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_paquete_create;
                }

                return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::createAction',  '_route' => 'paquete_create',);
            }
            not_paquete_create:

            // paquete_edit
            if (preg_match('#^/admin/(?P<slug>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_edit')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::editAction',));
            }
            not_paquete_edit:

            // paquete_update
            if (preg_match('#^/admin/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_paquete_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_update')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::updateAction',));
            }
            not_paquete_update:

            // paquete_delete
            if (preg_match('#^/admin/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_paquete_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_delete')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::deleteAction',));
            }
            not_paquete_delete:

            // ventas_backend
            if ($pathinfo === '/admin/venta') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ventas_backend;
                }

                return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::ventasAction',  '_route' => 'ventas_backend',);
            }
            not_ventas_backend:

            // venta_editar
            if (preg_match('#^/admin/(?P<id>[^/]++)/editar$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_venta_editar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_editar')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::editarAction',));
            }
            not_venta_editar:

            // venta_actualizar
            if (preg_match('#^/admin/(?P<id>[^/]++)/editado$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_venta_actualizar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_actualizar')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::actualizarAction',));
            }
            not_venta_actualizar:

            // venta_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/eliminar$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_venta_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_delete')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::eliminarAction',));
            }
            not_venta_delete:

            // venta_ver
            if (preg_match('#^/admin/(?P<id>[^/]++)/ver$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_venta_ver;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'venta_ver')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::verAction',));
            }
            not_venta_ver:

            // vendedor
            if ($pathinfo === '/admin/vendedor') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_vendedor;
                }

                return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::vendedorAction',  '_route' => 'vendedor',);
            }
            not_vendedor:

            // vendedor_show
            if (preg_match('#^/admin/(?P<id>[^/]++)/detalle$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_vendedor_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vendedor_show')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::mostrarAction',));
            }
            not_vendedor_show:

            // vendedor_delete
            if (preg_match('#^/admin/(?P<id>[^/]++)/baja$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_vendedor_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'vendedor_delete')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::borrarAction',));
            }
            not_vendedor_delete:

            // paquete_show
            if (preg_match('#^/admin/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_paquete_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'paquete_show')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::showAction',));
            }
            not_paquete_show:

            if (0 === strpos($pathinfo, '/admin/admin/log')) {
                if (0 === strpos($pathinfo, '/admin/admin/login')) {
                    // admin_login
                    if ($pathinfo === '/admin/admin/login') {
                        return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::loginadminAction',  '_route' => 'admin_login',);
                    }

                    // admin_login_check
                    if ($pathinfo === '/admin/admin/login_check') {
                        return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::loginadminAction',  '_route' => 'admin_login_check',);
                    }

                }

                // admin_logout
                if ($pathinfo === '/admin/admin/logout') {
                    return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\AdminController::loginadminAction',  '_route' => 'admin_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/usuario')) {
                // usuario_create
                if ($pathinfo === '/admin/usuario/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_usuario_create;
                    }

                    return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\UsuarioController::createAction',  '_route' => 'usuario_create',);
                }
                not_usuario_create:

                // usuario_new
                if ($pathinfo === '/admin/usuario/nuevo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_usuario_new;
                    }

                    return array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\UsuarioController::newAction',  '_route' => 'usuario_new',);
                }
                not_usuario_new:

                // usuario_edit
                if (preg_match('#^/admin/usuario/(?P<id>[^/]++)/editar$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_usuario_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\UsuarioController::editAction',));
                }
                not_usuario_edit:

                // usuario_update
                if (preg_match('#^/admin/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_usuario_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_update')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\UsuarioController::updateAction',));
                }
                not_usuario_update:

                // usuario_delete
                if (preg_match('#^/admin/usuario/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_usuario_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_delete')), array (  '_controller' => 'Sistema\\BackendBundle\\Controller\\UsuarioController::deleteAction',));
                }
                not_usuario_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
