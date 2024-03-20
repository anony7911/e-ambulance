@section('title', __('Data Rumah Sakit'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-hospital"></i>
							Data Rumah Sakit </h4>
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
						@include('livewire.rumahsakits.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td>
								<th>Nama</th>
								<th>Alamat</th>
								<th>No Telp</th>
								<th>Longitude</th>
								<th>Latitude</th>
								<th>Province Id</th>
								<th>Regency Id</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($rumahsakits as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nama }}</td>
								<td>{{ $row->alamat }}</td>
								<td>{{ $row->no_telp }}</td>
								<td>{{ $row->longitude }}</td>
								<td>{{ $row->latitude }}</td>
								<td>{{ $row->province_id }}</td>
								<td>{{ $row->regency_id }}</td>
								<td width="90">
									<div class="dropdown">
										<a class="btn btn-sm btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Actions
										</a>
										<ul class="dropdown-menu">
											<li><a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="dropdown-item" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a></li>
											<li><a class="dropdown-item" onclick="confirm('Confirm Delete Rumahsakit id {{$row->id}}? \nDeleted Rumahsakits cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>
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
					<div class="float-end">{{ $rumahsakits->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
