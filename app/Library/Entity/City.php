<?php

/**
 * City class
 *
 * Represents a city entity
 */

namespace App\Library\Entity;

class City
{
    public static function getCityList()
    {
        return ['Chicago', 'Dallas', 'Houston', 'London', 'New York', 'Los Angeles', 'San Francisco', 'Mexico City', 'Istanbul', 'Beirut', 'Tokyo', 'Beijing'];
    }
}