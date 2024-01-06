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

    <!-- Horizontal -->
    <h5 class="pb-1 mb-4">Horizontal</h5>
    <div class="row mb-5 ">
        @foreach ($mobil as $mbl)
            <div class="card mx-1 my-4 row-gap-3" style="width: 18rem;">
                <img src="../assets/img/elements/avanza.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $mbl->merek }}</h5>
                    <p class="card-text">{{ 'Rp ' . number_format($mbl->harga, 0, ',', '.') }}</p>
                    <p class="card-text"><small class="text-muted">
                            @if ($mbl->status == 1)
                                <span class="badge bg-label-primary me-1">Available</span>
                            @else
                                <span class="badge bg-label-warning me-1">Rented</span>
                            @endif
                        </small></p>
                    @if ($mbl->status == 1)
                        <a type="button" href="{{ route('sewacreate', $mbl->id_mobil) }}"><button type="submit"
                                class="btn btn-sm btn-primary">Rent</button></a>
                    @else
                        <button type="button" class="btn btn-sm btn-primary" disabled>Rent</button>
                    @endif
                </div>
            </div>

            {{-- <div class="col-md ">
                <div class="card  mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img class="card-img mt-4 card-img-left" src="../assets/img/elements/avanza.png"
                                alt="Card image" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $mbl->merek }}</h5>
                                <p class="card-text">
                                    {{ 'Rp ' . number_format($mbl->harga, 0, ',', '.') }}
                                </p>
                                <p class="card-text"><small class="text-muted">
                                        @if ($mbl->status == 1)
                                            <span class="badge bg-label-primary me-1">Available</span>
                                        @else
                                            <span class="badge bg-label-warning me-1">Rented</span>
                                        @endif
                                    </small></p>
                                @if ($mbl->status == 1)
                                    <button type="submit" class="btn btn-sm btn-primary">Rent</button>
                                @else
                                    <button type="button" class="btn btn-sm btn-primary" disabled>Rent</button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        @endforeach
    </div>
    <!--/ Horizontal -->
@endsection
