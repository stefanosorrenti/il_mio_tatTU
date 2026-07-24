@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Dettaglio Artista --}}

        <div class="my-5 ">
            <h1>{{ $artist->name }} {{ $artist->surname }}</h1>
            <p>Eta: {{ $artist->age }}</p>
            <p>Biografia: {{ $artist->bio }}</p>
            <p>Nazionalità: {{ $artist->nationality }}</p>
        </div>

        {{-- Azioni --}}
        <div>
            <button class="btn btn-success"><a href="{{ route('artist.index') }}">Torna alla lista</a></button>
            <button class="btn btn-warning"><a href="{{ route('artist.edit', $artist->id) }}">Modifica</a></button>
            <form action="{{ route('artist.destroy', $artist->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo artista?')">Elimina</button>
            </form>
        </div>
    </div>
@endsection
