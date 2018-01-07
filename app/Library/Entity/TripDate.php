<?php

/**
 * TripDate class
 *
 * Represents a trip date with start and end date
 */

namespace App\Library\Entity;

use App\Library\Exception\ValidationException;


class TripDate
{
    private $startDate;
    private $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
    }

    private function setStartDate(string $startDate): TripDate
    {
        $this->startDate = $this->validateDate(\DateTime::createFromFormat('Y-m-d', $startDate));

        return $this;
    }

    public function getStartDate($formatted = false)
    {
        if ($formatted === true)
        {
            return ($this->startDate instanceof \DateTime) ? $this->startDate->format('Y-m-d') : '';
        }
        else
        {
            return ($this->startDate instanceof \DateTime) ? $this->startDate : '';
        }
    }

    private function setEndDate($endDate): TripDate
    {
        $this->endDate = $this->validateDate(\DateTime::createFromFormat('Y-m-d', $endDate));

        return $this;
    }

    public function getEndDate(bool $formatted = false)
    {
        if ($formatted === true)
        {
            return ($this->endDate instanceof \DateTime) ? $this->endDate->format('Y-m-d') : '';
        }
        else
        {
            return ($this->endDate instanceof \DateTime) ? $this->endDate : '';
        }
    }

    public function getlengthOfStay()
    {
        if ($this->getStartDate() instanceof \DateTime && $this->getEndDate() instanceof \DateTime)
        {
            return $this->getStartDate()->diff($this->getEndDate())->days;
        }
        else
        {
            return;
        }
    }

    private function validateDate($date)
    {
        if ($date instanceof \DateTime || $date === false)
        {
            return $date;
        }
        else
        {
            throw new ValidationException('Invalid date.');
        }
    }
}