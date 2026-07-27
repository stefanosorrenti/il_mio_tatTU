@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- Sezione introduttiva --}}
          @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione informazioni --}}
        <ul>
            <li>Numero di tatuatori: {{ $artistsCount }}</li>
            <li>Numero di stili: {{ $stylesCount }}</li>
            <li>Numero di tatuaggi: {{ $tattoosCount }}</li>
        </ul>
    </div>
@endsection