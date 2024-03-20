<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Pesanan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="pelanggan_id"></label>
                        <input wire:model="pelanggan_id" type="text" class="form-control" id="pelanggan_id" placeholder="Pelanggan Id">@error('pelanggan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rumahsakit_id"></label>
                        <input wire:model="rumahsakit_id" type="text" class="form-control" id="rumahsakit_id" placeholder="Rumahsakit Id">@error('rumahsakit_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="supir_id"></label>
                        <input wire:model="supir_id" type="text" class="form-control" id="supir_id" placeholder="Supir Id">@error('supir_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_id"></label>
                        <input wire:model="kategori_id" type="text" class="form-control" id="kategori_id" placeholder="Kategori Id">@error('kategori_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien"></label>
                        <input wire:model="nama_pasien" type="text" class="form-control" id="nama_pasien" placeholder="Nama Pasien">@error('nama_pasien') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_jemput"></label>
                        <input wire:model="alamat_jemput" type="text" class="form-control" id="alamat_jemput" placeholder="Alamat Jemput">@error('alamat_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude_jemput"></label>
                        <input wire:model="longitude_jemput" type="text" class="form-control" id="longitude_jemput" placeholder="Longitude Jemput">@error('longitude_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude_jemput"></label>
                        <input wire:model="latitude_jemput" type="text" class="form-control" id="latitude_jemput" placeholder="Latitude Jemput">@error('latitude_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp"></label>
                        <input wire:model="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telp">@error('no_telp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pesanan</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="pelanggan_id"></label>
                        <input wire:model="pelanggan_id" type="text" class="form-control" id="pelanggan_id" placeholder="Pelanggan Id">@error('pelanggan_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="rumahsakit_id"></label>
                        <input wire:model="rumahsakit_id" type="text" class="form-control" id="rumahsakit_id" placeholder="Rumahsakit Id">@error('rumahsakit_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="supir_id"></label>
                        <input wire:model="supir_id" type="text" class="form-control" id="supir_id" placeholder="Supir Id">@error('supir_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_id"></label>
                        <input wire:model="kategori_id" type="text" class="form-control" id="kategori_id" placeholder="Kategori Id">@error('kategori_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pasien"></label>
                        <input wire:model="nama_pasien" type="text" class="form-control" id="nama_pasien" placeholder="Nama Pasien">@error('nama_pasien') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_jemput"></label>
                        <input wire:model="alamat_jemput" type="text" class="form-control" id="alamat_jemput" placeholder="Alamat Jemput">@error('alamat_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude_jemput"></label>
                        <input wire:model="longitude_jemput" type="text" class="form-control" id="longitude_jemput" placeholder="Longitude Jemput">@error('longitude_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude_jemput"></label>
                        <input wire:model="latitude_jemput" type="text" class="form-control" id="latitude_jemput" placeholder="Latitude Jemput">@error('latitude_jemput') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp"></label>
                        <input wire:model="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telp">@error('no_telp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>
