<?php

namespace App\Library\General;

class QueryHelper
{
    protected function prepareRequestParameters($parameters)
    {
        //clear empty request values
        $parameters = array_filter($parameters);

        //build query parameters in http request format
        return http_build_query($parameters);
    }
}