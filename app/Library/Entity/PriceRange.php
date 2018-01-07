<?php

/**
 * Rating class
 *
 * Represents a rating entity with minimum and maximum rating
 */

namespace App\Library\Entity;
use App\Library\Exception\ValidationException;

class PriceRange
{
    private $minimum;
    private $maximum;

    public function __construct($minimum, $maximum)
    {
        $this->setMinimum($minimum);
        $this->setMaximum($maximum);
    }

    private function setMinimum($minimum): PriceRange
    {
        $this->minimum = $this->validatePrice($minimum);

        return $this;
    }

    public function getMinimum()
    {
        return $this->minimum;
    }

    private function setMaximum($maximum): PriceRange
    {
        $this->maximum = $maximum;

        return $this;
    }

    public function getMaximum()
    {
        return $this->maximum;
    }

    private function validatePrice($price)
    {
        return $price;
    }
}