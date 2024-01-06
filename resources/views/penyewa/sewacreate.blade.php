@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sewa Mobil</h5>

                </div>
                <form action="{{ route('sewastore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card mx-4 my-4 row-gap-3" style="width: 18rem;">
                        <img src="../assets/img/elements/avanza.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $mobil->merek }}</h5>
                            <input type="text" class="form-control" id="id_mobil" name="id_mobil"
                                value="{{ $mobil->id_mobil }}" hidden />
                            <p class="card-text">{{ 'Rp ' . number_format($mobil->harga, 0, ',', '.') }}/hari</p>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="id_user"></label>
                            <input type="text" class="form-control" id="id_user" name="id_user"
                                value="{{ Auth::user()->id }}" hidden />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_mulai_sewa">Tanggal Mulai Sewa</label>
                            <input type="date" class="form-control" name="tanggal_mulai_sewa" id="tanggal_mulai_sewa"
                                placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="tanggal_akhir_sewa">Tanggal Akhir Sewa</label>
                            <input type="date" class="form-control" name="tanggal_akhir_sewa" id="tanggal_akhir_sewa"
                                placeholder="" />
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Deskripsi</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" placeholder="Deskripsi Tugas"></textarea>
                        </div> --}}
                        {{-- <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Upload Tugas</label>
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="file" name="file" id="file" />
                            </div>
                            <div class="form-text">ekstensi file : pdf, jpg, jpeg, png, doc</div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Rental</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
