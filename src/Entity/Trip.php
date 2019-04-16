<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TripRepository")
 */
class Trip
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $route_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $service_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trip_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trip_headsign;

    /**
     * @ORM\Column(type="integer")
     */
    private $direction_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $block_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $shape_id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\StopTime", inversedBy="trips")
     */
    private $stoptimes;

    public function __construct()
    {
        $this->stoptimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRouteId(): ?string
    {
        return $this->route_id;
    }

    public function setRouteId(string $route_id): self
    {
        $this->route_id = $route_id;

        return $this;
    }

    public function getServiceId(): ?string
    {
        return $this->service_id;
    }

    public function setServiceId(string $service_id): self
    {
        $this->service_id = $service_id;

        return $this;
    }

    public function getTripId(): ?string
    {
        return $this->trip_id;
    }

    public function setTripId(string $trip_id): self
    {
        $this->trip_id = $trip_id;

        return $this;
    }

    public function getTripHeadsign(): ?string
    {
        return $this->trip_headsign;
    }

    public function setTripHeadsign(string $trip_headsign): self
    {
        $this->trip_headsign = $trip_headsign;

        return $this;
    }

    public function getDirectionId(): ?int
    {
        return $this->direction_id;
    }

    public function setDirectionId(int $direction_id): self
    {
        $this->direction_id = $direction_id;

        return $this;
    }

    public function getBlockId(): ?string
    {
        return $this->block_id;
    }

    public function setBlockId(?string $block_id): self
    {
        $this->block_id = $block_id;

        return $this;
    }

    public function getShapeId(): ?int
    {
        return $this->shape_id;
    }

    public function setShapeId(int $shape_id): self
    {
        $this->shape_id = $shape_id;

        return $this;
    }

    /**
     * @return Collection|StopTime[]
     */
    public function getStoptimes(): Collection
    {
        return $this->stoptimes;
    }

    public function addStoptime(StopTime $stoptime): self
    {
        if (!$this->stoptimes->contains($stoptime)) {
            $this->stoptimes[] = $stoptime;
        }

        return $this;
    }

    public function removeStoptime(StopTime $stoptime): self
    {
        if ($this->stoptimes->contains($stoptime)) {
            $this->stoptimes->removeElement($stoptime);
        }

        return $this;
    }
}
