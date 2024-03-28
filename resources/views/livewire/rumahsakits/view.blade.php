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
								<th>Call Center</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($rumahsakits as $row)
							<tr class="align-center">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->nama }}</td>
								<td class="text-nowrap">
                                <a href="https://www.google.com/maps/search/?api=1&query={{ $row->latitude }},{{ $row->longitude }}" target="_blank"  data-bs-toggle="tooltip" data-bs-placement="top" title="Show on Google Maps">
                                    {{ $row->alamat }} <br>
                                    {{ $row->regency->name }}, {{ $row->province->name }}
                                </a>
                                </td>
								<td>
                                    <a href="tel:{{ $row->no_telp }}" target="_blank"  data-bs-toggle="tooltip" data-bs-placement="top" title="Telepon" class="btn btn-success btn-sm">
                                    {{ $row->no_telp }}
                                    </a>
                                </td>
								<td width="90">
                                    <a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-sm btn-primary" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a>
                                    <a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Rumah sakit id {{$row->id}}? \nDeleted Rumahsakits cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a>
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
