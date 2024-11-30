// function myMap() {
//     var mapProp= {
//       center:new google.maps.LatLng(51.508742,-0.120850),
//       zoom:5,
//     };
//     var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
//     }
function initMap() {
  const directionsRenderer = new google.maps.DirectionsRenderer();
  const directionsService = new google.maps.DirectionsService();
  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 37.77, lng: -122.447 },
    zoom: 14,
  });

  directionsRenderer.setMap(map);
  calculateAndDisplayRoute(directionsService, directionsRenderer);
  document.getElementById("mode").addEventListener("change", () => {
    calculateAndDisplayRoute(directionsService, directionsRenderer);
  })

  
}

function calculateAndDisplayRoute(directionsService, directionsRenderer){
  const selectedMode = document.getElementById('mode').value;


  directionsService
  .route({
    origin: document.getElementById("from").value,
    destination: document.getElementById("to").value,


    travelMode: google.maps.TravelMode[selectedMode],

  })
   .then((response) => {
    directionsRenderer.render(response);
    })
    .catch((e)=> window.alert("Direction request Failed due to " + status));
   } 