//Cargando nuestro mapa


let myMap = L.map('myMap').setView([-1.67435, -78.6483], 13);



L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {

     maxZoom: 18,
}).addTo(myMap);

let iconMarker = L.icon({
  iconUrl:'assets/images/marker1.png',
  iconSize:[60, 60],
  iconAnchor:[30, 60]
})

let marker2 = L.marker([51.51, -0.09], {icon: iconMarker}).addTo(myMap)

myMap.doubleClickZoom.disable()
myMap.on('dblclick', e=> {
  let latLng = myMap.mouseEventToLatLng(e.originalEvent);

  L.marker([latLng.lat, latLng.lng], { icon: iconMarker}).addTo(myMap)
  var direccion;

  $.ajax({
    url:"https://nominatim.openstreetmap.org/reverse",
    data:{
      lat:latLng.lat,
      lon:latLng.lng,
      format:"json"
    },
    beforeSend: function(xhr){
      xhr.setRequestHeader(
        'User-Agent',
         'ID of your APP/service/website/etc. v0.1'
      )
    },
    dataType:"json",
    type:"GET",
    async:true,
    crossDomain:true
  }).done(function(res){
    console.log(res.address["road"])
    document.getElementById('dirc').value=res.address["road"];
  }).fail(function(error){
    console.error(error)
  })

  document.getElementById('lat').value=latLng.lat;
  document.getElementById('lng').value=latLng.lng;
  
  


})



