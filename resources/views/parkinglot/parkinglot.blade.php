
@extends('layouts.master')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Lokasi Parkir</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row h-100 mt-4">
		<div id="map" class="h-75" hidden="">
		</div>
		<div id="tabel_parkir">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-10">
								<a href="{{ url('lot/map') }}" class="btn btn-primary"><span class="fa fa-link"></span> Tampilkan Maps</a>
							</div>
							<div class="col-md-2">
								<div class="float-right">
									<a href="{{ url('parkinglot/create') }}" class="btn btn-success"><span class="fa fa-plus"></span> Tambah Lokasi</a>
								</div>
							</div>
						</div>
					</div>
					<!-- /.panel-heading -->
					<div class="panel-body">
						<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>ID</th>
									<th>Nama Tempat</th>
									<th>Lokasi</th>
									<th>Kapasitas</th>
									<th>Biaya</th>
									<th>Status</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($parkinglots as $parkinglot)
								<tr class="odd gradeX">
									<td class="text-center">{{ $parkinglot->id }}</td>
									<td>{{ $parkinglot->nama_tempat }}</td>
									<td>{{ $parkinglot->lokasi }}</td>
									<td class="text-right">
										{{ $parkinglot->kapasitas }}
									</td>
									<td class="text-right">
										{{ $parkinglot->biaya }}
									</td>
									<td class="text-center">
										@if ($parkinglot->status == 1)
										Aktif
										@else
										Tidak Aktif	
										@endif
									</td>
									<td class="text-center">
										<a href="{{ url('parkinglot/'.$parkinglot->id.'/edit') }}" class="btn btn-primary" title="Edit"><span class="fa fa-edit"></span></a>
										
										@if ($parkinglot->status == 1)
										<a href="" class="btn btn-danger nonaktifTempat" title="Non-aktifkan" id_lot = "{{ $parkinglot->id }}"><span class="fa fa-times"></span></a>

										@else
										<a href="" class="btn btn-success aktifkanTempat" title="Aktifkan" id_lot = "{{ $parkinglot->id }}"><span class="fa fa-check"></span></a>
										@endif				
										
										<a href="" class="btn btn-primary showLoc" title="Lokasi" id_lot = "{{ $parkinglot->id }}"><span class="fa fa-location-arrow"></span></a>
									</td>								

								</tr>
								@endforeach


							</tbody>
						</table>
						<!-- /.table-responsive -->
						<form hidden="" id="formNonaktif" method="POST" enctype="multipart/form-data" action="{{ url('parkinglot/nonaktifkan') }}">
							@csrf
							<input type="hidden" name="id" value="{{ $parkinglot->id }}">												
						</form>
						<form hidden="" id="formAktif" method="POST" enctype="multipart/form-data" action="{{ url('parkinglot/aktifkan') }}">
							@csrf
							<input type="hidden" name="id" value="{{ $parkinglot->id }}">												
						</form>
						<form hidden="" id="formMap" method="POST" enctype="multipart/form-data" action="{{ url('lot/map') }}">
							@csrf
							<input type="hidden" name="id" value="{{ $parkinglot->id }}">												
						</form>

					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('.nonaktifTempat').click(function(e){
			e.preventDefault();
			var id_lot = this.getAttribute('id_lot');
			$('[name=id]').val(id_lot);

			swal({
				title: "Peringatan",
				text: "Non-aktifkan Tempat Parkir",
				type: "warning",
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Non-aktifkan",
				showCancelButton:true,
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {
					$("#formNonaktif").submit();
				}
			});
			
		});
		
		$('.aktifkanTempat').click(function(e){
			e.preventDefault();
			var id_lot = this.getAttribute('id_lot');
			$('[name=id]').val(id_lot);
			swal({
				title: "Peringatan",
				text: "Aktifkan Tempat Parkir",
				type: "warning",
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Aktifkan",
				showCancelButton:true,
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {
					$("#formAktif").submit();
				}
			});
			
		});

		$('.showLoc').click(function(e){
			e.preventDefault();
			var id_lot = this.getAttribute('id_lot');
			$('[name=id]').val(id_lot);
			$("#formMap").submit();
		});

	})
</script>
@endsection
