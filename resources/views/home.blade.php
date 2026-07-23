@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- SEZIONE INTRODUTTIVA --}}
        <section class="text-center my-5">
            <h2>Benevenuto {{ Auth::user()->name }}!</h2>
            <p>
                Questo è il tuo pannello di controllo, seleziona un'opzione dal menu
                per visualizzarne, modificarne e aggiugnere dettagli.
            </p>
        </section>

        {{-- SEZIONE OPZIONI --}}
        <section class="my-5 ">
            <div class="container">
                <div class="row justify-content-center align-items-center" style="height: 50vh;">
                    <div class="col-md-8 col-lg-6">
                        <div class="row g-2">
                            <span class="col-12 col-md-6">
                                <a class="card text-center">Tatuaggi</a>
                            </span>
                            <span class="col-12 col-md-6">
                                <a class="card text-center">Artisti</a>
                            </span>                            <span class="col-12 col-md-6">
                                <a class="card text-center">Stili</a>
                            </span>
                            <span class="col-12 col-md-6">
                                <a class="card text-center">Altro</a>
                            </span>
                        </div>
                    </div>
                </div>
        </section>

    </div>

    <footer class="text-center py-5">
        <p>&copy; {{ date('Y') }} Il Mio Tatto. Tutti i diritti riservati.</p>
    </footer>
@endsection
