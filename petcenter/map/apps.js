function geoSuccess(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;
    myLatLng = {
        lat: latitude,
        lng: longitude
    };

    var mapProp = {
        center: {lat:-10.328871, lng:123.9632414},
        zoom: 5,
        myTypeId: 'roadMap',
    };
    var map = new google.maps.Map(document.getElementById("map"), mapProp);

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        directionsDisplay.setMap(map);

        var bounds = new google.maps.LatLngBounds();

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'My location'
        });

        var markers = [
            ['Petshop Ko Mactan', -10.2964067, 123.9471298],
            ['Pet Lover Centre', -10.2964067, 123.9471298],
            ['Bow&Wow', -10.2964067, 123.9471298],
            ['House of Paws Pet Shop', -10.3491078, 123.9084448],
            ['RCSC Petshop', -10.3111133, 123.9357652],
            ['my current location', latitude, longitude]
        ];

        var infoWindowContent = [
            ['<div class="info_content">' +
                '<h3>Petshop ko Mactan</h3>' +
                '<p>Unit 15, Mactan Town Center, Basak-Marigondon Rd, Lapu-Lapu City</p>' +
                '</div>'
            ],
            ['<div class="info_content">' +
                '<h3>Pet Lover Centre</h3>' +
                '<p>Level 2 General Maxilom Avenue, corner Juana Osmeña St, Cebu City, Cebu8</p>' +
                '</div>'
            ],
            ['<div class="info_content">' +
                '<h3>' + markers[3][0] + '</h3>' +
                '<p>46 Harrington Street Dublin 8</p>' +
                '</div>'
            ],
            ['<div class="info_content">' +
                '<h3>Bow&Wow</h3>' +
                '<p>Level 3, Unit L336 2B New Wing, Ayala Center Cebu, Cebu City, 6000</p>' +
                '</div>'
            ],
            ['<div class="info_content">' +
                '<h3>House of Paws Pet Shop</h3>' +
                '<p>Unit 104, Socorro Estenzo Bldg, M. L. Quezon Ave, Mandaue City, 6014 Cebu</p>' +
                '</div>'
            ],
            ['<div class="info_content">' +
                '<h3>RCSC Shop</h3>' +
                '<p>punta, Rizal St, Lapu-Lapu City, 6015 Cebu</p>' +
                '</div>'
            ]
        ];

        var infoWindow = new google.maps.InfoWindow(),
        marker, i;

        for (i = 0; i < markers.length; i++) {
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
            bounds.extend(position);
            marker = new google.maps.Marker({
                position: position,
                map: map,
                title: markers[i][0]
            });

            // Allow each marker to have an info window
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent(infoWindowContent[i][0]);
                    infoWindow.open(map, marker);

                    latit = marker.getPosition().lat();
                    longit = marker.getPosition().lng();
                    // console.log("lat: " + latit);
                    // console.log("lng: " + longit);
                }
            })(marker, i));
            marker.addListener('click', function() {
                directionsService.route({
                    origin: myLatLng,
                    destination: {
                        lat: latit,
                        lng: longit
                    },
                    travelMode: 'DRIVING'
                }, function(response, status) {
                    if (status === 'OK') {
                        directionsDisplay.setDirections(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });

            });
            map.fitBounds(bounds);
        }
        function geoError() {
            alert("Geocoder failed.");
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
                // alert("Geolocation is supported by this browser.");
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
    }