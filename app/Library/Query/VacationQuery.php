<?php
/**
 * Vacation query class
 *
 * Abstract class for multiple types of vacation queries (such as a hotel query, flight query, etc)
 */

namespace App\Library\Query;

use App\Library\Entity\Destination;
use App\Library\Entity\PriceRange;
use App\Library\Entity\Rating;
use App\Library\Entity\TripDate;
use App\Library\General\QueryHelper;

abstract class VacationQuery extends QueryHelper
{
    protected $destination;
    protected $tripDate;
    protected $rating;
    protected $priceRange;

    public function __construct()
    {
    }

    public function setDestination(Destination $destination): HotelQuery
    {
        $this->destination = $destination;

        return $this;
    }

    protected function getDestination(): Destination
    {
        return $this->destination;
    }

    public function setTripDate(TripDate $tripDate): HotelQuery
    {
        $this->tripDate = $tripDate;

        return $this;
    }

    protected function getTripDate(): TripDate
    {
        return $this->tripDate;
    }

    public function setRating(Rating $rating): HotelQuery
    {
        $this->rating = $rating;

        return $this;
    }

    protected function getRating(): Rating
    {
        return $this->rating;
    }

    public function setPriceRange(PriceRange $priceRange): HotelQuery
    {
        $this->priceRange = $priceRange;

        return $this;
    }

    protected function getPriceRange(): PriceRange
    {
        return $this->priceRange;
    }
}