@extends('layouts.app')

@section('content')
    <div class="container">
        

        <div class="card bg-dark text-light my-5">
            <div class="card-body d-flex flex-column">

                {{-- Sezione dettaglio artista --}}
                <h1 class="text-warning fw-bold mb-2 h3">{{ $artist->name }} {{ $artist->surname }}</h1>
                <div class="d-flex flex-wrap gap-3 pb-3 border-bottom border-warning border-opacity-25">
                    <small class="text-white-50">
                        <i class="bi bi-person-badge-fill text-warning"></i>
                        Età: {{ $artist->age }}
                    </small>
                    <small class="text-white-50">
                        <i class="bi bi-globe-americas text-warning"></i>
                        Nazionalità: {{ $artist->nationality->name }}
                    </small>
                </div>

                
                <div class="pb-3 my-3 border-bottom border-warning border-opacity-25">
                    <h6 class="text-uppercase text-warning small fw-bold mb-2">Biografia</h6>
                    <p class="card-text text-white-50 mb-0">{{ $artist->bio }}</p>
                </div>

                {{-- Sezione azioni --}}
                <div class="d-flex gap-2 mt-3">
                    
                    
                    <a href="{{ route('artist.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Torna indietro
                    </a>
                    <a href="{{ route('artist.edit', $artist->id) }}" class="btn btn-warning">
                        <i class="bi bi-pen-fill"></i> Modifica
                    </a>
                    <form action="{{ route('artist.destroy', $artist->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Sei sicuro di voler eliminare questo artista?')">
                            <i class="bi bi-trash-fill"></i> Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
