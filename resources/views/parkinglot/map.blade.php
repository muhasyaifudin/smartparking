@extends('layouts.master')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Maps Parkir</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row h-100">
		<div id="map" class="h-75" >
		</div>
	</div>
</div>

<script>
	var map;
	var markers = [];
	var activeInfoWindow;
	var state = 0;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -7.789451321430982, lng: 110.37460807421871},
			zoom: 12
		});
		state = {{ $state }};
		console.log('state '+state);	

		setMarker();

	}
	function addMarker(_lat, _lon, _nama, _lokasi, _kapasitas){
		var myLatLng = {lat: _lat, lng: _lon};
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: _nama
		});
		var contentString = '<div id="content"><h3 id="firstHeading" class="firstHeading">'+_nama+'</h3><div id="bodyContent"><p><b>Lokasi : </b>'+_lokasi+'</p><p><b>Kapasitas : </b>'+_kapasitas+' Kendaraan</p></div></div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString,
			maxWidth:300
		});

		marker.addListener('click', function() {
			if (activeInfoWindow) { activeInfoWindow.close();}
			infowindow.open(map, marker);
			activeInfoWindow = infowindow;
		});

		if (state == 2) {
			infowindow.open(map, marker);
		}
	}

	function setMarker(){
		var marker = @json($maps);
		
		if (state == 1) {
			var i = 0;
			for (i = 0; i < marker.length; i++) {
				var lat =marker[i].lat;
				var lon= marker[i].lon;

				addMarker(parseFloat(lat), parseFloat(lon), marker[i].nama_tempat, marker[i].lokasi, marker[i].kapasitas);
			}
		}
		else if (state == 2){
			addMarker(parseFloat(marker.lat), parseFloat(marker.lon), marker.nama_tempat, marker.lokasi, marker.kapasitas);
		}
		else{

		}		
	}
	function locate(_lat, _lon) {
		map.setCenter({lat: _lat, lng: _lon});
		map.setZoom(15);
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo2wVO2b5WUczw0iQnWauo3j3sUswojoc&callback=initMap"
async defer>

</script>

<script type="text/javascript">
	$(document).ready(function(){

	})
</script>
@endsection
