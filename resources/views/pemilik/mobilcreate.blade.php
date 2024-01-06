@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">


                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Tambah Tugas</h5>
                    <small class="text-muted float-end"> <a href="{{ route('pemilikindex') }}"
                            class="btn btn-sm btn-outline-primary">
                            Back</a></small>
                </div>
                <form action="{{ route('mobilkustore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="Merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek"
                                placeholder="Honda, Toyota, Daihatsu.." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="noplat">Plat Nomor</label>
                            <input type="text" class="form-control" name="noplat" id="noplat" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga">Harga sewa/hari</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="" />
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
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
