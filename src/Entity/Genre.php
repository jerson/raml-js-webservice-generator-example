<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @Entity
 * @Table(name="genre")
 */
class Genre
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
     * @var string
     * @Column(name="slug", unique=true, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $slug;
    

    
    
    /**
     * @var integer
     * @Column(name="total", unique=false, nullable=true, type="integer", length=3)
     * 
     * 
     * 
     * 
     */
    private $total;
    


    /**
     * Contructor 
     */
    public function __construct()
    {
    
       //$this->name = 'Accion';
       //$this->slug = 'accion';
       //$this->total = null;
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return Genre
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
     * @return Genre
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


    
    /**
     * Set slug
     *
     * @param string $slug
     * @return Genre
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
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


    
    /**
     * Set total
     *
     * @param string $total
     * @return Genre
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
    * Get total
    *
    * @return string
    */
    public function getTotal()
    {
        return $this->total;
    }




}
