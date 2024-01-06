@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">


                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Return Mobil</h5>
                    <small class="text-muted float-end"> <a href="{{ route('sewaindex') }}"
                            class="btn btn-sm btn-outline-primary">
                            Back</a></small>
                </div>
                <form action="{{ route('sewakureturn', $sewaku->id_sewa) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label" for="id_mobil">id_mobil</label>
                            <input type="text" class="form-control" id="id_mobil" name="id_mobil"
                                value="{{ $sewaku->id_mobil }}" hidden />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek"
                                value="{{ $sewaku->merek }}" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="noplat">Plat Nomor</label>
                            <input type="text" class="form-control" name="noplat" id="noplat"
                                value="{{ $sewaku->noplat }}" readonly />
                        </div>

                        @php
                            $tanggalAwal = new DateTime($sewaku->tanggal_mulai_sewa);
                            $tanggalAkhir = new DateTime($sewaku->tanggal_akhir_sewa);

                            $selisih = $tanggalAwal->diff($tanggalAkhir)->days;

                        @endphp


                        <div class="mb-3">
                            <label class="form-label" for="harga">Total Harga Rental</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                value="{{ $selisih * $sewaku->harga }}" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_pengembalian">Tanggal Return</label>
                            <input type="date" class="form-control" name="tanggal_pengembalian" id="tanggal_pengembalian"
                                value="" />
                        </div>

                        <button type="submit" class="btn btn-primary">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
