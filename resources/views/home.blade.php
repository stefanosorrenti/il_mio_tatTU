@extends('layouts.app')
@section('content')
    <div class="container">

        {{-- SEZIONE INTRODUTTIVA --}}
        <section class="text-center my-5">
            <h2>Benvenuto {{ Auth::user()->name }}!</h2>
            <p>
                Questo è il tuo pannello di controllo, seleziona un'elemento dal menu per gestirlo. Puoi visualizzare, modificare o eliminare i tatuaggi, gli artisti e gli stili presenti nel sistema. Inoltre, puoi accedere alla sezione "Extra" per ulteriori funzionalità e opzioni.
            </p>
        </section>

        {{-- SEZIONE OPZIONI --}}
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-center align-items-center hv-50">
                    <div class="col-md-8 col-lg-6">
                        <div class="row g-2">

                            <!-- Card 1 -->
                            <div class="col-12 col-md-6">
                                <div class="card h-100 py-4 d-flex align-items-center justify-content-center">
                                    <span class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-brush-fill fs-1"></i>
                                        <a href="{{ route('tattoo.index') }}" class="text-center">TATUAGGI</a>
                                    </span>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-12 col-md-6">
                                <div class="card h-100 py-4 d-flex align-items-center justify-content-center">
                                    <span class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-people-fill fs-1"></i>
                                        <a href="{{ route('artist.index') }}" class="text-center">ARTISTI</a>
                                    </span>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-12 col-md-6">
                                <div class="card h-100 py-4 d-flex align-items-center justify-content-center">
                                    <span class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-book-fill fs-1"></i>
                                        <a href="{{ route('style.index') }}" class="text-center">STILI</a>
                                    </span>
                                </div>
                            </div>

                            <!-- Card 4 -->
                            <div class="col-12 col-md-6">
                                <div class="card h-100 py-4 d-flex align-items-center justify-content-center">
                                    <span class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-bar-chart-fill fs-1"></i>
                                        <a href="{{ route('extra') }}" class="text-center">EXTRA</a>
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <footer class="text-center py-5">
        <p>&copy; {{ date('Y') }} Il Mio Tatto. Tutti i diritti riservati.</p>
    </footer>
@endsection
