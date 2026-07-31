@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="card bg-dark text-light my-5">
            <div class="card-body d-flex flex-column">
                <h1 class="text-warning fw-bold mb-2 h3">{{ $nationality->name }}</h1>
                <small class="text-white-50">
                        <i class="bi bi-calendar-event text-warning"></i>
                        Aggiunto il {{ $nationality->created_at->format('d/m/Y') }}
                    </small>
                
                {{-- Sezione azioni --}}
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('nationality.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Torna indietro
                    </a>
                    <a href="{{ route('nationality.edit', $nationality->id) }}" class="btn btn-warning">
                        <i class="bi bi-pen-fill"></i> Modifica
                    </a>
                    <form action="{{ route('nationality.destroy', $nationality->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Sei sicuro di voler eliminare questa nazionalità?')">
                            <i class="bi bi-trash-fill"></i> Elimina
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection