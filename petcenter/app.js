function initMap(){
    //map otion
    var options = {
        center: {lat:10.3157, lng:-123.8854},
        zoom: 9,    
    }

    //new map
    map = new google.maps.Map(document.getElementById('map'), options);

    //marker
    const marker = new google.maps.Marker({
        position: {lat: 10.305473, lng: -124.011226},
        map: map
    });
}