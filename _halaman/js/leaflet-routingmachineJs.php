<link rel="stylesheet" href="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.css" />
<!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>

<script src="assets/js/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
 <script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>

    <script src="assets/js/leaflet-routing-machine/examples/Control.Geocoder.js"></script>
</script>

   <script type="text/javascript">
	

   	var map = L.map('mapid').setView([-6.326390714185883, 107.01553401061916], 16);

   	var LayerKita=L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
	});
	map.addLayer(LayerKita);
	L.marker([-6.326390714185883, 107.01553401061916]).addTo(map);

	// marker
	var myIcon = L.icon({
	    iconUrl: '<?=assets('icons/marker.png')?>',
	    iconSize: [38, 45],
	});
	<?php

	$db->join('t_hotspot b','a.id_smp=b.id_smp','LEFT');
	$getdata=$db->ObjectBuilder()->get('t_hotspot a');
	foreach ($getdata as $row) {
		?>
		L.marker([<?=$row->lat?>,<?=$row->lng?>],{icon: myIcon}).addTo(map)
				.bindPopup("<?=$row->nm_smp?><br>"+
							"Alamat : <?=$row->alamat?><br>"+
							"Akreditasi : <?=$row->akre?><br>"+
							"<button class='btn btn-info' onclick='return keSini(<?=$row->lat?>,<?=$row->lng?>)'>Ke Sini</button>");
		<?php
	}
	?>
	//rute

	var control = L.Routing.control({
	    waypoints: [
	        L.latLng(-6.326390714185883, 107.01553401061916),
	        
	    ],
	    geocoder: L.Control.Geocoder.nominatim(),
		routeWhileDragging: true,
		reverseWaypoints: true,
		showAlternatives: true,
		altLineOptions: {
			styles: [
				{color: 'black', opacity: 0.15, weight: 9},
				{color: 'white', opacity: 0.8, weight: 6},
				{color: 'blue', opacity: 0.5, weight: 2}
			]
		}
	})
	control.addTo(map);

	function keSini(lat,lng){
        var latLng=L.latLng(lat, lng);
		control.spliceWaypoints(control.getWaypoints().length - 1, 1, latLng);
	}
   </script>