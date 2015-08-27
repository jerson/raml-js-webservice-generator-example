<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkDownload
 *
 * @Entity
 * @Table(name="link_download")
 */
class LinkDownload
{


    
    
    /**
     * @var integer
     * @Column(name="id", unique=false, nullable=true, type="integer", length=3)
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * 
     * 
     */
    private $id;
    

    
    
    /**
     * @var string
     * @Column(name="link", unique=true, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $link;
    

    
    
    /**
     * @var string
     * @Column(name="provider", unique=false, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $provider;
    

    
    
    /**
     * @var string
     * @Column(name="language", unique=false, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $language;
    

    
    
    /**
     * @var string
     * @Column(name="format", unique=false, nullable=true, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $format;
    


    /**
     * Contructor 
     */
    public function __construct()
    {
    
       //$this->link = 'http://streamcloud.eu/mxnulc7rp5cr/MockingjayP1.Cam.Latino.Gnula.avi.html';
       //$this->provider = 'youtube';
       //$this->language = 'Latino';
       //$this->format = 'CAM';
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return LinkDownload
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
     * Set link
     *
     * @param string $link
     * @return LinkDownload
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
    * Get link
    *
    * @return string
    */
    public function getLink()
    {
        return $this->link;
    }


    
    /**
     * Set provider
     *
     * @param string $provider
     * @return LinkDownload
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;

        return $this;
    }

    /**
    * Get provider
    *
    * @return string
    */
    public function getProvider()
    {
        return $this->provider;
    }


    
    /**
     * Set language
     *
     * @param string $language
     * @return LinkDownload
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
    * Get language
    *
    * @return string
    */
    public function getLanguage()
    {
        return $this->language;
    }


    
    /**
     * Set format
     *
     * @param string $format
     * @return LinkDownload
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
    * Get format
    *
    * @return string
    */
    public function getFormat()
    {
        return $this->format;
    }




}
