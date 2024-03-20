@section('title', __('Data Pesanan'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-receipt"></i>
							Data Pesanan </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search...">
						</div>
						<div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah Data
						</div>
					</div>
				</div>

				<div class="card-body">
						@include('livewire.pesanans.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Pelanggan Id</th>
								<th>Rumahsakit Id</th>
								<th>Supir Id</th>
								<th>Kategori Id</th>
								<th>Nama Pasien</th>
								<th>Alamat Jemput</th>
								<th>Longitude Jemput</th>
								<th>Latitude Jemput</th>
								<th>No Telp</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($pesanans as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->pelanggan_id }}</td>
								<td>{{ $row->rumahsakit_id }}</td>
								<td>{{ $row->supir_id }}</td>
								<td>{{ $row->kategori_id }}</td>
								<td>{{ $row->nama_pasien }}</td>
								<td>{{ $row->alamat_jemput }}</td>
								<td>{{ $row->longitude_jemput }}</td>
								<td>{{ $row->latitude_jemput }}</td>
								<td>{{ $row->no_telp }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Pesanan id {{$row->id}}? \nDeleted Pesanans cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>
										</ul>
									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>
							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $pesanans->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
