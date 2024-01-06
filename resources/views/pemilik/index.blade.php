@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Welcome back, {{ Auth::user()->name }} !</h5>
                            <p class="mb-4">
                                Have a <span class="fw-bold">nice</span> day
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="card">
        <h5 class="card-header">Daftar Mobilku</h5>
        @include('layout.notif')
        <div class="row text-end">
            <div class="col-sm-12 text-end">
                <a href="{{ route('mobilkucreate') }}" class="btn btn-sm btn-primary float-right mb-3 me-3">+ Tambah
                    Mobil</a>
            </div>
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Merek</th>
                        <th>Plat Nomor</th>
                        <th>Harga Sewa / Hari</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($mobilku as $mbl)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $mbl->merek }}</strong>
                            </td>
                            <td>{{ $mbl->noplat }}</td>
                            <td>{{ 'Rp ' . number_format($mbl->harga, 0, ',', '.') }}</td>
                            <td>
                                @if ($mbl->status == 1)
                                    <span class="badge bg-label-primary me-1">Available</span>
                                @else
                                    <span class="badge bg-label-warning me-1">Rent</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <form onsubmit="return confirm('Anda yakin ingin menghapus tugas ini  ?');"
                                            action="{{ route('mobilkudestroy', $mbl->id_mobil) }}" method="POST">
                                            <a class="dropdown-item" href="{{ route('mobilkuedit', $mbl->id_mobil) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" type="button"><i
                                                    class="bx bx-trash me-1"></i>Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
