<!DOCTYPE html>
<html>
<head>

   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
   <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin="">
   </script>

   <style type="text/css">
    #mapid { height: 450px;}
   </style>

  <title>Leaflet Map Demo</title>
</head>
<body>
 <div id="mapid"></div>
</body>
<script type="text/javascript">
  var mymap = L.map('mapid').setView([-0.58, 37.7], 6.5);
  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiYWxsYW52aWtpcnUiLCJhIjoiY2p2aTd0cjc4MDJ4eDRicnRoMmM2OTVhMyJ9.Wi7T21jnlgzeRloqDBzduQ'
}).addTo(mymap);
  
  //markers
  var nairobi = L.marker([-1.2832533,36.8172449]).addTo(mymap);
  
  var magadi = L.marker([-1.90049,36.28679999999997]).addTo(mymap);
  magadi.bindPopup("<b>Magadi</b><br>Distributor available.").openPopup();
  var narok = L.marker([-1.08901,35.868799999999965]).addTo(mymap);
  narok.bindPopup("<b>Narok</b><br>Distributor available.").openPopup();
  var machakos = L.marker([-1.52125,37.26610000000005]).addTo(mymap);
  machakos.bindPopup("<b>Machakos</b><br>Distributor available.").openPopup();
  var mtitoandei = L.marker([-2.68932,38.16820000000007]).addTo(mymap);
  mtitoandei.bindPopup("<b>Mtito Andei</b><br>Distributor available.").openPopup();
  var voi = L.marker([-3.3954568,38.5880588]).addTo(mymap);
  voi.bindPopup("<b>Voi</b><br>Distributor available.").openPopup();
  var mombasa = L.marker([-4.0390146,39.648391]).addTo(mymap);
  mombasa.bindPopup("<b>Mombasa</b><br>Distributor available.").openPopup();
  var garissa = L.marker([-0.45671,39.640499999999974]).addTo(mymap);
  garissa.bindPopup("<b>Garissa</b><br>Distributor available.").openPopup();
  var mwingi = L.marker([-0.9333,38.066599999999994]).addTo(mymap);
  mwingi.bindPopup("<b>Mwingi</b><br>Distributor available.").openPopup();
  var bomet = L.marker([-0.7184578,35.2391248]).addTo(mymap);
  bomet.bindPopup("<b>Bomet</b><br>Distributor available.").openPopup();
  var isiolo = L.marker([ 0.35,37.58330000000001]).addTo(mymap);
  isiolo.bindPopup("<b>Isiolo</b><br>Distributor available.").openPopup();
  var meru = L.marker([0.0500034,37.64999999999998]).addTo(mymap);
  meru.bindPopup("<b>Meru</b><br>Distributor available.").openPopup();
  var embu = L.marker([-0.53767,37.45839999999998]).addTo(mymap);
  embu.bindPopup("<b>Embu</b><br>Distributor available.").openPopup();
  var nanyuki = L.marker([0.01403,37.07460000000003]).addTo(mymap);
  nanyuki.bindPopup("<b>Nanyuki</b><br>Distributor available.").openPopup();
  var nyeri = L.marker([-0.419296,36.95170000000007]).addTo(mymap);
  nyeri.bindPopup("<b>Nyeri</b><br>Distributor available.").openPopup();
  var nakuru = L.marker([-0.2833,36.066599999999994]).addTo(mymap);
  nakuru.bindPopup("<b>Nakuru</b><br>Distributor available.").openPopup();
  var nyahururu = L.marker([0.0333,36.36660000000006]).addTo(mymap);
  nyahururu.bindPopup("<b>Nyahururu</b><br>Distributor available.").openPopup();
  var thika = L.marker([-1.036648,37.077523]).addTo(mymap);
  thika.bindPopup("<b>Thika</b><br>Distributor available.").openPopup();
  var kabarnet = L.marker([ 0.496524,35.743139]).addTo(mymap);
  kabarnet.bindPopup("<b>Kabarnet</b><br>Distributor available.").openPopup();

  var malindi = L.marker([-3.2166,40.11660000000006]).addTo(mymap);
  malindi.bindPopup("<b>Malindi</b><br>Distributor not yet available.").openPopup();
  var lamu = L.marker([-2.270329,40.9002732]).addTo(mymap);
  lamu.bindPopup("<b>Lamu</b><br>Distributor not yet available.")
  var garsen = L.marker([-2.26774,40.11079999999993]).addTo(mymap);
  garsen.bindPopup("<b>Garsen</b><br>Distributor not yet available.")
  var madogashi = L.marker([0.7333,39.16660000000002]).addTo(mymap);
  madogashi.bindPopup("<b>Mado Gashi</b><br>Distributor not yet available.")
  var kisumu = L.marker([-0.1029109,34.7541761]).addTo(mymap);
  kisumu.bindPopup("<b>Kisumu</b><br>Distributor not yet available.")
  var sabatia = L.marker([0.229582,34.52430000000004]).addTo(mymap);
  sabatia.bindPopup("<b>Sabatia</b><br>Distributor not yet available.")
  var kitale = L.marker([1.01808,35.00019999999995]).addTo(mymap);
  kitale.bindPopup("<b>Kitale</b><br>Distributor not yet available.")
  var eldoret = L.marker([0.519833,35.27150000000006]).addTo(mymap);
  eldoret.bindPopup("<b>Eldoret</b><br>Distributor not yet available.")
  
  //using nairobi as the welcome popup
  nairobi.bindPopup("<b>Nairobi</b><br>Distributor available.").openPopup();

</script>
</html>