<?php

/**
 * Destination class
 *
 * Represents a destination entity
 */

namespace App\Library\Entity;
use App\Library\Entity\City;
use App\Library\Exception\ValidationException;

class Destination
{
    private $name;

    public function __construct($name)
    {
        $this->setName($name);
    }

    private function setName(string $name): Destination
    {
        $this->name = $this->validateName($name);

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    private function validateName(string $name): string
    {
        if (in_array($name, City::getCityList()) || empty($name))
        {
            return $name;
        }
        else
        {
            throw new ValidationException('Invalid city name: ' . $name);
        }
    }
}