<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" /> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/global/plugins/leafletmarkers/css/leaflet.extra-markers.min.css');?>">
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="<?php echo base_url('assets/global/plugins/leafletmarkers/js/leaflet.extra-markers.min.js');?>"></script>
<style type="text/css">
    .leaflet-popup-content{
        width: 199px;
    }
</style>
 <?php echo $map['js']; ?>
<div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="<?php echo site_url('home/home');?>">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Home</span>
            </li>
        </ul>
    </div>
    <div class="row">
        <div id="map">
            <?php echo $map['html']; ?>
        </div>
    </div>
    <script type="text/javascript">
  // var map = new L.map('map').setView([-6.268036, 106.797111], 16);
    // Creates a red marker with the coffee icon
  // var redMarker = L.ExtraMarkers.icon({
  //   icon: 'fa-coffee',
  //   markerColor: 'red',
  //   shape: 'square',
  //   prefix: 'fa'
  // });

  // L.marker([-6.268036,106.797111], {icon: redMarker}).addTo(map);
</script>
<div class="clearfix"></div>