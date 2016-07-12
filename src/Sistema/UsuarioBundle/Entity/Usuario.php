<?php

namespace Sistema\UsuarioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints as DoctrineAssert;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="Sistema\UsuarioBundle\Entity\UsuarioRepository")
 * @DoctrineAssert\UniqueEntity(fields = {"email", "dni"})
 */
class Usuario implements UserInterface
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
     * @var string $nombre
     * 
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $nombre;

    /**
     * @var string
     * @ORM\Column(name="apellido", type="string", length=50)
     * @Assert\NotBlank(message = "Por favor, escribe tu Nombre")
     */
    protected $apellido;
    
    /**
     * @ORM\Column(type="string", length=30, unique=true)
     * @Assert\Email()
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(name="password", type="string", length=100)
     * @Assert\Length(min = 6)
     */
    protected $password;

    /**
     * @var string
     * @ORM\Column(name="salt", type="string", length=255)
     */
    protected $salt;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\Datetime()
     */
    protected $fecha_nacimiento;
    
    /**
     * @ORM\Column(name="dni", type="string", length=8)
     * @Assert\NotBlank()
     */
    protected $dni;

    /**
     * @ORM\Column(name="direccion", type="text", length=100)
     * @Assert\NotBlank()
     */
    protected $direccion;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    protected $isActive;
    
    /**
     * @ORM\Column(type="datetime")
     * @Assert\Datetime()
     */
    protected $ultima_conexion;
    
    /**
     * @ORM\OneToMany(targetEntity="Sistema\PaqueteBundle\Entity\Venta", mappedBy="usuario")
     */
    protected $ventas;

    
    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        $this->setUltimaConexion(new \DateTime);
    }
    
    public function __toString()
    {
        return $this->getNombre().' '.$this->getApellido();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Usuario
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuario
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }
    
    function eraseCredentials()
    {
        
    }
    
    function getRoles()
    {
        return array('ROLE_USUARIO');
    }
    
    public function equals(UserInterface $usuario)
    {
        return $this->email === $usuario->getEmail();
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
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
     * Set isActive
     *
     * @param boolean $isActive
     * @return Usuario
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    
        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
    
    /**
     * Set fecha_nacimiento
     *
     * @param \datatime $fechaNacimiento
     * @return Usuario
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fecha_nacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fecha_nacimiento
     *
     * @return \datatime 
     */
    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }
    
    /**
     * 
     * @Assert\True(message = "Debes tener al menos 18 años")
     */
    public function isMayorDeEdad()
    {
        return $this->fecha_nacimiento <= new \DateTime('today - 18 years');
    }

    /**
     * Set dni
     *
     * @param string $dni
     * @return Usuario
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

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Usuario
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
     * Set ultima_conexion
     *
     * @param \DateTime $ultimaConexion
     * @return Usuario
     */
    public function setUltimaConexion($ultimaConexion)
    {
        $this->ultima_conexion = $ultimaConexion;
    
        return $this;
    }

    /**
     * Get ultima_conexion
     *
     * @return \DateTime 
     */
    public function getUltimaConexion()
    {
        return $this->ultima_conexion;
    }

    /**
     * Add ventas
     *
     * @param \Sistema\PaqueteBundle\Entity\Venta $ventas
     * @return Usuario
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

}
