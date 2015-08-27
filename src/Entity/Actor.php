<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @Entity
 * @Table(name="actor")
 */
class Actor
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
     * @var string
     * @Column(name="country", unique=false, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $country;
    

    
    
    /**
     * @var datetime
     * @Column(name="birthday", unique=false, nullable=true, type="datetime", length=255)
     * 
     * 
     * 
     * 
     */
    private $birthday;
    

    
    
    /**
     * @var string
     * @Column(name="biography", unique=false, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $biography;
    

    
    
    /**
     * @var string
     * @Column(name="image", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $image;
    


    /**
     * Contructor 
     */
    public function __construct()
    {
    
       //$this->name = 'Tom H\'ardy';
       //$this->slug = 'tom-hardy';
       //$this->country = 'Reino Unido';
       //$this->birthday = '1977-09-15';
       //$this->biography = null;
       //$this->image = 'assets/images/8/2/7/e/7/827e76081e9c7ecca4450fcb8276a1a5b5c25051.jpg';
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return Actor
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
     * @return Actor
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
     * @return Actor
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
     * Set country
     *
     * @param string $country
     * @return Actor
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
    * Get country
    *
    * @return string
    */
    public function getCountry()
    {
        return $this->country;
    }


    
    /**
     * Set birthday
     *
     * @param string $birthday
     * @return Actor
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
    * Get birthday
    *
    * @return string
    */
    public function getBirthday()
    {
        return $this->birthday;
    }


    
    /**
     * Set biography
     *
     * @param string $biography
     * @return Actor
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;

        return $this;
    }

    /**
    * Get biography
    *
    * @return string
    */
    public function getBiography()
    {
        return $this->biography;
    }


    
    /**
     * Set image
     *
     * @param string $image
     * @return Actor
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
    * Get image
    *
    * @return string
    */
    public function getImage()
    {
        return $this->image;
    }




}
