@extends('layouts.app')

@section('content')


    <div class="container">

        @include('partials.introSection', ['introTitle' => $introTitle, 'introText' => $introText])

        {{-- Sezione form edit --}}
        <div class="card bg-dark text-light my-5">
            <div class="card-body p-4">
                <form action="{{ route('tattoo.update', $tattoo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label text-warning fw-semibold">Nome</label>
                        <input type="text" class="form-control bg-dark text-light border-secondary" id="title"
                            name="title" value="{{ $tattoo->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label text-warning fw-semibold">Descrizione</label>
                        <textarea class="form-control bg-dark text-light border-secondary" id="description"
                            name="description" rows="3" minlength="20" maxlength="500">{{ $tattoo->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label text-warning fw-semibold">Prezzo (€)</label>
                        <input type="number" step="0.1" class="form-control bg-dark text-light border-secondary"
                            id="price" name="price" value="{{ $tattoo->price }}" required max="10000">
                    </div>

                    <div class="mb-3">
                        <label for="time" class="form-label text-warning fw-semibold">Durata (minuti)</label>
                        <input type="number" class="form-control bg-dark text-light border-secondary" id="time"
                            name="time" value="{{ $tattoo->time }}" min="10" max="3000">
                    </div>

                    <div class="mb-3 d-flex flex-column gap-2">
                        <label for="image" class="form-label text-warning fw-semibold">Immagine</label>
                        @if ($tattoo->image_path)
                            <img src="{{ asset('storage/' . $tattoo->image_path) }}" alt="{{ 'IMMAGINE' }}"
                                class="img-fluid w-25 w-lg-15 ">
                        @endif
                        <input type="file" class="form-control bg-dark text-light border-secondary" id="image"
                            name="image" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <label for="artist_id" class="form-label text-warning fw-semibold">Artista</label>
                        <select class="form-select bg-dark text-light border-secondary" id="artist_id" name="artist_id"
                            required>
                            @foreach ($artists as $artist)
                                <option value="{{ $artist->id }}"
                                    {{ $tattoo->artist_id == $artist->id ? 'selected' : '' }}>
                                    {{ $artist->name . ' ' . $artist->surname }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label text-warning fw-semibold d-block">Stili</label>
                        <div class="d-flex flex-row flex-wrap gap-3">
                            @foreach ($styles as $style)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="styles[]"
                                        value="{{ $style->id }}" id="style{{ $style->id }}"
                                        {{ $tattoo->styles->contains($style->id) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white-50" for="style{{ $style->id }}">
                                        {{ $style->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                     <div class="d-flex justify-content-between align-items-center gap-2">
                        <a href="{{ route('tattoo.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Torna indietro
                            </a>
                        <button type="submit" class="btn btn-warning fw-semibold">
                            <i class="bi bi-check-circle"></i> Aggiorna Tatuaggio
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
