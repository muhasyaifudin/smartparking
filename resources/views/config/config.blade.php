@extends('layouts.master')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="page-header h2">Config</div>
		</div>

	</div>	
	<div class="row h-100">
		<div class="col-md-4">
			<form role="form" action="{{ url('config') }}" method="POST" id="form-config" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label>Batas Waktu Transfer</label>
					<input class="form-control" type="number" name="batas_transfer" required="" data-validation="number">
					<p class="help-block">Batas waktu transfer dalam hitungan Jam</p>
				</div>
				<div class="form-group">
					<label>Minimal Saldo</label>
					<input class="form-control" type="number" name="minimal_saldo" required="" data-validation="number">
					<p class="help-block">Mininal saldo dalam Rupiah</p>
				</div>
				<button type="submit" class="btn btn-success">Simpan</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		setConfig();

		$('#formex').submit(function(e){
			e.preventDefault();
			$.ajax({
				type:$(this).attr('method'),
				url:$(this).attr('action'),
				data:$(this).serialize(),
				success:function(result) {
					alert
					if (result == '1') {
						swal({
							title: "Berhasil",
							text: "Config berhasil disimpan",
							type: "success",
							confirmButtonClass: "btn-primary",
							confirmButtonText: "OK",
							closeOnConfirm: false,
							closeOnCancel: false
						},
						function(isConfirm) {
							if (isConfirm) {
								window.location.href='index.php?page=config';
							}
						});
					}
					else{
						swal("Gagal", "Config gagal disimpan", "error");

					}

				}
			})
			
		});

		$.validate({
			lang:'en'
		});
	})

	function setConfig(){
		var data = @json($config);

		$('[name=batas_transfer]').val(data.batas_transfer);
		$('[name=minimal_saldo]').val(data.minimal_saldo);
		
	}
</script>
@endsection