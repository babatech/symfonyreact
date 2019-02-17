<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RestaurantRepository")
 */
class Restaurant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $statusID;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fav;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $bestMatch;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $newest;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $ratingAverage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $distance;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $popularity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $averageProductPrice;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $deliveryCosts;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minCost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatusID(): ?int
    {
        return $this->statusID;
    }

    public function setStatusID(?int $statusID): self
    {
        $this->statusID = $statusID;

        return $this;
    }

    public function getFav(): ?int
    {
        return $this->fav;
    }

    public function setFav(?int $fav): self
    {
        $this->fav = $fav;

        return $this;
    }

    public function getBestMatch(): ?float
    {
        return $this->bestMatch;
    }

    public function setBestMatch(?float $bestMatch): self
    {
        $this->bestMatch = $bestMatch;

        return $this;
    }

    public function getNewest(): ?float
    {
        return $this->newest;
    }

    public function setNewest(?float $newest): self
    {
        $this->newest = $newest;

        return $this;
    }

    public function getRatingAverage(): ?float
    {
        return $this->ratingAverage;
    }

    public function setRatingAverage(?float $ratingAverage): self
    {
        $this->ratingAverage = $ratingAverage;

        return $this;
    }

    public function getDistance(): ?int
    {
        return $this->distance;
    }

    public function setDistance(?int $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getPopularity(): ?float
    {
        return $this->popularity;
    }

    public function setPopularity(?float $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getAverageProductPrice(): ?int
    {
        return $this->averageProductPrice;
    }

    public function setAverageProductPrice(?int $averageProductPrice): self
    {
        $this->averageProductPrice = $averageProductPrice;

        return $this;
    }

    public function getDeliveryCosts(): ?int
    {
        return $this->deliveryCosts;
    }

    public function setDeliveryCosts(?int $deliveryCosts): self
    {
        $this->deliveryCosts = $deliveryCosts;

        return $this;
    }

    public function getMinCost(): ?int
    {
        return $this->minCost;
    }

    public function setMinCost(?int $minCost): self
    {
        $this->minCost = $minCost;

        return $this;
    }
}
