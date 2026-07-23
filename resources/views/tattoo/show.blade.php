@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="ratio ratio-1x1 w-50 mx-auto my-5">
            <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ $tattoo->title }}">
        </div>
        <h1>{{ $tattoo->title }}</h1>
        <p>Prezzo: {{ $tattoo->price }} €</p>
        <p>Artista: {{ $tattoo->artist->name ?? 'N/A' }}</p>
        <p>Descrizione: {{ $tattoo->description }}</p>
        <p>Durata: {{ $tattoo->time }} minuti</p>
        <p>Stili: 
            @foreach($tattoo->styles as $style)
                {{ $style->name }}@if(!$loop->last), @endif
            @endforeach
        </p>

        {{-- SEZIONE AZIONI --}}
        <section>
            <button class="btn btn-success"><a href="{{ route('tattoo.index') }}">Torna alla lista</a></button>
            <button class="btn btn-warning"><a href="{{ route('tattoo.edit', $tattoo->id) }}">Modifica</a></button>
            <form action="{{ route('tattoo.destroy', $tattoo->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo tatuaggio?')">Elimina</button>
            </form>
        </section>
    </div>
@endsection
