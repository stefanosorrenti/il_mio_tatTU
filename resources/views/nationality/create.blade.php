@extends('layouts.app')

@section('content')
    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione form --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body p-4">
                <form action="{{ route('nationality.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-warning fw-semibold">Nome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="name"
                            name="name" required>
                    </div>

                     <div class="d-flex justify-content-between align-items-center gap-2">
                        <a href="{{ route('nationality.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Torna indietro
                            </a>
                        <button type="submit" class="btn btn-warning fw-semibold">
                            <i class="bi bi-plus-circle"></i> Crea Nazionalità
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
    