@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
          @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione informazioni --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-image-fill text-warning"></i>
                            Ultimo tatuaggio: {{ $lastTattoo->title ?? 'Nessuno' }}
                        </span>
                        <a href="{{ route('tattoo.show', $lastTattoo->id ?? 0) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-eye-fill"></i> Visualizza
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-palette-fill text-warning"></i>
                            Ultimo stile: {{ $lastStyle->name ?? 'Nessuno' }}
                        </span>
                        <a href="{{ route('style.show', $lastStyle->id ?? 0) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-eye-fill"></i> Visualizza
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-person-fill text-warning"></i>
                            Ultimo artista: {{ $lastArtist->name ?? 'Nessuno' }}
                        </span>
                        <a href="{{ route('artist.show', $lastArtist->id ?? 0) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-eye-fill"></i> Visualizza
                        </a>
                    </li>
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-flag-fill text-warning"></i>
                            Gestisci le nazionalità: 
                        </span>
                        <a href="{{ route('nationality.index') }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-eye-fill"></i> Visualizza
                        </a>
                    </li>
                    
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-people-fill text-warning"></i>
                            Numero di tatuatori
                        </span>
                        <span class="badge bg-warning text-dark rounded-pill fs-6">{{ $artistsCount }}</span>
                    </li>
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-brush-fill text-warning"></i>
                            Numero di stili
                        </span>
                        <span class="badge bg-warning text-dark rounded-pill fs-6">{{ $stylesCount }}</span>
                    </li>
                    <li class="list-group-item bg-transparent text-white-50 d-flex justify-content-between align-items-center">
                        <span class="fw-semibold text-white">
                            <i class="bi bi-image-fill text-warning"></i>
                            Numero di tatuaggi
                        </span>
                        <span class="badge bg-warning text-dark rounded-pill fs-6">{{ $tattoosCount }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection