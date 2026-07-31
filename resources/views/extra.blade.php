@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
          @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione informazioni --}}
        <ul>
            <li>Ultimo tatuaggio: {{ $lastTattoo->title ?? 'Nessuno' }}
                <a href="{{ route('tattoo.show', $lastTattoo->id ?? 0) }}">Visualizza</a>
            </li>
            <li>Ultimo stile: {{ $lastStyle->name ?? 'Nessuno' }}
                <a href="{{ route('style.show', $lastStyle->id ?? 0) }}">Visualizza</a>
            </li>
            <li>Ultimo artista: {{ $lastArtist->name ?? 'Nessuno' }}
                <a href="{{ route('artist.show', $lastArtist->id ?? 0) }}">Visualizza</a>
            </li>
            <li>Numero di tatuatori: {{ $artistsCount }}</li>
            <li>Numero di stili: {{ $stylesCount }}</li>
            <li>Numero di tatuaggi: {{ $tattoosCount }}</li>
        </ul>
    </div>
@endsection