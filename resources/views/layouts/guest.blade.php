<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

@livewireStyles

<!-- Scripts -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap&libraries=places&sensor=false&v=weekly"
            defer></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script type ="text/javascript" src="{{ asset('js/v3_epoly.js') }}" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="min-h-screen bg-gray-100 antialiased">
<div class="min-h-screen bg-gray-100 flex flex-col">
    <div>
        <livewire:frontend-header/>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="flex-1 bg-gray-900">
                @if(isset($scrollText))
                    <div class="bg-white shadow py-1 mb-1 flex items-center justify-center">
                        {{ $scrollText }}
                    </div>
                @endif
                <div class="bg-white shadow mx-auto py-2 roboto">
                    {{ $header }}
                </div>
            </header>
        @endif
    </div>
    <!-- Page Content -->
    <main class="flex flex-col flex-grow relative">
        <div id="map" class="absolute top-0 bottom-0 left-0 right-0 z-0"></div>
        <div class="absolute top-0 bottom-0 left-0 right-0 z-10 bg-black opacity-60"></div>
        <div class="z-20 flex flex-col flex-grow">
            {{ $slot }}
        </div>
    </main>
</div>
@stack('modals')

@livewireScripts
<script>
    let map;
    let directionsService;
    let address;
    let geocoder;

    let step = 5; // 5; // metres

    let lines = []

    const locations = [
        {
            start: "cnr, Hendrik Potgieter &, 10th Ave, Edenvale, 1609",
            end: "Diepsloot Mall, 1st Avenue, Diepsloot West 7, Diepsloot"
        },
        {
            start: "12 Pretoria Rd, Kempton Place, Kempton Park, 1619",
            end: "Pretoria West, Pretoria, 0183"
        },
        {
            start: "Sandton, Johannesburg",
            end: "Pretoria National Botanical Gardens"
        }
    ]

    window.setRoutes = setRoutes;
    window.initialize = initMap;

    function initMap() {
        // initial location which loads up on map
        address = 'Melville, Johannesburg'

        locations.forEach(({start, end}) => {
            lines.push({
                start,
                end,
                marker: [],
                polyLine: [],
                poly: [],
                startLocation: '',
                endLocation: '',
                timerHandle: [],
                startLoc: [],
                endLoc: [],
                eol: [],
                lastVertex: 1
            })
        })

        const myLatLng = {
            lat: -26.165213,
            lng: 28.01085
        };

        map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13,
            center: myLatLng,
            zoomControl: false,
            fullscreenControl: false,
            streetViewControl: false
        });

        geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'address': address }, function (results, status) {
            map.fitBounds(results[0].geometry.viewport);
            setRoutes();
        });

    }

    // returns the marker
    function createMarker(latlng, label) {
        // using Marker api, marker is created
        const image = label == "red" ? "/images/truck-red.png" : "/images/truck-green.png";
        let marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: '',
            zIndex: 10,
            icon: image
        });
        marker.myname = label;

        return marker;
    }

    function toggleError(msg) {
        console.log(msg)
    }

    // Using Directions Service find the route between the starting and ending points
    function setRoutes() {
        // empty out the error msg
        toggleError("");

        directionsService = new google.maps.DirectionsService();
        const travelMode = google.maps.DirectionsTravelMode.DRIVING;


        lines.forEach((line, index) => {
            line.startLoc[0] = line.start
            line.endLoc[0] = line.end

            // empty out previous values
            line.startLocation = [];
            line.endLocation = [];
            line.polyLine = [];
            line.poly = [];
            line.timerHandle = [];
            line.disp = null;

            for (let i = 0; i < line.startLoc.length; i++) {
                let rendererOptions = {
                    map: map,
                    suppressMarkers: true,
                    preserveViewport: false
                };

                let request = {
                    origin: line.startLoc[i],
                    destination: line.endLoc[i],
                    travelMode: travelMode
                };

                directionsService.route(request, makeRouteCallback(i, rendererOptions, index));
            }
        })

        createMarker({lat: -26.009272, lng: 28.010762}, "red")
        createMarker({lat: -26.044644, lng: 28.086277}, "red")
    }

    // called after getting route from directions service, does all the heavylifting
    function makeRouteCallback(routeNum, rendererOptions, lineIndex) {
        // check if polyline and map exists, if yes, no need to do anything else, just start the animation
        if (lines[lineIndex].polyLine[routeNum] && (lines[lineIndex].polyLine[routeNum].getMap() != null)) {
            startAnimation(routeNum, lineIndex);
            return;
        }
        return function (response, status) {
            // if directions service successfully returns and no polylines exist already, then do the following
            if (status === google.maps.DirectionsStatus.ZERO_RESULTS) {
                toggleError("No routes available for selected locations");
                return;
            }
            if (status === google.maps.DirectionsStatus.OK) {
                lines[lineIndex].startLocation[routeNum] = {};
                lines[lineIndex].endLocation[routeNum] = {};
                // set up polyline for current route
                lines[lineIndex].polyLine[routeNum] = new google.maps.Polyline({
                    path: [],
                    strokeColor: '#FFFF00',
                    strokeWeight: 3
                });
                lines[lineIndex].poly[routeNum] = new google.maps.Polyline({
                    path: [],
                    strokeColor: '#FFFF00',
                    strokeWeight: 3
                });
                // For each route, display summary information.
                let legs = response.routes[0].legs;


                lines[lineIndex].disp = new google.maps.DirectionsRenderer(rendererOptions);
                lines[lineIndex].disp.setMap(map);
                lines[lineIndex].disp.setDirections(response);

                // create Markers
                for (let i = 0; i < legs.length; i++) {
                    // for first marker only
                    if (i === 0) {
                        lines[lineIndex].startLocation[routeNum].latlng = legs[i].start_location;
                        lines[lineIndex].startLocation[routeNum].address = legs[i].start_address;
                        lines[lineIndex].marker[routeNum] = createMarker(legs[i].start_location, "start", legs[i].start_address, "green");
                    }
                    lines[lineIndex].endLocation[routeNum].latlng = legs[i].end_location;
                    lines[lineIndex].endLocation[routeNum].address = legs[i].end_address;
                    let steps = legs[i].steps;
                    for (let j = 0; j < steps.length; j++) {
                        let nextSegment = steps[j].path;
                        for (let k = 0; k < nextSegment.length; k++) {
                            lines[lineIndex].polyLine[routeNum].getPath().push(nextSegment[k]);
                        }
                    }
                }

            }
            if (lines[lineIndex].polyLine[routeNum]) {
                // render the line to map
                lines[lineIndex].polyLine[routeNum].setMap(map);
                // and start animation
                startAnimation(routeNum, lineIndex);
            }
        }
    }

    // Spawn a new polyLine every 20 vertices
    function updatePoly(i, d, lineIndex) {
        if (lines[lineIndex].poly[i].getPath().getLength() > 20) {
            lines[lineIndex].poly[i] = new google.maps.Polyline([lines[lineIndex].polyLine[i].getPath().getAt(lines[lineIndex].lastVertex - 1)]);
        }

        if (lines[lineIndex].polyLine[i].GetIndexAtDistance(d) < lines[lineIndex].lastVertex + 2) {
            if (lines[lineIndex].poly[i].getPath().getLength() > 1) {
                lines[lineIndex].poly[i].getPath().removeAt(lines[lineIndex].poly[i].getPath().getLength() - 1)
            }
            lines[lineIndex].poly[i].getPath().insertAt(lines[lineIndex].poly[i].getPath().getLength(), lines[lineIndex].polyLine[i].GetPointAtDistance(d));
        } else {
            lines[lineIndex].poly[i].getPath().insertAt(lines[lineIndex].poly[i].getPath().getLength(), lines[lineIndex].endLocation[i].latlng);
        }
    }

    // updates marker position to make the animation and update the polyline
    function animate(index, d, tick, lineIndex) {
        if (d > lines[lineIndex].eol[index]) {
            lines[lineIndex].marker[index].setPosition(lines[lineIndex].endLocation[index].latlng);
            return;
        }
        let p = lines[lineIndex].polyLine[index].GetPointAtDistance(d);
        lines[lineIndex].marker[index].setPosition(p);
        updatePoly(index, d, lineIndex);
        lines[lineIndex].timerHandle[index] = setTimeout(() => {
            animate(index,(d + step), tick || 100, lineIndex)
        }, tick || 100, lineIndex);
    }

    // start marker movement by updating marker position every 100 milliseconds i.e. tick value
    function startAnimation(index, lineIndex) {
        if (lines[lineIndex].timerHandle[index])
            clearTimeout(lines[lineIndex].timerHandle[index]);

        lines[lineIndex].eol[index] = lines[lineIndex].polyLine[index].Distance();

        map.setCenter(lines[lineIndex].polyLine[index].getPath().getAt(0));

        lines[lineIndex].poly[index] = new google.maps.Polyline({
            path: [lines[lineIndex].polyLine[index].getPath().getAt(0)],
            strokeColor: "#FFFF00",
            strokeWeight: 3
        });
        lines[lineIndex].timerHandle[index] = setTimeout("animate(" + index + ",50, undefined," + lineIndex + ")", 2000);
    }
</script>
</body>
</html>
