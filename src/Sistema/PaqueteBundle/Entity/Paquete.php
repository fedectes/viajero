<?php

namespace Sistema\PaqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Paquete
 *
 * @ORM\Table(name="paquete")
 * @ORM\Entity(repositoryClass="Sistema\PaqueteBundle\Entity\PaqueteRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Paquete
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank()
     */
    protected $nombre;
    
    /** 
     * @ORM\Column(type="string", length=100)
     */
    protected $slug;
    
    /** 
     * @ORM\Column(type="datetime")
     */
    protected $creado;
    
    /** 
     * @ORM\Column(type="datetime")
     */
    protected $actualizado;

    /**
     * @var string
     *
     * @ORM\Column(name="origen", type="string")
     */
    protected $origen;
    
    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string")
     */
    protected $destino;
    
    /**
     * @var string
     *
     * @ORM\Column(name="temporada", type="string")
     */
    protected $temporada;
    
    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $fecha_partida;
    
    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $hora_partida;
    
    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $fecha_llegada;
    
    /**
     * @var string
     *
     * @ORM\Column(type="datetime")
     */
    protected $hora_llegada;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dias", type="string", length=4)
     */
    protected $dias;
    
    /**
     * @var string
     *
     * @ORM\Column(name="disponibilidad", type="integer")
     */
    protected $disponibilidad;
    
    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="decimal", scale=2)
     */
    protected $precio;
    
    /**
     * @ORM\OneToMany(targetEntity="Sistema\PaqueteBundle\Entity\Venta", mappedBy="paquete")
     */
    protected $ventas;
    
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Paquete
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        $this->setSlug($this->nombre);
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
    
    public function __toString()
    {
        return $this->getNombre();
    }

    /**
     * Set origen
     *
     * @param string $origen
     * @return Paquete
     */
    public function setOrigen($origen)
    {
        $this->origen = $origen;
    
        return $this;
    }

    /**
     * Get origen
     *
     * @return string 
     */
    public function getOrigen()
    {
        return $this->origen;
    }

    /**
     * Set destino
     *
     * @param string $destino
     * @return Paquete
     */
    public function setDestino($destino)
    {
        $this->destino = $destino;
    
        return $this;
    }

    /**
     * Get destino
     *
     * @return string 
     */
    public function getDestino()
    {
        return $this->destino;
    }

    /**
     * Set fechahora_partida
     *
     * @param \DateTime $fechahoraPartida
     * @return Paquete
     */
    public function setFechahoraPartida($fechahoraPartida)
    {
        $this->fechahora_partida = $fechahoraPartida;
    
        return $this;
    }

    /**
     * Get fechahora_partida
     *
     * @return \DateTime 
     */
    public function getFechahoraPartida()
    {
        return $this->fechahora_partida;
    }

    /**
     * Set fechahora_llegada
     *
     * @param \DateTime $fechahoraLlegada
     * @return Paquete
     */
    public function setFechahoraLlegada($fechahoraLlegada)
    {
        $this->fechahora_llegada = $fechahoraLlegada;
    
        return $this;
    }

    /**
     * Get fechahora_llegada
     *
     * @return \DateTime 
     */
    public function getFechahoraLlegada()
    {
        return $this->fechahora_llegada;
    }

    /**
     * Set dias
     *
     * @param string $dias
     * @return Paquete
     */
    public function setDias($dias)
    {
        $this->dias = $dias;
    
        return $this;
    }

    /**
     * Get dias
     *
     * @return string 
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set disponibilidad
     *
     * @param integer $disponibilidad
     * @return Paquete
     */
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;
    
        return $this;
    }

    /**
     * Get disponibilidad
     *
     * @return integer 
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Paquete
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set temporada
     *
     * @param string $temporada
     * @return Paquete
     */
    public function setTemporada($temporada)
    {
        $this->temporada = $temporada;
    
        return $this;
    }

    /**
     * Get temporada
     *
     * @return string 
     */
    public function getTemporada()
    {
        return $this->temporada;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ventas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->setCreado(new \DateTime);
        $this->setActualizado(new \DateTime);
    }
    
    /**
     * Add ventas
     *
     * @param \Sistema\PaqueteBundle\Entity\Venta $ventas
     * @return Paquete
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
     * Set slug
     *
     * @param string $slug
     * @return Paquete
     */
    public function setSlug($slug)
    {
        $this->slug = $this->slugify($slug);
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    
    public function slugify($text)
    {
        // sustituye caracteres de espaciado o dígitos con un -
        $text = preg_replace('#[^\\pL\d]+#u', '-', $text);

        // recorta espacios en ambos extremos
        $text = trim($text, '-');


        // translitera
        if (function_exists('iconv'))
        {
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // cambia a minúsculas
        $text = strtolower($text);

        // elimina caracteres indeseables
        $text = preg_replace('#[^-\w]+#', '', $text);

        if (empty($text))
        {
            return 'n-a';
        }

        return $text;
    }

    /**
     * Set fecha_partida
     *
     * @param \DateTime $fechaPartida
     * @return Paquete
     */
    public function setFechaPartida($fechaPartida)
    {
        $this->fecha_partida = $fechaPartida;
    
        return $this;
    }

    /**
     * Get fecha_partida
     *
     * @return \DateTime 
     */
    public function getFechaPartida()
    {
        return $this->fecha_partida;
    }

    /**
     * Set hora_partida
     *
     * @param \DateTime $horaPartida
     * @return Paquete
     */
    public function setHoraPartida($horaPartida)
    {
        $this->hora_partida = $horaPartida;
    
        return $this;
    }

    /**
     * Get hora_partida
     *
     * @return \DateTime 
     */
    public function getHoraPartida()
    {
        return $this->hora_partida;
    }

    /**
     * Set fecha_llegada
     *
     * @param \DateTime $fechaLlegada
     * @return Paquete
     */
    public function setFechaLlegada($fechaLlegada)
    {
        $this->fecha_llegada = $fechaLlegada;
    
        return $this;
    }

    /**
     * Get fecha_llegada
     *
     * @return \DateTime 
     */
    public function getFechaLlegada()
    {
        return $this->fecha_llegada;
    }

    /**
     * Set hora_llegada
     *
     * @param \DateTime $horaLlegada
     * @return Paquete
     */
    public function setHoraLlegada($horaLlegada)
    {
        $this->hora_llegada = $horaLlegada;
    
        return $this;
    }

    /**
     * Get hora_llegada
     *
     * @return \DateTime 
     */
    public function getHoraLlegada()
    {
        return $this->hora_llegada;
    }

    /**
     * Set creado
     *
     * @param \DateTime $creado
     * @return Paquete
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    
        return $this;
    }

    /**
     * Get creado
     *
     * @return \DateTime 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set actualizado
     *
     * @param \DateTime $actualizado
     * @return Paquete
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
}