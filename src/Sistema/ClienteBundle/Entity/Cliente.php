<?php

namespace Sistema\ClienteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente")
 * @ORM\Entity(repositoryClass="Sistema\ClienteBundle\Entity\ClienteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Cliente
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
     * @ORM\Column(name="dni", type="string", length=8)
     * 
     * @Assert\NotBlank(message = "Debe ingresar nro. DNI")
     */
    protected $dni;

    /**
     * @ORM\Column(name="nombrec", type="string", length=50)
     * 
     * @Assert\NotBlank()
     */
    protected $nombrec;

    /**
     * @ORM\Column(name="apellidoc", type="string", length=50)
     * 
     * @Assert\NotBlank()
     */
    protected $apellidoc;

    /**
     * @ORM\Column(name="direccion", type="text", length=100)
     * 
     * @Assert\NotBlank()
     */
    protected $direccion;
    
    /**
     * @ORM\Column(name="telefono", type="string", length=20)
     * 
     * @Assert\NotBlank()
     * @Assert\Length(max = 100)
     */
    protected $telefono;
    
    /**
     * @ORM\Column(type="datetime")
     * 
     * @Assert\NotBlank()
     */
    protected $fecha_nacim;
    
    /**
     * @ORM\Column(name="email", length=50)
     * 
     * @Assert\NotBlank()
     */
    protected $email;
    
    /**
     * @ORM\OneToMany(targetEntity="Sistema\PaqueteBundle\Entity\Venta", mappedBy="cliente")
     */
    protected $ventas;
    
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
     * Set dni
     *
     * @param string $dni
     * @return Cliente
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    
        return $this;
    }

    /**
     * Get dni
     *
     * @return string 
     */
    public function getDni()
    {
        return $this->dni;
    }
    
    public function __toString()
    {
        return $this->getDni();
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Cliente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Cliente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set fecha_nacim
     *
     * @param \DateTime $fechaNacim
     * @return Cliente
     */
    public function setFechaNacim($fechaNacim)
    {
        $this->fecha_nacim = $fechaNacim;
    
        return $this;
    }

    /**
     * Get fecha_nacim
     *
     * @return \DateTime 
     */
    public function getFechaNacim()
    {
        return $this->fecha_nacim;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Cliente
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ventas = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add ventas
     *
     * @param \Sistema\PaqueteBundle\Entity\Venta $ventas
     * @return Cliente
     */
    public function addVenta(\Sistema\PaqueteBundle\Entity\Venta $ventas)
    {
        $this->ventas[] = $ventas;
    
        return $this;
    }

    /**
     * Remove ventas
     *
     * @param \Sistema\PaqueteBundle\Entity\Venta $ventas
     */
    public function removeVenta(\Sistema\PaqueteBundle\Entity\Venta $ventas)
    {
        $this->ventas->removeElement($ventas);
    }

    /**
     * Get ventas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVentas()
    {
        return $this->ventas;
    }


    /**
     * Set nombrec
     *
     * @param string $nombrec
     * @return Cliente
     */
    public function setNombrec($nombrec)
    {
        $this->nombrec = $nombrec;

        return $this;
    }

    /**
     * Get nombrec
     *
     * @return string 
     */
    public function getNombrec()
    {
        return $this->nombrec;
    }

    /**
     * Set apellidoc
     *
     * @param string $apellidoc
     * @return Cliente
     */
    public function setApellidoc($apellidoc)
    {
        $this->apellidoc = $apellidoc;

        return $this;
    }

    /**
     * Get apellidoc
     *
     * @return string 
     */
    public function getApellidoc()
    {
        return $this->apellidoc;
    }
}
