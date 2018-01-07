<?php

/**
 * Rating class
 *
 * Represents a rating entity with minimum and maximum rating
 */

namespace App\Library\Entity;
use App\Library\Exception\ValidationException;

class Rating
{
    private $minimum;
    private $maximum;

    public function __construct($minimum, $maximum)
    {
        $this->setMinimum($minimum);
        $this->setMaximum($maximum);
    }

    private function setMinimum($minimum): Rating
    {
        $this->minimum = $this->validateRating($minimum);

        return $this;
    }

    public function getMinimum()
    {
        return $this->minimum;
    }

    private function setMaximum($maximum): Rating
    {
        $this->maximum = $this->validateRating($maximum);

        return $this;
    }

    public function getMaximum()
    {
        return $this->maximum;
    }

    private function validateRating($rating)
    {
        if (is_numeric($rating) && ($rating >= 1 && $rating <= 5) || empty($rating))
        {
            return $rating;
        }
        else
        {
            throw new ValidationException('Invalid rating: ' . $rating);
        }
    }
}