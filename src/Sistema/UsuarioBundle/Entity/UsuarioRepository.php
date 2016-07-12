<?php

namespace Sistema\UsuarioBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository
{
    public function findTodasLasVentas($usuario)
    {
        $em = $this->getEntityManager();
        
        $consulta = $em->createQuery('
            SELECT v, u
            FROM PaqueteBundle:Venta v
            WHERE v.usuario = :id
            ORDER BY v.fecha DESC');
        $consulta->setParameters('id', $usuario);
        
        return $consulta->getResult();
    }

}
