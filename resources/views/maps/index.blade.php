

<!DOCTYPE html>
<html>
<head><meta name="viewport" content="initial-scale=1.0"><meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CAFE-CACAO - Localisation de la vente</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link href="http://localhost:8000/argon/img/brand/favicon.png" rel="icon" type="image/png">

    {{--<link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">
--}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- My own Styles -->
  {{--  <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">--}}

    <style>

        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .label {
            margin-left: 5px;
        }
    </style>
</head>

<body>
<br>
<div class="container">
    <div class="row">

       {{-- <div class="col-md-8">
            <form method="GET" action="{{ route('maps.bycommune') }}">
                <div class="form-group row mx-sm-2">
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Commune</label>
                    <div class="col-sm-3">
                        <select id="com" name="commune" class="form-control">

                            @if($commune->count())

                                <option value="0">All communes</option>

                                @foreach ($commune as $communes)
                                    <option value="{{$communes->id}}"  >{{$communes->name}}</option>
                                @endforeach

                            @endif


                        </select>
                    </div>
                    <label for="inputEmail3" class="col-sm-2 col-form-label text-left">Campagne</label>
                    <div class="col-sm-3">
                        <select id="cam" name="campagne" class="form-control">

                            @if($campagne->count())

                                <option value="0">All campagnes</option>

                                @foreach ($campagne as $campagnes)
                                    <option value="{{$campagnes->code}}"  >{{$campagnes->libelle}}</option>
                                @endforeach

                            @endif


                        </select>
                    </div>

                    <div class="col-sm-2">
                        <button class="btn btn-md btn-primary btn-block" type="submit">Filtrer</button>
                    </div>

                </div>
            </form>
        </div>

        --}}{{--<div class="col-md-4">

        </div>--}}{{--

        <div class="col-md-3 page-action ">
            <div class="row">
               --}}{{-- <h2><span class="badge badge-success">Total Visuel</span></h2>
                <h2><span class="badge badge-primary">{{$visuel}}</span></h2>--}}{{--
            </div>
        </div>--}}

        <div class="col-md-1 page-action text-right">
            <a href="{{ url()->previous() }}" class="btn btn-default btn-sm"> <i class="material-icons">backspace</i> Retour</a>
        </div>
    </div>
</div>

<div id="map" class="container"></div>

{{--<script src="{{ asset('js/app.js') }}"></script>--}}



<script>
    var markers = @json($vente);

    var map;



    /*function initMap() {
        // The location of Uluru
        var cotedivoire = { lat: 7.3904388, lng: -4.4253454};

        var nord = markers[0].latitude;
        var sud = markers[0].latitude;

        console.log(nord);
        //var pisteur = {lat: 5.354688333333333, lng: -4.006633527777778};
        //var pisteur = {lat: parseFloat(nord), lng: parseFloat(sud)};
        var pisteur = new google.maps.LatLng(nord, sud);
        //var pisteur = new google.maps.LatLng(.354688333333333, -4.006633527777778);
        //var pisteur = {lat: markers.latitude, lng: markers.longitude};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 7.19, center: cotedivoire});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: pisteur, map: map});
    }*/
   //var infowindows;




    function initMap() {

        /*var*/ map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 7.3904388, lng: -4.4253454},



            zoom: 7.19

        });

        var marker = [];



        for(var i =0; i < markers.length; i++ ){

            var lat = markers[i].latitude;
            var lng = markers[i].longitude;




           var location = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));

            var marker = new google.maps.Marker({

                position : location,

                map:map,
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }

            });


        }

    }



</script>



<script src="https://maps.googleapis.com/maps/api/js?key=appkey&callback=initMap" async defer></script>





</body>
</html>
