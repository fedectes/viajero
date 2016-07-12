<?php

namespace Sistema\ClienteBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Sistema\ClienteBundle\Entity\Cliente;

class Clientes implements FixtureInterface {

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 8; $i++) {
            $cliente = new Cliente();
            
            $cliente->setDni($this->getDni());
            $cliente->setNombre($this->getNombre());
            $cliente->setApellido($this->getApellido());
            $cliente->setDireccion($this->getDireccion());
            $cliente->setTelefono($this->getTelefono());
            $cliente->setFechaNacim(new \DateTime('now - '.rand(7000, 20000).' days'));
            $cliente->setEmail('cliente'.$i.'@localhost');

            $manager->persist($cliente);
            
        }
        
        $manager->flush();
    }
    
    private function getDni()
    {
        $dni = array('92883903', '92524212', '38251969', '83298841', '35945779',
            '11723074', '13654884', '52930808', '09260940', '89448948');
        
        return $dni[array_rand($dni)];
    }
    
    private function getNombre()
    {
        $nombres = array('Antonio', 'Carlos', 'Manuel', 'Carmen', 'Isabel',
            'Ana María', 'Miguel', 'Elena', 'Manuela', 'Rafael');
        
        return $nombres[array_rand($nombres)];
    }
    
    private function getApellido()
    {
        $apellidos = array('Garcia', 'Lopez', 'Martinez', 'Sanchez', 'Gutierrez',
            'Torres', 'Navarro', 'Iglesias', 'Sanz', 'Delgado');
        
        return $apellidos[array_rand($apellidos)];
    }
    
    private function getTelefono()
    {
        $telefonos = array('154567899', '154331245', '154897756', '154557899', '154986788',
            '154904456', '154233456', '154227855', '154678900', '154332345');
        
        return $telefonos[array_rand($telefonos)];
    }
    
    private function getDireccion()
    {
 
        $direcciones = array('Av.España', 'Brasil', 'Av.Armenia', 'Salta', 'Quintana',
            'San Luis', 'Av.Centenario', 'H.Irigoyen', 'San Lorenzo', 'Junin');
        
        return $direcciones[array_rand($direcciones)].' '.'Nro.'.' '.rand(400, 3000);
    }
    
}    
