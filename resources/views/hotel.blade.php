<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Expedia</title>

        <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.js"></script>
        <script src="/js/jquery-ui.js"></script>
        <script src="/js/spin.js"></script>
        <script src="/js/sidebar.js"></script>
    </head>

    <body>
        <div class="container-fluid">

            {{--main menu--}}
            <div class="row">
                @include('partials/menu')
            </div>

            {{--site logo--}}
            <div class="row rowheader">
                @include('partials/logo')
            </div>

            {{--linebreak--}}
            <div class="col-xs-12">
                <hr>
            </div>

            {{--content--}}
            <div class="row row-centered">

                {{--sidebar panel--}}
                <div class="col-md-3 col-sm-12 col-xs-12">
                    @include('partials/sidebar')
                </div>

                {{--hotel results and content--}}
                <div class="col-md-9 col-sm-12 col-xs-12" id='mainContent'>

                    {{--validation errors--}}
                    @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif

                    {{--search string--}}
                    @if(!empty($searchString))
                        <div class="alert alert-info">
                            {{ $searchString }}
                        </div>
                    @endif



                    {{--results for hotels--}}
                    @each('partials/hotel', $hotels, 'hotel')
                </div>
            </div>

            {{--footer--}}
            @include('partials/footer')

        </div>
    </body>
</html>
