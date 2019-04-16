<?php  
namespace App\Entity;


class CsSearch {


    /**
     * @var string
     */
    private $byCollege;


    /**
     * @var integer|null
     */
    private $distance;


    /**
     * @var float|null 
     */
    private $lat;


    /**
     * @var float|null
     */
    private $lng;









     /**
     * @return int|null
     */
    public function getbyCollege(): ?int
    {
        return $this->byCollege;
    }

    /**
     * @param int|null $byCollege
     * @return CsSearch
     */
    public function setbyCollege(int $byCollege): CsSearch
    {
        $this->byCollege = $byCollege;
        return $this;
    }




    /**
     * @return float|null
     */
    public function getLng(): ?float
    {
        return $this->lng;
    }


    /**
     * @param float|null $lng
     * @return CsSearch
     */
    public function setLng(?float $lng): CsSearch
    {
        $this->lng = $lng;
        return $this;
    }



    /**
     * @return float|null
     */
    public function getLat(): ?float
    {
        return $this->lat;
    }


    /**
     * @param float|null $lat
     * @return CsSearch
     */
    public function setLat(?float $lat): CsSearch
    {
        $this->lat = $lat;
        return $this;
    }



    /**
     * @return int|null
     */
    public function getDistance(): ?int
    {
        return $this->distance;
    }

    /**
     * @param int|null $distance
     * @return PropertySearch
     */
    public function setDistance(?int $distance): PropertySearch
    {
        $this->distance = $distance;
        return $this;
    }


}