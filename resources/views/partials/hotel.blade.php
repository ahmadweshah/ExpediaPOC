{{--single hotel entity--}}
<row>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <row>
            {{--hotel title and city--}}
            <div class="col-md-6 col-sm-6 col-xs-6">
                <a href="{{ urldecode($hotel['hotelUrls']['hotelInfositeUrl']) }}">
                    <h4><u>{{ str_limit($hotel['hotelInfo']['hotelName'], 30, '...') }}</u></h4>
                </a>
                <p><strong>{{ $hotel['destination']['longName'] }}</strong></p>
            </div>

            {{--rating and price information--}}
            <div class="col-md-6 col-sm-6 col-xs-6">
                <row>
                    {{--rating--}}
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 class="pull-right" style="color: #2e6da4">
                            <strong>{{ $hotel['hotelInfo']['hotelStarRating'] }} /
                                5
                                rating</strong></h4>
                    </div>
                </row>

                <row>
                    {{--price--}}
                    <div class="col-md-8 col-sm-6 col-xs-12">
                        <h4 class="" align="right">
                            <strong>${{ $hotel['hotelPricingInfo']['originalPricePerNight'] }} {{ $hotel['hotelPricingInfo']['currency'] }}</strong><br><i>per night</i></h4>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h4 align="right">
                            <strong>${{ $hotel['hotelPricingInfo']['totalPriceValue'] }} {{ $hotel['hotelPricingInfo']['currency'] }}</strong><br><i>for {{ $hotel['offerDateRange']['lengthOfStay'] }} nights</i></h4>
                    </div>
                </row>
            </div>
        </row>

        <br>

        <row>
            {{--hotel thumbnail image--}}
            <div class="col-md-2 col-sm-3 col-xs-12">
                @if (!empty($hotel['hotelInfo']['hotelImageUrl']))
                    <img height="120px" width="120px" src="{{  $hotel['hotelInfo']['hotelImageUrl'] }}"
                         class="img-thumbnail">
                @else
                    <div height="120px" width="120px"></div>
                @endif
            </div>

            <div class="col-md-10 col-sm-9 col-xs-12">
                {{--hotel text information--}}
                <p><strong>Description: </strong>{{ $hotel['hotelInfo']['description'] }}</p>

                {{--promotion--}}
                @if (isset($hotel['hotelPricingInfo']['percentSavings']) && $hotel['hotelPricingInfo']['percentSavings'] > 0)
                    <p><strong>Discount: </strong>{{ $hotel['hotelPricingInfo']['percentSavings'] }}%
                        discount</p>
                @endif

                {{--availability--}}
                @if (isset($hotel['hotelUrgencyInfo']['almostSoldStatus']) && $hotel['hotelUrgencyInfo']['almostSoldStatus'] === 'ALMOST_SOLD')
                    <div class="alert alert-warning pull-right">
                        <strong>Almost sold out!</strong>
                    </div>
                @endif
            </div>
        </row>

        <row>
            {{--book this deal--}}
            <div class="col-xs-12">
                <a href="{{ urldecode($hotel['hotelUrls']['hotelInfositeUrl']) }}" class="btn btn-default pull-right"
                   role="button">Book this hotel</a>
            </div>
        </row>

        {{--linebreak--}}
        <div class="col-xs-12">
            <hr>
        </div>
    </div>
</row>