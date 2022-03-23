let map;
function initMap() {
  const philip = {lat:-10.3157,lng:123.8854};
  map = new google.maps.Map(document.getElementById("map"), {
    center: philip,
    zoom: 5,  
  }); 
  const marker = new google.maps.Marker({
    position: {lat:-10.2661822, lng:123.997295},
    map:map
  });

}