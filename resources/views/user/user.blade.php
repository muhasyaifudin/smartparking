@extends('layouts.master')

@section('title')
Users
@endsection

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Users</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-3">
							<select class="form-control form-control-sm" id="select_data">
								<option value="1">User Aktif</option>
								<option value="0">User Tidak Aktif</option>

							</select>
						</div>
					</div>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama Lengkap</th>
								<th>Email</th>
								<th>Telepon</th>
								<th>Balance</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->nama_lengkap }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->telepon }}</td>
								<td>{{ $user->balance }}</td>
								<td class="text-center">
									@if ($user->status==1)
									Aktif
									@else
									Tidak Aktif
									@endif
								</td>
								<td class="text-center">
									@if ($user->status == 1)
									<a href="" class="btn btn-danger banned" id_user = "{{ $user->id }}" title="Banned"><span class="fa fa-ban"></span></a>
									@else
									<a href="" class="btn btn-success unbanned" title="unbanned" id_user = "{{ $user->id }}"><span class="fa fa-check"></span></a>

									@endif

									
								</td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
					<!-- /.table-responsive -->
					<form hidden="" id="formBan" method="POST" enctype="multipart/form-data" action="{{ url('user/ban') }}">
						@csrf
						<input type="hidden" name="id" value="{{ $user->id }}">	
					</form>

				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('.banned').click(function(e){
			e.preventDefault();
			var id = this.getAttribute('id_user');
			$('[name=id]').val(id);

			swal({
				title: "Peringatan",
				text: "Banned User?",
				type: "warning",
				confirmButtonClass: "btn-primary",
				confirmButtonText: "Banned",
				showCancelButton:true,
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm) {
				if (isConfirm) {
					$("#formBan").submit();
					
				}
			});
			
		});

		$('.unbanned').click(function(e){
			e.preventDefault();
			var id = this.getAttribute('id_user');
			$('[name=id]').val(id);
			$("#formBan").submit();

		});
		$('#dataTables-example').DataTable({
			responsive: true
		});
	})
</script>

@endsection