<?php

/**
 * Query request class
 *
 * Query request class which takes query objects that implement QueryInterface and executes http request and returns the result as JSON
 */

namespace App\Library\General;

use App\Library\Query\QueryInterface;
use GuzzleHttp;
use Illuminate\Support\Facades\Log;

class QueryRequest
{
    private $url;
    private $parameters;

    public function __construct(QueryInterface $query)
    {
        $this->setUrl($query->getUrl());
        $this->setParameters($query->getParameters());
    }

    private function setUrl(string $url): QueryRequest
    {
        $this->url = $url;

        return $this;
    }

    private function getUrl(): string
    {
        return $this->url;
    }

    private function setParameters(string $parameters): QueryRequest
    {
        $this->parameters = $parameters;

        return $this;
    }

    private function getParameters(): string
    {
        return $this->parameters;
    }

    public function getResult(): array
    {
        Log::info('hereee');
        try
        {
            $client = new GuzzleHttp\Client();
            $result = $client->get($this->getUrl() . $this->getParameters());
            Log::info('url: ' . var_export($this->getUrl(), true));
            Log::info('Parameters: ' . var_export($this->getParameters(), true));
            return json_decode($result->getBody(), true);
        }
        catch (\Exception $e)
        {
            Log::critical($e->getMessage());
            return [];
        }
    }
}