@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">


                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Mobil Tugas</h5>
                    <small class="text-muted float-end"> <a href="{{ route('pemilikindex') }}"
                            class="btn btn-sm btn-outline-primary">
                            Back</a></small>
                </div>
                <form action="{{ route('mobilkuupdate', $mobilku->id_mobil) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label" for="merek">Merek</label>
                            <input type="text" class="form-control" id="merek" name="merek"
                                value="{{ $mobilku->merek }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="noplat">Plat Nomor</label>
                            <input type="text" class="form-control" name="noplat" id="noplat"
                                value="{{ $mobilku->noplat }}" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="harga">Harga sewa/hari</label>
                            <input type="number" class="form-control" name="harga" id="harga"
                                value="{{ $mobilku->harga }}" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Status</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="status"
                                aria-label="Default select example">
                                @if (isset($mobilku->status))
                                    @if ($mobilku->status == 1)
                                        <option value="{{ $mobilku->status }}" selected>Available</option>
                                    @else
                                        <option value="{{ $mobilku->status }}" selected>Rent</option>
                                    @endif
                                @endif
                                <option value="1">Available</option>
                                <option value="2">Rent</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
