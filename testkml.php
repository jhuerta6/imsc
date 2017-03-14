<div id="map_canvas"></div>

<style>
   #map_canvas {
    margin-left: auto;
    margin-right: auto;
    padding: 0;
    width: 600px;
    height: 400px;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCY0B3_Fr1vRpgJDdbvNmrVyXmoOOtiq64&callback=initialize"></script>
<script>
  var mylocation = {
    'latitude':  47.66,
    'longitude': -122.355
  };
  var map;
  function initialize() {
    var myLatlng = new google.maps.LatLng( mylocation.latitude, mylocation.longitude );
    var mapOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
    // This needs to be the Full URL - not a relative URL
    var kmlPath = "http://web-apprentice-demo.craic.com/assets/maps/fremont.kml"; //og: http://web-apprentice-demo.craic.com/assets/maps/fremont.km
    // Add unique number to this url - as with images - to avoid caching issues during development
    //og: https://doc-04-20-docs.googleusercontent.com/docs/securesc/np0525du9ebvm8i97hojbopo85coiqgo/m3chdeu20aco2aho4o7kqihucid6l02q/1489456800000/11923168389958881286/11923168389958881286/0B7DSGxbE8dQTTktEb3NLM2xvQjQ?e=download&nonce=je1g0ilv8fo1u&user=11923168389958881286&hash=3h7ddgipl6nloeb399f4ndu7ij7plhaf
    //chicago: https://doc-10-20-docs.googleusercontent.com/docs/securesc/np0525du9ebvm8i97hojbopo85coiqgo/qm7vrcrnqljh3skuqn0e2eam8if9gi32/1489492800000/11923168389958881286/11923168389958881286/0B7DSGxbE8dQTb1lwV2ppdWdmYWs?e=download
    //found in the kml file from the kmz: http://casoilresource.lawr.ucdavis.edu/soil_web/kml/mapunits.kml
    //el paso markers:
    var urlSuffix = (new Date).getTime().toString();
    var layer = new google.maps.KmlLayer(kmlPath + '?' + urlSuffix );
    layer.setMap(map);
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
