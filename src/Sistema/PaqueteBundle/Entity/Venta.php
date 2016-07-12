<?php

namespace Sistema\PaqueteBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Venta
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Sistema\PaqueteBundle\Entity\VentaRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Venta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * 
     * @ORM\Column(type="datetime")
     */
    protected $fecha;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $actualizado;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Sistema\PaqueteBundle\Entity\Paquete", inversedBy="ventas")
     * @ORM\JoinColumn(name="paquete_id", referencedColumnName="id")
     */
    protected $paquete;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Sistema\ClienteBundle\Entity\Cliente", inversedBy="ventas")
     * @ORM\JoinColumn(name="cliente_id", referencedColumnName="id")
     */
    protected $cliente;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Sistema\UsuarioBundle\Entity\Usuario", inversedBy="ventas")
     * @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     */
    protected $usuario;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     * 
     */
    protected $total;

    public function __construct() 
    {
        $this->setFecha(new \DateTime);
        $this->setActualizado(new \DateTime);
    }
    
    /**
     * @ORM\preUpdate
     */
    public function setActualizadoValue()
    {
        $this->setActualizado(new \DateTime);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Venta
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set total
     *
     * @param float $total
     * @return Venta
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set paquete
     *
     * @param \Sistema\PaqueteBundle\Entity\Paquete $paquete
     * @return Venta
     */
    public function setPaquete(\Sistema\PaqueteBundle\Entity\Paquete $paquete = null)
    {
        $this->paquete = $paquete;
    
        return $this;
    }

    /**
     * Get paquete
     *
     * @return \Sistema\PaqueteBundle\Entity\Paquete 
     */
    public function getPaquete()
    {
        return $this->paquete;
    }

    /**
     * Set cliente
     *
     * @param \Sistema\ClienteBundle\Entity\Cliente $cliente
     * @return Venta
     */
    public function setCliente(\Sistema\ClienteBundle\Entity\Cliente $cliente = null)
    {
        $this->cliente = $cliente;
    
        return $this;
    }

    /**
     * Get cliente
     *
     * @return \Sistema\ClienteBundle\Entity\Cliente 
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     * @return Venta
     */
    public function setActualizado($actualizado)
    {
        $this->actualizado = $actualizado;
    
        return $this;
    }

    /**
     * Get actualizado
     *
     * @return \DateTime 
     */
    public function getActualizado()
    {
        return $this->actualizado;
    }

    /**
     * Set usuario
     *
     * @param \Sistema\UsuarioBundle\Entity\Usuario $usuario
     * @return Venta
     */
    public function setUsuario(\Sistema\UsuarioBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Sistema\UsuarioBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function eraseCredentials() {
        
    }

    public function getPassword() {
        
    }

    public function getRoles() {
        
    }

    public function getSalt() {
        
    }

    public function getUsername() {
        
    }

}