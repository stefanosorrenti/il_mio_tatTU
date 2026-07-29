@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-5">

            <div class="row row-cols-1 row-cols-md-2 g-4">
                {{-- COLONNA IMMAGINE --}}
                <div class="col">
                    <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ $tattoo->title }}" class="img-fluid ">
                </div>

                {{-- COLONNA DETTAGLI --}}
                <div class="col">

                    <div class="card-body">
                        <h3>{{ $tattoo->title }}</h3>
                        <small class="text-muted">Aggiunto il {{ $tattoo->created_at->format('d/m/Y') }}.</small>
                        <small class="text-muted">Artista: {{ $tattoo->artist ? $tattoo->artist->name . ' ' . $tattoo->artist->surname : 'N/A' }}.</small>
                        <p class="card-text">{{ $tattoo->description }}
                            <ul>
                                <li>Stili: {{ $tattoo->style ?? 'N/A' }}</li>
                                <li>Tempo di realizzazione: {{ $tattoo->time ?? 'N/A' }} minuti.</li>
                                <li>Prezzo: €{{ $tattoo->price ?? 'N/A' }}</li>
                                
                            </ul>
                        </p>
                        
                        
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
