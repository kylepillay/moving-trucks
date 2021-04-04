let map;
let directionsService;
let address;
let geocoder;

let step = 5; // 5; // metres

let lines = []

const locations = [
    {
        start: "Riverlea, Johannesburg",
        end: "Randburg, Johannesburg"
    }
]

window.setRoutes = setRoutes;
window.initialize = initMap;

function initMap() {
    // initial location which loads up on map
    address = 'Johannesburg'

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

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11.09,
        fullscreenControl: false,
        zoomControl: false,
        streetViewControl: false
    });

    geocoder = new google.maps.Geocoder();
    geocoder.geocode({ 'address': address }, function (results, status) {
        map.fitBounds(results[0].geometry.viewport);
    });
    setRoutes();
}

// returns the marker
function createMarker(latlng, label, html) {
    // using Marker api, marker is created
    const image =
        "/images/truck.png";
    let marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: label,
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
        if (status == google.maps.DirectionsStatus.ZERO_RESULTS) {
            toggleError("No routes available for selected locations");
            return;
        }
        if (status == google.maps.DirectionsStatus.OK) {
            lines[lineIndex].startLocation[routeNum] = new Object();
            lines[lineIndex].endLocation[routeNum] = new Object();
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
                for (j = 0; j < steps.length; j++) {
                    let nextSegment = steps[j].path;
                    for (k = 0; k < nextSegment.length; k++) {
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
    lines[lineIndex].timerHandle[index] = setTimeout("animate(" + index + "," + (d + step) + ")", tick || 100, lineIndex);
}

// start marker movement by updating marker position every 100 milliseconds i.e. tick value
function startAnimation(index, lineIndex) {
    console.log(lines[lineIndex])
    if (lines[lineIndex].timerHandle[index])
        clearTimeout(lines[lineIndex].timerHandle[index]);

    lines[lineIndex].eol[index] = lines[lineIndex].polyLine[index].Distance();

    if (lineIndex === 0) {
        map.setCenter(lines[lineIndex].polyLine[index].getPath().getAt(0));
    }

    lines[lineIndex].poly[index] = new google.maps.Polyline({
        path: [lines[lineIndex].polyLine[index].getPath().getAt(0)],
        strokeColor: "#FFFF00",
        strokeWeight: 3
    });
    lines[lineIndex].timerHandle[index] = setTimeout(() => {
        animate(index, 50, undefined, lineIndex)
    }, 2000)  // Allow time for the initial map display
}