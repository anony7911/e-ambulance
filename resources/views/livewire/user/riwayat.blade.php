<div>
    @section('title', __('Riwayat'))
    <!-- Contact 1 - Bootstrap Brain Component -->
    <section class="bg-light py-3 py-md-5">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center">Riwayat</h2>
                    <p class="text-secondary mb-5 text-center">
                        Berikut riwayat pemesanan Anda pada e-ambulance - SIP Puskesmas Tanggetada.
                    </p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-lg-center">
                <div class="col-12 col-lg-12">
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#tambahModal">
                        <i class="fas fa-bell"></i> Pesan Ambulance
                    </button>
                </div>
                    @forelse($pesanans->sortByDesc('created_at') as $row)
                    <div class="bg-white border rounded shadow-sm overflow-hidden mb-2">
                        <div class="px-3 py-3 pt-3 pb-0 d-flex justify-content-between">
                            <h6 class="card-subtitle mb-2 text-muted">
                                <span class="badge rounded-pill" style="background-color: {{ $row->kategori->warna }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $row->kategori->keterangan }}">{{ $row->kategori->nama }}</span>
                            </h6>
                            <h6 class="card-subtitle text-muted">
                                <span class="badge rounded-pill bg-dark text-light">{{ Carbon\Carbon::parse($row->created_at)->isoFormat('dddd, D MMMM Y') }}</span>
                            </h6>
                        </div>
                        <div class="px-3 py-3 pt-0 pb-0 d-flex justify-content-between">

                            <div class="d-flex align-items-center">
                                <i class="fas fa-map-marker-alt fa-xs me-1"></i>
                                <p class="card-text mb-0 text-truncate" >{{ Str::limit($row->alamat_jemput, 50) }}</p>
                                <i class="fas fa-arrow-right fa-xs ms-1 me-1"></i>
                                <p class="card-text text-truncate" >{{ Str::limit($row->rumahsakit->nama, 50) }}</p>
                            </div>
                            {{-- button detail --}}
                        </div>
                        <div class="px-3 py-3 pt-0 d-flex justify-content-end">
                            <a class="" href="#">
                                Lihat detail ...
                            </a>
                        </div>
                    </div>

                    @empty
                    <div class="bg-white border rounded shadow-sm overflow-hidden alert alert-warning">
                        Belum ada riwayat pemesanan.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
