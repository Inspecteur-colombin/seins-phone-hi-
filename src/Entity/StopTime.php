<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StopTimeRepository")
 */
class StopTime
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
    private $trip_id;

    /**
     * @ORM\Column(type="time")
     */
    private $arrival_time;

    /**
     * @ORM\Column(type="time")
     */
    private $departure_time;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stop_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stop_sequence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pickup_type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $drop_off_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Stop", inversedBy="stopTimes")
     */
    private $stops;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Trip", mappedBy="stoptimes")
     */
    private $trips;

    public function __construct()
    {
        $this->trips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(\DateTimeInterface $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departure_time;
    }

    public function setDepartureTime(\DateTimeInterface $departure_time): self
    {
        $this->departure_time = $departure_time;

        return $this;
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

    public function getStopSequence(): ?string
    {
        return $this->stop_sequence;
    }

    public function setStopSequence(string $stop_sequence): self
    {
        $this->stop_sequence = $stop_sequence;

        return $this;
    }

    public function getPickupType(): ?int
    {
        return $this->pickup_type;
    }

    public function setPickupType(?int $pickup_type): self
    {
        $this->pickup_type = $pickup_type;

        return $this;
    }

    public function getDropOffType(): ?int
    {
        return $this->drop_off_type;
    }

    public function setDropOffType(?int $drop_off_type): self
    {
        $this->drop_off_type = $drop_off_type;

        return $this;
    }

    public function getStops(): ?Stop
    {
        return $this->stops;
    }

    public function setStops(?Stop $stops): self
    {
        $this->stops = $stops;

        return $this;
    }

    /**
     * @return Collection|Trip[]
     */
    public function getTrips(): Collection
    {
        return $this->trips;
    }

    public function addTrip(Trip $trip): self
    {
        if (!$this->trips->contains($trip)) {
            $this->trips[] = $trip;
            $trip->addStoptime($this);
        }

        return $this;
    }

    public function removeTrip(Trip $trip): self
    {
        if ($this->trips->contains($trip)) {
            $this->trips->removeElement($trip);
            $trip->removeStoptime($this);
        }

        return $this;
    }
}
