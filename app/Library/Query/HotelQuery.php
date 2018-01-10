<?php

/**
 * Hotel query class
 *
 * Simple class that generates and executes a hotel query
 */

namespace App\Library\Query;

class HotelQuery extends VacationQuery implements QueryInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getParameters(): array
    {
        $parameters                     = [];
        $parameters['scenario']         = 'deal-finder';
        $parameters['page']             = 'foo';
        $parameters['uid']              = 'foo';
        $parameters['productType']      = 'Hotel';
        $parameters['destinationName']  = $this->getDestination()->getName() ?? '';
        $parameters['minTripStartDate'] = $this->getTripDate()->getStartDate(true) ?? '';
        $parameters['maxTripStartDate'] = $this->getTripDate()->getEndDate(true) ?? '';
        $parameters['lengthOfStay']     = $this->getTripDate()->getlengthOfStay() ?? '';
        $parameters['minStarRating']    = $this->getRating()->getMinimum() ?? '';
        $parameters['maxStarRating']    = $this->getRating()->getMaximum() ?? '';
        $parameters['minTotalRate']     = $this->getPriceRange()->getMinimum() ?? '';
        $parameters['maxTotalRate']     = $this->getPriceRange()->getMaximum() ?? '';

        return $this->prepareRequestParameters($parameters);
    }

    public function getUrl(): string
    {
        return env('HOTEL_QUERY_URL', false);
    }

    public function getSearchString(int $count): string
    {
        if ($count === 0)
        {
            return 'No results found for the selected query.';
        }

        $searchString = '';
        $searchString .= !empty($this->getDestination()->getName()) ? sprintf(" for %s", $this->getDestination()->getName()) : '';
        $searchString .= !empty($this->getTripDate()->getStartDate()) ? sprintf(" from %s", $this->getTripDate()->getStartDate(true)) : '';
        $searchString .= !empty($this->getTripDate()->getEndDate()) ? sprintf(" until %s", $this->getTripDate()->getEndDate(true)) : '';
        $searchString .= !empty($this->getRating()->getMinimum()) ? sprintf(" with minimum of %s stars", $this->getRating()->getMinimum()) : '';
        $searchString .= !empty($this->getRating()->getMaximum()) ? sprintf(" with maximum of %s stars", $this->getRating()->getMaximum()) : '';

        if (!empty($searchString))
        {
            return sprintf("Showing %s results %s:", $count, $searchString);
        }

        return '';
    }
}