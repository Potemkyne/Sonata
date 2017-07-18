<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Award
 *
 * @ORM\Table(name="award")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AwardRepository")
 */
class Award
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="awards")
     * @ORM\JoinColumn(nullable=false,onDelete="CASCADE")
     */
    private $movie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;
    
     /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

     /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Award
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Award
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
     * Set movie
     *
     * @param \AppBundle\Entity\Movie $movie
     *
     * @return Award
     */
    public function setMovie(\AppBundle\Entity\Movie $movie)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \AppBundle\Entity\Movie
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Award
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
