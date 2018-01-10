<?php

/**
 * Query request class
 *
 * Query request class which takes query objects that implement QueryInterface and executes http request and returns the result as JSON
 */

namespace App\Library\General;

use App\Library\Query\QueryInterface;
use Illuminate\Support\Facades\Log;
use Ixudra\Curl\Facades\Curl;
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

    private function setParameters(array $parameters): QueryRequest
    {
        $this->parameters = $parameters;

        return $this;
    }

    private function getParameters(): array
    {
        return $this->parameters;
    }

    public function getResult(): array
    {
        Log::info('hereee');
        try
        {
            $response = Curl::to($this->getUrl())
                ->withData( $this->getParameters() )
                ->enableDebug('/tmp/logFile.txt')
                ->get();
            return json_decode($response, true);
        }
        catch (\Exception $e)
        {
            Log::critical($e->getMessage());
            return [];
        }
    }
}