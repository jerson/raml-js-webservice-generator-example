<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @Entity
 * @Table(name="movie")
 */
class Movie
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
     * 
     * 
     * 
     * 
     * @ManyToOne(targetEntity="Autor"),cascade={"persist"}
     * 
     */
    private $autor;
    

    
    
    /**
     * @var datetime
     * @Column(name="date_released", unique=false, nullable=true, type="datetime", length=255)
     * 
     * 
     * 
     * 
     */
    private $date_released;
    

    
    
    /**
     * @var integer
     * @Column(name="year", unique=false, nullable=true, type="integer", length=255)
     * 
     * 
     * 
     * 
     */
    private $year;
    

    
    
    /**
     * @var string
     * @Column(name="trailer", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $trailer;
    

    
    
    /**
     * @var string
     * @Column(name="sinopsis", unique=false, nullable=false, type="string", length=255)
     * 
     * 
     * 
     * 
     */
    private $sinopsis;
    

    
    
    /**
     * @var array
     * @Column(name="musicians", unique=false, nullable=true, type="simple_array", length=255)
     * 
     * 
     * 
     * 
     */
    private $musicians;
    

    
    
    /**
     * @var array
     * @Column(name="screenwriters", unique=false, nullable=true, type="simple_array", length=255)
     * 
     * 
     * 
     * 
     */
    private $screenwriters;
    

    
    
    /**
     * @var array
     * @Column(name="directors", unique=false, nullable=true, type="simple_array", length=255)
     * 
     * 
     * 
     * 
     */
    private $directors;
    

    
    
    /**
     * @var array
     * @Column(name="producers", unique=false, nullable=true, type="simple_array", length=255)
     * 
     * 
     * 
     * 
     */
    private $producers;
    

    
    
    /**
     * 
     * 
     * 
     * 
     * 
     * @ManyToMany(targetEntity="Actor",cascade={"persist"})
     * @JoinTable(name="movie_actor",
     *      joinColumns={@JoinColumn(name="movie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="actor_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $actors;
    

    
    
    /**
     * 
     * 
     * 
     * 
     * 
     * @ManyToMany(targetEntity="Genre",cascade={"persist"})
     * @JoinTable(name="movie_genre",
     *      joinColumns={@JoinColumn(name="movie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="genre_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $genres;
    

    
    
    /**
     * 
     * 
     * 
     * 
     * 
     * @ManyToMany(targetEntity="LinkWatch",cascade={"persist"})
     * @JoinTable(name="movie_link_watch",
     *      joinColumns={@JoinColumn(name="movie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="link_watch_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $links_watch;
    

    
    
    /**
     * 
     * 
     * 
     * 
     * 
     * @ManyToMany(targetEntity="LinkDownload",cascade={"persist"})
     * @JoinTable(name="movie_link_download",
     *      joinColumns={@JoinColumn(name="movie_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="link_download_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $links_download;
    

    
    
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
     * @var integer
     * @Column(name="rating", unique=false, nullable=true, type="integer", length=3)
     * 
     * 
     * 
     * 
     */
    private $rating;
    

    
    
    /**
     * @var boolean
     * @Column(name="next_release", unique=false, nullable=true, type="boolean", length=255)
     * 
     * 
     * 
     * 
     */
    private $next_release;
    

    
    
    /**
     * @var string
     * @Column(name="image", unique=false, nullable=true, type="string", length=255)
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
    
       //$this->name = 'The Hunger Games: Mockingjay - Part 1';
       //$this->slug = 'the-hunger-games-mockingjay-part-1';
       //$this->autor = null;
       //$this->date_released = '2014-11-21';
       //$this->year = '2014';
       //$this->trailer = 'http://www.youtube.com/embed/3PkkHsuMrho';
       //$this->sinopsis = 'Katniss se refugia en el Distrito 13 y es utilizada por los rebeldes como una herramienta de propaganda para unir a los distritos en el levantamiento contra el Capitolio y contra el presidente Snow. Peeta y los otros que fueron capturados por el Capitolio';
       //$this->musicians = null;
       //$this->screenwriters = null;
       //$this->directors = null;
       //$this->producers = null;
       //$this->actors = null;
       //$this->genres = null;
       //$this->links_watch = null;
       //$this->links_download = null;
       //$this->views = null;
       //$this->rating = null;
       //$this->next_release = null;
       //$this->image = 'assets/images/b/2/7/f/2/b27f231bae5db6d2c3b03d5d3374384158ae20b1.jpg';
    }


    
    /**
     * Set id
     *
     * @param string $id
     * @return Movie
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
     * @return Movie
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
     * @return Movie
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
     * Set autor
     *
     * @param string $autor
     * @return Movie
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
     * Set date_released
     *
     * @param string $date_released
     * @return Movie
     */
    public function setDateReleased($date_released)
    {
        $this->date_released = $date_released;

        return $this;
    }

    /**
    * Get date_released
    *
    * @return string
    */
    public function getDateReleased()
    {
        return $this->date_released;
    }


    
    /**
     * Set year
     *
     * @param string $year
     * @return Movie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
    * Get year
    *
    * @return string
    */
    public function getYear()
    {
        return $this->year;
    }


    
    /**
     * Set trailer
     *
     * @param string $trailer
     * @return Movie
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
    * Get trailer
    *
    * @return string
    */
    public function getTrailer()
    {
        return $this->trailer;
    }


    
    /**
     * Set sinopsis
     *
     * @param string $sinopsis
     * @return Movie
     */
    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    /**
    * Get sinopsis
    *
    * @return string
    */
    public function getSinopsis()
    {
        return $this->sinopsis;
    }


    
    /**
     * Set musicians
     *
     * @param string $musicians
     * @return Movie
     */
    public function setMusicians($musicians)
    {
        $this->musicians = $musicians;

        return $this;
    }

    /**
    * Get musicians
    *
    * @return string
    */
    public function getMusicians()
    {
        return $this->musicians;
    }


    
    /**
     * Set screenwriters
     *
     * @param string $screenwriters
     * @return Movie
     */
    public function setScreenwriters($screenwriters)
    {
        $this->screenwriters = $screenwriters;

        return $this;
    }

    /**
    * Get screenwriters
    *
    * @return string
    */
    public function getScreenwriters()
    {
        return $this->screenwriters;
    }


    
    /**
     * Set directors
     *
     * @param string $directors
     * @return Movie
     */
    public function setDirectors($directors)
    {
        $this->directors = $directors;

        return $this;
    }

    /**
    * Get directors
    *
    * @return string
    */
    public function getDirectors()
    {
        return $this->directors;
    }


    
    /**
     * Set producers
     *
     * @param string $producers
     * @return Movie
     */
    public function setProducers($producers)
    {
        $this->producers = $producers;

        return $this;
    }

    /**
    * Get producers
    *
    * @return string
    */
    public function getProducers()
    {
        return $this->producers;
    }


    
    /**
     * Set actors
     *
     * @param string $actors
     * @return Movie
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
    * Get actors
    *
    * @return string
    */
    public function getActors()
    {
        return $this->actors;
    }


    
    /**
     * Set genres
     *
     * @param string $genres
     * @return Movie
     */
    public function setGenres($genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
    * Get genres
    *
    * @return string
    */
    public function getGenres()
    {
        return $this->genres;
    }


    
    /**
     * Set links_watch
     *
     * @param string $links_watch
     * @return Movie
     */
    public function setLinksWatch($links_watch)
    {
        $this->links_watch = $links_watch;

        return $this;
    }

    /**
    * Get links_watch
    *
    * @return string
    */
    public function getLinksWatch()
    {
        return $this->links_watch;
    }


    
    /**
     * Set links_download
     *
     * @param string $links_download
     * @return Movie
     */
    public function setLinksDownload($links_download)
    {
        $this->links_download = $links_download;

        return $this;
    }

    /**
    * Get links_download
    *
    * @return string
    */
    public function getLinksDownload()
    {
        return $this->links_download;
    }


    
    /**
     * Set views
     *
     * @param string $views
     * @return Movie
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
     * Set rating
     *
     * @param string $rating
     * @return Movie
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
    * Get rating
    *
    * @return string
    */
    public function getRating()
    {
        return $this->rating;
    }


    
    /**
     * Set next_release
     *
     * @param string $next_release
     * @return Movie
     */
    public function setNextRelease($next_release)
    {
        $this->next_release = $next_release;

        return $this;
    }

    /**
    * Get next_release
    *
    * @return string
    */
    public function getNextRelease()
    {
        return $this->next_release;
    }


    
    /**
     * Set image
     *
     * @param string $image
     * @return Movie
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
