@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-dark text-light my-5">

            <div class="row row-cols-1 row-cols-lg-2 g-0 h-100 justify-content-md-center align-items-md-center">

                {{-- COLONNA IMMAGINE --}}
                <div class="col p-3 d-flex justify-content-center align-items-center w-md-50">
                    <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ $tattoo->title }}"
                        class="img-fluid  object-fit-fill rounded-3">
                </div>

                {{-- COLONNA DETTAGLI --}}
                <div class="col d-flex">

                    <div class="card-body d-flex flex-column">

                        <h1 class="text-warning fw-bold mb-2 h3">{{ $tattoo->title }}</h1>
                        <div class="d-flex flex-wrap gap-3 pb-3 border-bottom border-warning border-opacity-25">
                            <small class="text-white-50">
                                <i class="bi bi-calendar-event text-warning"></i>
                                Aggiunto il {{ $tattoo->created_at->format('d/m/Y') }}
                            </small>
                            <small class="text-white-50">
                                <i class="bi bi-person-fill text-warning"></i>
                                Artista: {{ $tattoo->artist->name . ' ' . $tattoo->artist->surname }}
                            </small>
                        </div>

                        
                        <div class="pb-3 my-3 border-bottom border-warning border-opacity-25">
                            <h6 class="text-uppercase text-warning small fw-bold mb-2">Descrizione</h6>
                            <p class="card-text text-white-50 mb-0">{{ $tattoo->description ?? 'Questo tatuaggio non ha ancora una descrizione' }}</p>
                        </div>

                        
                        <div class="mt-3">
                            <h6 class="text-uppercase text-warning small fw-bold mb-2">Dettagli</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent text-white-50 px-0 d-flex justify-content-between">
                                    <span class="fw-semibold text-white">
                                        <i class="bi bi-palette-fill text-warning"></i>
                                         Stili
                                    </span>
                                    <span>{{ $tattoo->style->name ?? 'N/A' }}</span>
                                </li>
                                <li class="list-group-item bg-transparent text-white-50 px-0 d-flex justify-content-between">
                                    <span class="fw-semibold text-white">
                                        <i class="bi bi-clock-fill text-warning"></i>
                                         Tempo di realizzazione
                                    </span>
                                    <span>{{ $tattoo->time ?? 'N/A' }} minuti</span>
                                </li>
                                <li class="list-group-item bg-transparent text-warning px-0 d-flex justify-content-between fs-5 fw-bold">
                                    <span>Prezzo</span>
                                    <span>€{{ $tattoo->price }}</span>
                                </li>
                            </ul>
                        </div>

                        
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ route('tattoo.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Torna indietro
                            </a>
                            <a href="{{ route('tattoo.edit', $tattoo->id) }}" class="btn btn-warning">
                                <i class="bi bi-pen-fill"></i> Modifica
                            </a>
                            <form action="{{ route('tattoo.destroy', $tattoo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Sei sicuro di voler eliminare questo tatuaggio?')">
                                    <i class="bi bi-trash-fill"></i> Elimina
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
