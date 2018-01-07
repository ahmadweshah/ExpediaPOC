<?php

namespace App\Http\Controllers;

use App\Library\Entity\City;
use App\Library\Entity\Destination;
use App\Library\Entity\PriceRange;
use App\Library\Entity\Rating;
use App\Library\Entity\TripDate;
use App\Library\General\QueryRequest;
use App\Library\Query\HotelQuery;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Log;

class QueryController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Hotel query controller allows users to search for hotel deals
     *
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function hotelQuery(Request $request)
    {
        //log query since many requests have been coming in!
        $this->logQuery($request);

        //validate request parameters
        $this->validateRequest($request);

        //collect parameters
        $destinationName = $request->input('destinationName') ?? '';
        $tripStartDate   = $request->input('tripStartDate') ?? '';
        $tripEndDate     = $request->input('tripEndDate') ?? '';
        $minStarRating   = $request->input('minStarRating') ?? '';
        $maxStarRating   = $request->input('maxStarRating') ?? '';
        $minTotalRate    = $request->input('minTotalRate') ?? '';
        $maxTotalRate    = $request->input('maxTotalRate') ?? '';

        //create a hotel query object with parameters
        $query = new HotelQuery();
        $query->setDestination(new Destination($destinationName));
        $query->setTripDate(new TripDate($tripStartDate, $tripEndDate));
        $query->setRating(new Rating($minStarRating, $maxStarRating));
        $query->setPriceRange(new PriceRange($minTotalRate, $maxTotalRate));

        //pass query object to QueryRequest object - must implement QueryInterface
        $queryRequest = new QueryRequest($query);
        Log::info('query: ' . var_export($query, true));
        $hotels       = $queryRequest->getResult();
        Log::info('queryRequest: ' . var_export($hotels, true));
        $hotels       = $hotels['offers']['Hotel'] ?? []; //pass only hotel index to view

        //text search string for view if we have search parameters
        $searchString = null !== $request->input('search') ? $query->getSearchString(count($hotels)) : '';

        //return view
        return view('hotel', [
            'hotels'       => $hotels,
            'cities'       => City::getCityList(),
            'searchString' => $searchString]);
    }

    private function validateRequest($request)
    {
        $this->validate($request, [
            'destinationName' => 'nullable|string|max:20',
            'tripStartDate'   => 'nullable|date|after_or_equal:today',
            'tripEndDate'     => 'nullable|date|after:tripStartDate',
            'minStarRating'   => 'nullable|numeric|between:1,5',
            'maxStarRating'   => 'nullable|numeric|between:1,5|min:' . $request->input('minStarRating'),
            'minTotalRate'    => 'nullable|numeric|between:0,5000',
            'maxTotalRate'    => 'nullable|numeric|between:0,5000|min:' . $request->input('minTotalRate'),
        ]);
    }

    private function logQuery($request)
    {
        Log::info('Site query with parameters: ' . var_export($request->all(), true));
    }
}