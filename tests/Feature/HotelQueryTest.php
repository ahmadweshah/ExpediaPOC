<?php

namespace Tests\Feature;

use App\Library\Entity\Destination;
use App\Library\Entity\Rating;
use App\Library\Entity\TripDate;
use App\Library\Entity\PriceRange;
use App\Library\Query\HotelQuery;
use App\Library\Query\QueryInterface;
use Tests\TestCase;

class HotelQueryTest extends TestCase
{
    public function testHotelQuery()
    {
        $query = new HotelQuery();

        $this->assertInstanceOf(QueryInterface::class, $query);

        return $query;
    }

    /**
     * @expectedException App\Library\Exception\ValidationException
     */
    public function testDestinationValidation()
    {
        $query = new HotelQuery();
        $query->setDestination(new Destination('RandomCityHere'));
    }

    /**
     * @expectedException App\Library\Exception\ValidationException
     */
    public function testRatingValidation()
    {
        $query = new HotelQuery();
        $query->setRating(new Rating(40, 50));
    }

    /**
     * @depends testHotelQuery
     */
    public function testHotelQueryParameters(QueryInterface $query)
    {
        $query->setDestination(new Destination('Chicago'));
        $query->setTripDate(new TripDate('2017-08-01', '2017-08-02'));
        $query->setRating(new Rating(4, 5));
        $query->setPriceRange(new PriceRange('', ''));

        $parameters = 'destinationName=Chicago&minTripStartDate=2017-08-01&maxTripStartDate=2017-08-02&lengthOfStay=1&minStarRating=4&maxStarRating=5';
        $this->assertEquals($parameters, $query->getParameters());

        return $query;
    }

    /**
     * @depends testHotelQueryParameters
     */
    public function testHotelQueryUrl(QueryInterface $query)
    {
        $url = $query->getUrl();
        $this->assertEquals('https://offersvc.expedia.com/offers/v2/getOffers', $query->getUrl());
    }
}
