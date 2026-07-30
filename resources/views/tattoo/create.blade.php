@extends('layouts.app')

@section('content')
    <div class="container">


        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione form --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body p-4">
                <form action="{{ route('tattoo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label text-warning fw-semibold">Nome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="title"
                            name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-warning fw-semibold">Descrizione</label>
                        <textarea class="form-control bg-dark text-light border-secondary" id="description" name="description" rows="3" minlength="20" maxlength="500"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label text-warning fw-semibold">Immagine</label>
                        <input type="file" class="form-control bg-dark text-light border-secondary" id="image"
                            name="image" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label text-warning fw-semibold">Prezzo</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" id="price"
                            name="price" step="0.1" required max="10000">
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label text-warning fw-semibold">Durata (minuti)</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" id="time"
                            name="time" step="1" min="10" max="3000">
                    </div>

                    <div class="mb-3">
                        <label for="artist_id" class="form-label text-warning fw-semibold">Artista</label>
                        <select class="form-select bg-dark text-light border-secondary" id="artist_id" name="artist_id">
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->name . ' ' . $artist->surname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-warning fw-semibold d-block">Stili</label>
                        @foreach ($styles as $style)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="styles[]" value="{{ $style->id }}"
                                    id="style-{{ $style->id }}">
                                <label class="form-check-label text-white-50" for="style-{{ $style->id }}">
                                    {{ $style->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-warning fw-semibold">
                        <i class="bi bi-plus-circle"></i> Crea Tatuaggio
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
