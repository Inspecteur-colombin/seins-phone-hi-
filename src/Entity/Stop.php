<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopRepository")
 */
class Stop
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
    private $stop_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stop_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stop_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stop_desc;

    /**
     * @ORM\Column(type="float", scale=4, precision=6)
     */
    private $stop_lat;

    /**
     * @ORM\Column(type="float", scale=4, precision=7)
     */
    private $stop_lon;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zone_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $stop_url;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $location_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $parent_station;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\College", inversedBy="stops")
     */
    private $colleges;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StopTime", mappedBy="stops")
     */
    private $stopTimes;

    public function __construct()
    {
        $this->colleges = new ArrayCollection();
        $this->stopTimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStopId(): ?string
    {
        return $this->stop_id;
    }

    public function setStopId(string $stop_id): self
    {
        $this->stop_id = $stop_id;

        return $this;
    }

    public function getStopCode(): ?string
    {
        return $this->stop_code;
    }

    public function setStopCode(?string $stop_code): self
    {
        $this->stop_code = $stop_code;

        return $this;
    }

    public function getStopName(): ?string
    {
        return $this->stop_name;
    }

    public function setStopName(string $stop_name): self
    {
        $this->stop_name = $stop_name;

        return $this;
    }

    public function getStopDesc(): ?string
    {
        return $this->stop_desc;
    }

    public function setStopDesc(?string $stop_desc): self
    {
        $this->stop_desc = $stop_desc;

        return $this;
    }

    public function getStopLat(): ?string
    {
        return $this->stop_lat;
    }

    public function setStopLat(string $stop_lat): self
    {
        $this->stop_lat = $stop_lat;

        return $this;
    }

    public function getStopLon(): ?string
    {
        return $this->stop_lon;
    }

    public function setStopLon(string $stop_lon): self
    {
        $this->stop_lon = $stop_lon;

        return $this;
    }

    public function getZoneId(): ?string
    {
        return $this->zone_id;
    }

    public function setZoneId(?string $zone_id): self
    {
        $this->zone_id = $zone_id;

        return $this;
    }

    public function getStopUrl(): ?string
    {
        return $this->stop_url;
    }

    public function setStopUrl(?string $stop_url): self
    {
        $this->stop_url = $stop_url;

        return $this;
    }

    public function getLocationType(): ?int
    {
        return $this->location_type;
    }

    public function setLocationType(?int $location_type): self
    {
        $this->location_type = $location_type;

        return $this;
    }

    public function getParentStation(): ?string
    {
        return $this->parent_station;
    }

    public function setParentStation(?string $parent_station): self
    {
        $this->parent_station = $parent_station;

        return $this;
    }

    /**
     * @return Collection|College[]
     */
    public function getColleges(): Collection
    {
        return $this->colleges;
    }

    public function addCollege(College $college): self
    {
        if (!$this->colleges->contains($college)) {
            $this->colleges[] = $college;
        }

        return $this;
    }

    public function removeCollege(College $college): self
    {
        if ($this->colleges->contains($college)) {
            $this->colleges->removeElement($college);
        }

        return $this;
    }

    /**
     * @return Collection|StopTime[]
     */
    public function getStopTimes(): Collection
    {
        return $this->stopTimes;
    }

    public function addStopTime(StopTime $stopTime): self
    {
        if (!$this->stopTimes->contains($stopTime)) {
            $this->stopTimes[] = $stopTime;
            $stopTime->setStops($this);
        }

        return $this;
    }

    public function removeStopTime(StopTime $stopTime): self
    {
        if ($this->stopTimes->contains($stopTime)) {
            $this->stopTimes->removeElement($stopTime);
            // set the owning side to null (unless already changed)
            if ($stopTime->getStops() === $this) {
                $stopTime->setStops(null);
            }
        }

        return $this;
    }
}
