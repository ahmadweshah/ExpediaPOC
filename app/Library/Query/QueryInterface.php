<?php
/**
 * QueryInterface class
 *
 * QueryInterface that should be implemented by all query classes
 */

namespace App\Library\Query;


interface QueryInterface
{
    public function getUrl(): string;
    public function getParameters(): array;
}