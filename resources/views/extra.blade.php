@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- Sezione introduttiva --}}
        <h1>Extras</h1>
        <p>Qui puoi visualizzare varie informazioni sui tatuatori, stili e tatuaggi presenti nel sito.</p>

        <ul>
            <li>Numero di tatuatori: {{ $artistsCount }}</li>
            <li>Numero di stili: {{ $stylesCount }}</li>
            <li>Numero di tatuaggi: {{ $tattoosCount }}</li>
        </ul>
    </div>
@endsection