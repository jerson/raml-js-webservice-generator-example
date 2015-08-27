<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @Entity
 * @Table(name="news")
 */
class News
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
     * 
     * 
     * 
     * 
     * @ManyToOne(targetEntity="Autor"),cascade={"persist"}
     * 
     */
    private $autor;
    

    
    
    /**
     * @var string
     * @Column(name="title", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $title;
    

    
    
    /**
     * @var string
     * @Column(name="content", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $content;
    

    
    
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
     * @Column(name="views", unique=false, nullable=true, type="integer", length=3)
     * 
     * 
     * 
     * 
     */
    private $views;
    

    
    
    /**
     * @var datetime
     * @Column(name="date", unique=false, nullable=true, type="datetime", length=255)
     * 
     * 
     * 
     * 
     */
    private $date;
    

    
    
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
    
       //$this->autor = null;
       //$this->title = 'Se confirma un remake estadounidense para la cinta japonesa Audition';
       //$this->content = null;
       //$this->slug = 'se-confirma-un-remake-estadounidense-para-la-cinta-japonesa-audition';
       //$this->views = '1';
       //$this->date = '2015-02-02T03:55:47';
       //$this->image = 'assets/images/d/2/e/4/4/d2e444ba0a2eb479e251253e9f860d9eff18540f.jpg';
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return News
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
     * Set autor
     *
     * @param string $autor
     * @return News
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
    * Get autor
    *
    * @return string
    */
    public function getAutor()
    {
        return $this->autor;
    }


    
    /**
     * Set title
     *
     * @param string $title
     * @return News
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
    * Get title
    *
    * @return string
    */
    public function getTitle()
    {
        return $this->title;
    }


    
    /**
     * Set content
     *
     * @param string $content
     * @return News
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
    * Get content
    *
    * @return string
    */
    public function getContent()
    {
        return $this->content;
    }


    
    /**
     * Set slug
     *
     * @param string $slug
     * @return News
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
     * Set views
     *
     * @param string $views
     * @return News
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
    * Get views
    *
    * @return string
    */
    public function getViews()
    {
        return $this->views;
    }


    
    /**
     * Set date
     *
     * @param string $date
     * @return News
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
    * Get date
    *
    * @return string
    */
    public function getDate()
    {
        return $this->date;
    }


    
    /**
     * Set image
     *
     * @param string $image
     * @return News
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
