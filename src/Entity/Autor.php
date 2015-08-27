<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Autor
 *
 * @Entity
 * @Table(name="autor")
 */
class Autor
{


    
    
    /**
     * @var integer
     * @Column(name="id", unique=false, nullable=false, type="integer", length=3)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * 
     * 
     */
    private $id;
    

    
    
    /**
     * @var string
     * @Column(name="name", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $name;
    


    /**
     * Contructor 
     */
    public function __construct()
    {
    
       //$this->name = 'Gerson Alexander Pardo Gamez';
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return Autor
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
    * Get id
    *
    * @return string
    */
    public function getId()
    {
        return $this->id;
    }


    
    /**
     * Set name
     *
     * @param string $name
     * @return Autor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
    * Get name
    *
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }




}
