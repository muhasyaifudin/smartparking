@extends('layouts.master')

@section('content')
<div id="page-wrapper" class="">

	<div class="row mb-4 align-items-center h-custom">
		<div class="panel panel-default h-custom">
			<div class="panel-heading text-center">
				<b class="text-info" style="font-size: 18px;">Tambah Tempat Parkir</b>
			</div>
			<div class="panel-body h-100">
				<div class="row h-100">
					<div class="col-md-6 col-md-offset-3 h-100">
						<form role="form" class="h-100" action="{{ url('parkinglot') }}" method="POST" id="form-tambah" enctype="multipart/form-data">
							@csrf
							
							<div class="form-group">
								<label>Nama Tempat</label>
								<input class="form-control" placeholder="Masukkan Nama Tempat" name="nama_tempat" data-validation="length alphanumeric required" data-validation-length="min4" data-validation-allowing=" " required="">
							</div>
							<div class="form-group">
								<label>Lokasi</label>
								<input class="form-control" placeholder="Masukkan Lokasi" name="lokasi" data-validation="length alphanumeric required" data-validation-length="min4" data-validation-allowing=" " required="">
							</div>
							<div class="row form-group">
								<div class="col-md-6">
									<label>Lat</label>
									<input class="form-control" placeholder="Lat" name="lat" id="latitude" type="text" readonly="" required="">
								</div>
								<div class="col-md-6">
									<label>Long</label>
									<input class="form-control" placeholder="Long" name="long" id="longitude" type="text" readonly="" required="">
								</div>
							</div>

							<div class="form-group h-25">
								<div id="map"></div>		

							</div>
							<div class="form-group">
								<label>Kapasistas</label>
								<input class="form-control" placeholder="Masukkan Kapasitas" name="kapasitas" type="number" data-validation="number" required="">
							</div>
							<div class="form-group">
								<label>Biaya</label>
								<input class="form-control" placeholder="Masukkan Biaya" name="biaya" type="number" data-validation="number" required="">
							</div>
							<div class="form-group">
								<label>Biaya Akumulasi</label>
								<input class="form-control" placeholder="Masukkan Biaya Akumulasi" name="biaya_akumulasi" type="number" data-validation="number" required="">
							</div>
							<div class="form-group">
								<label>ID Gerbang</label>
								<input class="form-control" placeholder="Masukkan ID Gerbang" name="gerbang" data-validation="alphanumeric" data-validation-allowing=":" required="">
							</div>
							
							<div class="text-center">
								<button type="submit" class="btn btn-primary w-15">Simpan</button>
								<button type="reset" class="btn btn-default w-15" >Batal</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>
<script>
	var map;
	var marker;

	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -7.747270, lng: 110.355382},
			zoom: 10
		});
		google.maps.event.addListener(map,'center_changed', function() {
			document.getElementById('latitude').value = map.getCenter().lat();
			document.getElementById('longitude').value = map.getCenter().lng();
		});
		$('<div/>').addClass('centerMarker').appendTo(map.getDiv())
             //do something onclick
             .click(function(){
             	var that=$(this);
             	if(!that.data('win')){
             		// that.data('win',new google.maps.InfoWindow({content:'this is the center'}));
             		that.data('win').bindTo('position',map,'center');
             	}
             	that.data('win').open(map);
             });

         }

     </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCo2wVO2b5WUczw0iQnWauo3j3sUswojoc&callback=initMap"
     async defer>

 </script>

 <script type="text/javascript">
 	$(document).ready(function(){
 		
 		$('#form').submit(function(e){
 			e.preventDefault();
 			$.ajax({
 				type:$(this).attr('method'),
 				url:$(this).attr('action'),
 				data:$(this).serialize(),
 				success:function(result) {
 					if (result == 1) {
 						swal({
 							title: "Berhasil",
 							text: "Data berhasil disimpan",
 							type: "success",
 							confirmButtonClass: "btn-primary",
 							confirmButtonText: "Lanjutkan",
 							closeOnConfirm: false,
 							closeOnCancel: false
 						},
 						function(isConfirm) {
 							if (isConfirm) {
 								window.location.href='index.php?page=tempat-parkir';
 							}
 						});
 					}
 					else{
 						swal("Gagal", "Data gagal disimpan", "error");

 					}

 				}
 			})
 		});

 		initMap();

 		$.validate({
 			lang: 'en'
 		});		

 		
 	});


 </script>
@endsection
