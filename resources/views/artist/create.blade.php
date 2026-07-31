@extends('layouts.app')

@section('content')

    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione form --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body p-4">
                <form action="{{ route('artist.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-warning fw-semibold">Nome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="name"
                            name="name" required >
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label text-warning fw-semibold">Cognome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="surname"
                            name="surname" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label text-warning fw-semibold">Età</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" id="age"
                            name="age" min="16" max="100">
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label text-warning fw-semibold">Biografia</label>
                        <textarea class="form-control bg-dark text-light border-secondary" id="bio" name="bio"
                            rows="3" minlength="20" maxlength="500"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="nationality" class="form-label text-warning fw-semibold">Nazionalità</label>
                        <select class="form-select bg-dark text-light border-secondary" id="nationality"
                            name="nationality_id">
                            @foreach($nationalities as $nationality)
                                <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                      <div class="d-flex justify-content-between align-items-center gap-2">
                        <a href="{{ route('artist.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Torna indietro
                            </a>
                        <button type="submit" class="btn btn-warning fw-semibold">
                            <i class="bi bi-plus-circle"></i> Crea Artista
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection